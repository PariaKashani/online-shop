<!DOCTYPE html>
<html>
<head>
    <title>EShop - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="/public/css/app.css">--}}
    <style>
        body {
            margin-top: 5%;
            color: #999;
            background: #fafafa;
            font-family: 'Roboto', sans-serif;
        }
        .form-control {
            min-height: 41px;
            box-shadow: none;
            border-color: #e6e6e6;
        }
        .form-control:focus {
            border-color: #00c1c0;
        }
        .form-control, .btn {
            border-radius: 3px;
        }
        .signup-form {
            width: 425px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .signin-form{
            width: 425px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .addprod {
            width: 425px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .addprod .signin-form .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin: 0 0 25px;
        }
        .signup-form form {
            margin-bottom: 15px;
            background: #fff;
            border: 1px solid #f4f4f4;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 40px 50px;
        }
        .signin-form form{
            margin-bottom: 15px;
            background: #fff;
            border: 1px solid #f4f4f4;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 40px 50px;
        }
        .addprod form{
            margin-bottom: 15px;
            background: #fff;
            border: 1px solid #f4f4f4;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 40px 50px;
        }
        .addprod .signin-form .signup-form .form-group {
            margin-bottom: 20px;
        }
        .addprod .signin-form .signup-form label {
            font-weight: normal;
            font-size: 13px;
        }
        .addprod .signin-form .signup-form input[type="checkbox"] {
            margin-top: 2px;
        }
         .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #00c1c0;
            border: none;
            min-width: 140px;
            outline: none !important;
        }
        .signin-form .btn{
            font-size: 16px;
            font-weight: bold;
            background: #00c1c0;
            border: none;
            min-width: 140px;
            outline: none !important;
        }
        .addprod .btn{
            font-size: 16px;
            font-weight: bold;
            background: #00c1c0;
            border: none;
            min-width: 140px;
            outline: none !important;
        }
        .addprod .signin-form .signup-form .btn:hover, .signup-form .btn:focus {
            background: #00b3b3;
        }
        .addprod .signin-form .signup-form a {
            color: #00c1c0;
            text-decoration: none;
        }
        .addprod .signin-form.signup-form a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
@section('sidebar')
    @show
<div class="container-fluid">
    <div class="row">
    <div class="col-4">
    @yield('sidemenu')
    </div>
    <div class="col-8">


        @yield('content')
    </div>
    </div>
</div>
</body>
</html>