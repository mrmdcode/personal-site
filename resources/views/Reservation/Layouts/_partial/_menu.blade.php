<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="index.html" class="d-block text-decoration-none">
            <img src="{{asset('img/logo.png')}}" alt="logo-icon">
        </a>
        <button class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y" id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu " data-simplebar>
        <ul class="menu-inner">
            <li class="menu-item open">
                <a href="{{route('n-dashboard')}}" class="menu-link @if(Route::current()->getName() =="n-dashboard") active @endif">
                    داشبورد
                </a>
            </li>


            <li class="menu-item @if(Route::current()->getName() == 'admin.motorManager' || Route::current()->getName() == 'admin.motorCreate' ) open  @endif ">
                <a href="javascript:void(0);" class="menu-link menu-toggle  @if(Route::current()->getName() == 'admin.motorManager' || Route::current()->getName() == 'admin.motorCreate' ) active  @endif">
                    <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                    <span class="title">پوسته</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route("u2-landingPageData")}}" class="menu-link @if(Route::current()->getName() == 'u2-landingPageData' ) active @endif">
                            تنظمات ظاهری
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link @if(Route::current()->getName() == 'admin.motorCreate' ) active @endif">
                            تنظیمات صفحات
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item @if(Route::current()->getName() == 'u2-menuItem.index' || Route::current()->getName() == 'u2-menu.index' ) open  @endif ">
                <a href="javascript:void(0);" class="menu-link menu-toggle  @if(Route::current()->getName() == 'u2-menuItem.index' || Route::current()->getName() == 'u2-menu.index' ) active  @endif">
                    <i data-feather="folder-minus" class="menu-icon tf-icons"></i>
                    <span class="title"> منو</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route("u2-menu.index")}}" class="menu-link @if(Route::current()->getName() == 'u2-menu.index' ) active @endif">
                            دسته بندی و منو
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route("u2-menuItem.index")}}" class="menu-link @if(Route::current()->getName() == 'u2-menuItem.index' ) active @endif">
                            آیتم ها
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item open">
                <a href="{{route("u2-table.index")}}" class="menu-link @if(Route::current()->getName() =="n-dashboard") active @endif">
                    میز ها
                </a>
            </li>
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">دیتا ها</span>
            </li>
            <li class="menu-item open">
                <a href="{{route("u2-orders")}}" class="menu-link @if(Route::current()->getName() =="n-dashboard") active @endif">
                   سفارش ها
                </a>
            </li>
        </ul>
    </aside>
    <div class="bg-white z-1 admin">
        <div class="d-flex align-items-center admin-info border-top">
            <div class="flex-shrink-0">
                <a href="{{route('u2-dashboard')}}" class="d-block">
                    <img src="#" class="rounded-circle wh-54" alt="admin">
                </a>
            </div>
            <div class="flex-grow-1 ms-3 info">
                <a href="{{route('u2-dashboard')}}" class="d-block name">MrMDCOde</a>
                <form class="d-none" id="f-logout" action="{{route('logout')}}" method="post">
                    @csrf
                </form>
                <a onclick="$('#f-logout').submit()">خروج</a>
            </div>
        </div>
    </div>
</div>
