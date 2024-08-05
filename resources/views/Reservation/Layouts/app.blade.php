<!DOCTYPE html>
<html lang="fa">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,multi-page,Farol - Bootstrap 5 Admin Dashboard Template" >
    <meta name="description" content="">
    <meta name="author" content="MrMDCode">

    @include('Reservation.Layouts._partial._css')
    @yield('css')

    <title>@yield('title')</title>
</head>
<body>

<div class="preloader" id="preloader">
    <div class="preloader">
        <div class="waviy position-relative">
            <span class="d-inline-block">M</span>
            <span class="d-inline-block">r</span>
            <span class="d-inline-block">M</span>
            <span class="d-inline-block">D</span>
            <span class="d-inline-block">C</span>
            <span class="d-inline-block">o</span>
            <span class="d-inline-block">d</span>
            <span class="d-inline-block">e</span>
        </div>
    </div>
</div>


@include('Reservation.Layouts._partial._menu')
</div>


<div class="container-fluid">
    <div class="main-content d-flex flex-column">

        @include('Reservation.Layouts._partial._topMenu')


       @yield('content')

        <div class="flex-grow-1"></div>
        <footer class="footer-area bg-white text-center rounded-top-10" dir="ltr">
            <p class="fs-14">© <span class="text-primary">Digital Coffee</span> Created by <a href="https://mrmdcode.ir" class="text-primary">MrMDCode</a></p>
        </footer>

    </div>
</div>


<button class="btn btn-danger theme-settings-btn p-0 position-fixed z-2 text-center" style="bottom: 30px; right: 30px; width: 40px; height: 40px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
    <i data-feather="settings" class="wh-20 text-white position-relative" style="top: -1px; outline: none;" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="روی تنظیمات پوسته کلیک کنید"></i>
</button>
<div class="offcanvas offcanvas-end bg-white" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
    <div class="offcanvas-header bg-body-bg py-3 px-4 mb-4">
        <h5 class="offcanvas-title fs-18" id="offcanvasScrollingLabel">تنظیمات پوسته</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-4">
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">راست چین / چپ چین</h4>
        <div class="settings-btn rtl-btn">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">روشن / تاریک</h4>
        <button class="switch-toggle settings-btn dark-btn" id="switch-toggle">
            کلیک روی <span class="dark">تاریک</span> <span class="light">روشن</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">فقط نوار کناری روشن / تاریک</h4>
        <button class="sidebar-light-dark settings-btn sidebar-dark-btn" id="sidebar-light-dark">
            کلیک روی <span class="dark1">تاریک</span> <span class="light1">روشن</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">فقط هدر روشن / تاریک</h4>
        <button class="header-light-dark settings-btn header-dark-btn" id="header-light-dark">
            کلیک روی <span class="dark2">تاریک</span> <span class="light2">روشن</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">فقط پاورقی روشن / تاریک</h4>
        <button class="footer-light-dark settings-btn footer-dark-btn" id="footer-light-dark">
            کلیک روی <span class="dark3">تاریک</span> <span class="light3">روشن</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">شعاع / مربع سبک کارت</h4>
        <button class="card-radius-square settings-btn card-style-btn" id="card-radius-square">
            کلیک روی <span class="square">مربع</span> <span class="radius">شعاع</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">سبک کارت پشت زمینه سفید / خاکستری</h4>
        <button class="card-bg settings-btn card-bg-style-btn" id="card-bg">
            کلیک روی <span class="white">سفید</span> <span class="gray">خاکستری</span>
        </button>
        <div class="mb-4 pb-2"></div>
        <h4 class="fs-15 fw-semibold border-bottom pb-2 mb-3">محتوای سبک کانتینری / جعبه دار</h4>
        <button class="boxed-style settings-btn fluid-boxed-btn" id="boxed-style">
            کلیک روی <span class="fluid">کانتینری</span> <span class="boxed">جعبه ای</span>
        </button>
    </div>
</div>


@include('Reservation.Layouts._partial._js')
@yield('js')
</body>
</html>
