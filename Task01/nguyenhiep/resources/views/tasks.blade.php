<?php
?>
{{--Thua ke tu app.blade template--}}
@extends('layouts.app')
{{--Noi dung trang con--}}
{{--Dung app.css--}}
@section('content')
{{--    Dinh nghia phan noi dung cua trang task--}}
    <div class="card-body">
        @include('error')
{{--        Form nhap task moi--}}
        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
{{--            Ten Task--}}
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Task
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
