<?php

use Illuminate\Support\Facades\URL;

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>My - ToDo List</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        {{--            Navbar Contents--}}
    </nav>
    <div class="container">
        @if(count($errors) > 0)

            <div class="alert alert-danger">
                <h3 class="text text-danger">Lỗi rồi kìa !!!</h3>
                <br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
</body>
</html>

