<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="image">
                    <b class="pr-1">{{ auth()->user()->name }}</b>
                    @if(auth()->user()->photo)
                        <img width="30" src="{{ url('/uploads/profile/'.auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img width="30" src="{{ url('/assets/backend/img/profile.png') }}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg-right">
{{--                <a href="{{ route('admin.profile.index') }}" class="dropdown-item">--}}
{{--                    <i class="fas fa-user-cog mr-2"></i> Profile--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-user-lock mr-2"></i> Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>
