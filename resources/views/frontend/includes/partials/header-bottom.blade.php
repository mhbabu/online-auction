<!-- header bottom start -->
<header class="header-area style-1">
    <div class="header-logo">
        <a href="{{ url('/') }}">
            <img alt="image" src="{{ url('/assets/frontend/images/bg/header-logo.png') }}">
        </a>
    </div>
    <div class="main-menu">
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap ">
                <a href="{{ url('/') }}">
                    <img alt="image" src="{{ url('/assets/frontend/images/bg/header-logo.png') }}">
                </a>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>
        <ul class="menu-list">
            <li> <a href="{{ url('/') }}">Home</a> </li>
            <li class="menu-item-has-children">
                <a href="{{ url('/all-products') }}" class="drop-down">Product</a><i class='bx bx-plus dropdown-icon'></i>
                <ul class="submenu">
                    @foreach(\App\Libraries\CommonFunction::getAllProductCategories() as $category)
                        <li><a href="{{ url('product-categories/'.\App\Libraries\Encryption::encodeId($category->id)) }}">{{ $category['name'] }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li> <a href="{{ url('/about-us') }}">About US</a> </li>
            <li><a href="{{ url('/contact-us') }}">Contact</a></li>
        </ul>
    </div>
    <div class="nav-right d-flex align-items-center">
        @if(auth()->user())
            <div class="eg-btn btn--primary header-btn" style="margin-right: 10px">
                @if(auth()->user()->user_type == '1x101' )
                    <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-user-cog"></i> My Account</a>
                @else
                    <a href="{{ url('/dashboard') }}"> <i class="fa fa-user-cog"></i> My Account</a>
                @endif
            </div>
        @endif
        @if(auth()->user())
            <div class="eg-btn header-btn">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-user-lock mr-2"></i> Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        @endif

        @if(!auth()->user())
            <div class="eg-btn btn--primary header-btn" style="margin-right: 10px">
                <a href="{{ url('/login') }}"><i class="fa fa-user"></i> Login</a>
            </div>
            <div class="eg-btn btn--primary header-btn">
                <a href="{{ url('/register') }}"><i class="fa fa-user-plus"></i> Register</a>
            </div>
        @endif

        <div class="mobile-menu-btn d-lg-none d-block">
            <i class='bx bx-menu'></i>
        </div>
    </div>
</header>
<!-- header bottom end -->

