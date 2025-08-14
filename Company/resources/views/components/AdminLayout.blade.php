<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ادمین رنجر</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
            <figure class="imgLogo">
                <img src="../art/Ranger.png" alt="" srcset="">
            </figure>
        </div>
        <div class="text-center p-3">
            <figure class="avatar">
                <img src="img/1.jpg" class="img-fluid" alt="">
            </figure>
            <div class="mt-3">
                <a href="" class="btn btn-secondary btn-sm rounded-3" title="ویرایش پروفایل"><i class="fa-duotone fa-gear"></i></a>
                <a href="{{ route('admin.logout') }}" class="btn btn-danger btn-sm rounded-3" title="خروج"><i class="fa-duotone fa-sign-out"></i></a>
            </div>
        </div>
        <div class="mt-3 p-3">
            <div class="d-grid gep-3">
                <a href="index.html" class="btn btn-light text-start border-0 rounded-3 mb-2"><i class="fa-duotone fa-home me-2"></i> پیشخوان </a>
            </div>

            <details class="js-list mt-2 mb-2">
                <summary class="title js-title"><i class="fa-duotone fa-layer-plus"></i> نمونه ها <span class="icon"></span></summary>
                <div class="card rounded-3 mt-3 js-content border-0 shadow-sm">
                    <div class="card-body">
                        <ul>
                            <li class="mb-2"><a href="signup.html" class="text-decoration-none text-dark">ورود / عضویت</a></li>
                        </ul>
                    </div>
                </div>
            </details>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#" id="menu-toggle">
                <span class="navbar-toggler-icon"></span>
            </a>
        </nav>

        <div class="container">
            {{ $slot }}
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Script -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
