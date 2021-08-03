<?php


namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->input('image') != null && $request->input('productprice') != null && $request->input('producttitle') != null) {
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $fileExt = $image->extension();
                $allowExt = ['png', 'jpg', 'svg'];
                if (!in_array($fileExt, $allowExt)) {
                    return "ERROR : Unallowed file extension!";
                }
                $fileNameSplit = explode(" ", $request->input('image'));
                $fileName = implode("-", $fileNameSplit);
                $imageName = $fileName . uniqid(".storeProduct", true) . '.' . $fileExt;
                $image->move('img', $imageName);
            } else {
                return "ERROR : No file chosen!";
            }
            $product = new Product();
            $product->product_name = $request->input('producttitle');
            $product->image = $imageName;
            $product->price = $request->input('productprice');
            $product->save();
        }
        return redirect('/');
    }

    public function delete($id, $image)
    {
        $product = Product::find($id);
        $product->delete();
        unlink('img/' . $image);
        return redirect('/');
    }

    public function update($id)
    {
        $product = Product::find($id);
        $fileName = $product->image;
        $index = strpos($fileName, ".storeProduct");
        $fileNameValue = substr($fileName, 0, $index);
        return view('product-edit', ['product' => $product, 'fileValue' => $fileNameValue]);
    }

    public function edit(Request $request, $id, $img){
        $product = Product::find($id);
        if ($request->input('image') != null && $request->input('productprice') != null && $request->input('producttitle') != null){
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $fileExt = $image->extension();
                $allowExt = ['png', 'jpg', 'svg'];
                if (!in_array($fileExt, $allowExt)) {
                    return "ERROR : Disallowed file extension!";
                }
                $fileNameSplit = explode(" ", $request->input('image'));
                $fileName = implode("-", $fileNameSplit);
                $imageName = $fileName . uniqid(".storeProduct", true) . '.' . $fileExt;
                $image->move('img', $imageName);
                unlink('img/'.$img);
            }else{
                $imageName = $img;
            }
            $product->price = $request->input('productprice');
            $product->product_name = $request->input('producttitle');
            $product->image = $imageName;
            $product->save();
        }else{
            return "ERROR : Oops, Something went wrong!";
        }
        return redirect('/');
    }
}
