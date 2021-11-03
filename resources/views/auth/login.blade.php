<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> تسجيل دخول الى النظام</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/admin/css/adminlte.min.css')}}">
    <link
        rel="stylesheet"
        href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe"
        crossorigin="anonymous" />
    <style>
        .login-page{
            background-image:linear-gradient(0deg, #475f63d1, #9dc4c094);
            background-size: cover;
            background-repeat:no-repeat ;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">

            <div class="login-logo">
                <img style="max-width: 100px" src="{{asset('image/avatar.jpg')}}">
            </div>
            <br>
            <p class="login-box-msg">تسجيل الدخول الى النظام</p>
            @if(!empty(session('error')))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('error') }}
                </div>
            @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="البريد الالكتروني" id="email"
                                   value="admin@gmail.com"
                                   class="form-control" name="email" required
                                   autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" value="password" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-block btn-secondary"> تسجيل الدخول </button>
                        </div>
                    </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- Latest compiled and minified JavaScript -->
<script
    src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.min.js"
    integrity="sha384-VmD+lKnI0Y4FPvr6hvZRw6xvdt/QZoNHQ4h5k0RL30aGkR9ylHU56BzrE2UoohWK"
    crossorigin="anonymous"></script>

</body>
</html>
