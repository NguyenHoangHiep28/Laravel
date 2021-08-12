<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Todo List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/style.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-5 text-center" style="margin-top: 20px">
            <h2 class="text text-success">My Todo List <i class="fa fa-heart text-danger"></i></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-lg-10" id="add-form">
            <form action="MyTodoList/public/add" method="post">
                @csrf
                <div class="form-group">
                    <label for="todo-content">Add a work to the list</label>
                    <input type="text" class="form-control" id="todo-content" placeholder="Enter a work..." name="todo">
                </div>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-plus"></i> Add
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-lg-10 text-center" id="todo-box">
            @if(count($todo) > 0)
                <table class="table table-dark table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>To do</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < count($todo); $i++)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td id="{{$i +1}}">
                                <form action="MyTodoList/public/edit/{{$todo[$i]->id}}" method="post">
                                    @csrf
                                    <input type="text" value="{{$todo[$i]->Todo}}" name="edited" disabled>
                                    <button class="btn btn-primary save-btn" type="submit">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                </form>
                            </td>
                            <td class="action">
                                    <button class="btn btn-success edit-btn" type="button" itemid="{{$i+1}}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                <form action="MyTodoList/public/delete/{{$todo[$i]->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-secondary">
                                        <i class="fa fa-minus-circle"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{URL::asset('asset/js/main.js')}}"></script>
</html>
