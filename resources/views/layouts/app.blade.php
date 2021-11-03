<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>اداره النظام</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <!-- Latest compiled and minified CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe"
        crossorigin="anonymous" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/admin/css/adminlte.min.css?v='.rand(101,505))}}">

<!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{asset('dist/admin/css/custom.css')}}">
    @yield("css")

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto-navbav">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                 laravel
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="" class="dropdown-item dropdown-footer" >عرض الملف الشخصى</a>
                    <div class="dropdown-divider"></div>

                    @auth

                        <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            تسجيل خروج
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endauth
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link" style="background: #496f76;text-align: center;">
            <img src="{{asset('image/avatar.jpg')}}" alt="ERP"
                 >
            <br>
            <span class="brand-text font-weight-light">اداره النظام</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item" style="padding: 10px 0px;">

                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                           مدير النظام
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">

                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>
                                اداره الحسابات
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('receipts.index')}}" class="nav-link">
                                    <i class="fas fa-dollar-sign nav-icon"></i>
                                    <p> عرض السندات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('receipts.create')}}"  class="nav-link">
                                    <i class="far fa-credit-card nav-icon"></i>
                                    <p>اضافه سند صرف</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')
    <footer class="main-footer">
        <strong>جميع الحقوق محفوظه &copy; 2021 </strong>.
    </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- Latest compiled and minified JavaScript -->
<script
    src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.min.js"
    integrity="sha384-VmD+lKnI0Y4FPvr6hvZRw6xvdt/QZoNHQ4h5k0RL30aGkR9ylHU56BzrE2UoohWK"
    crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/admin/js/adminlte.js?v='.rand(101,505))}}"></script>

@stack('js')
</body>
</html>

