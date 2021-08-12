<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Todolist;

Route::get('/', function () {
    $todos = Todolist::orderBy('created_at')->get();
    return view('index', ['todo'=>$todos]);
});
Route::post('MyTodoList/public/add', function (Request $request){
   if ($request->input('todo')){
       $todo = new Todolist();
       $todo->Todo = $request->input('todo');
       $todo->save();
       return redirect('/');
   }else {
       return view('error');
   }
});
Route::post('MyTodoList/public/edit/{id}', function ($id, Request $request){
    if ($request->input('edited') != null) {
        $todo = Todolist::find($id);
        $todo->Todo = $request->edited;
        $todo->save();
        return redirect('/');
    }else{
        return view('error');
    }
});
Route::delete('MyTodoList/public/delete/{id}', function ($id){
    $todo = Todolist::find($id);
    $todo->delete();
    return redirect('/');
});
