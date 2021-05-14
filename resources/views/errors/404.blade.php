<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <img src="{{asset('public/assets/images/404.jpg')}}" class="img-fluid rounded" style="margin: 50px auto 0 auto!important;"><br>
                <a href="{{url('/')}}" class="btn btn-primary" style="margin-top: 20px;">Go To Home</a>
            </div>
        </div>
    </div>
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
