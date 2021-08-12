<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Todo List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="alert alert-danger">
                <h1>Oops, We have some error!</h1>
                <ul>
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
