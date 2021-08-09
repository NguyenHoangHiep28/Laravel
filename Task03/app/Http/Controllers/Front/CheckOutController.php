<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    //

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //01. Them don hang
        $order = Order::create($request->all());

        //02. Them chi tien don hang
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
            ];
            OrderDetail::create($data);
        }
        if ($request->payment_type == 'pay_later') {
            //03. Gui Email
            $total = Cart::total();
            $subtotal = Cart::subtotal();

            $this->sendEmail($order, $total, $subtotal);
            //04. Xoa gio hang
            Cart::destroy();
            //05.Tra ve ket qua
            return redirect('checkout/result')->with('notification', 'Success! You will pay on delivery. Please check your email.');
        }
        if ($request->payment_type == 'online_payment') {
            //01. Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
               'vnp_TxnRef' => $order->id, //Id của đơn hàng
                'vnp_OrderInfo'=> 'Mô tả về đơn hàng ở đây ...',
                'vnp_Amount' => Cart::total(0, '', '') * 22926,
            ]);

            //02. Chuyển hướng URL lấy được
            return redirect()->to($data_url);
        }
    }

    private function sendEmail($order, $total, $subtotal){
        $email_to = $order->email;
        Mail::send('front.checkout.email', compact('order', 'total', 'subtotal'), function($message) use ($email_to){
            $message->from('codeLean@gmail.com', 'CodeLean eCommerce');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }

    public function vnPayCheck(Request $request){
        //01. Lấy data từ URL ( do VNPay gửi về qua $vnp_Returnurl )
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); // Mã phản hồi kết quả thanh toán (00 = success)
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // ticket id
        $vnp_Amount = $request->get('vnp_Amount'); // Số tiền thanh toán

        //02. Kiểm tra kết quả giao dịch trả về từ VNPay
        if ($vnp_ResponseCode != null){
            //Nếu thành công
            if ($vnp_ResponseCode == 00){
                // GỬi Email
                $order = Order::find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);
                //Xóa giỏ hàng
                Cart::destroy($order);
                //Thông báo kết quả
                return "Success!!!. Has paid online. Please check your email";

            }
            //nếu ko thành công
            else
            {
            //Xóa đơn hàng đã thêm vào database
                Order::find($vnp_TxnRef)->delete();
            //trả về thông báo lỗi
                return "ERROR: Payment failed or canceled";
            }
        }
    }

    public function result(){
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

}
