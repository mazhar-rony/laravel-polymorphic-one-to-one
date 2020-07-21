<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Application - Show User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row" style="padding-top: 10px;">
            <div class="col-md-6">
                <h1>{{ $showimg->name }}</h1>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('/users')}}" class="btn btn-success pull-right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Users</a>
            </div>
        </div>
            <p><img src="{{url($showimg->images->path)}}" alt="post_image" width="100%" height="100%" class="mx-auto d-block"></p>
            
        
    </div>
</body>
</html>