<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nishant Kapoor | Access Forbidden</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/assets/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/assets/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/assets/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('public/assets/favicon_io/site.webmanifest')}}">

    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 mx-auto d-block">
                <img src="{{asset('public/assets/images/errors/403.jpg')}}" class="img-fluid mt-5 mb-5" alt="Access Forbidden" style="margin: 40px 0 40px 0;">
            </div>
        </div>

        <div class="row">
			<div class="col-lg-12 text-center">
                <a href="{{url('/')}}" class="btn btn-outline-purple">Go To Home</a>
			</div>
		</div>
    </div>
    <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
