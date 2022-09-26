<aside class="main-sidebar sidebar-light-yellow elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ url('/assets/backend/img/company.png') }}" alt="{{ env('APP_NAME','Application') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME','Application') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ (request()->is('admin/dashboard*') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if(auth()->user()->user_type == '1x101')
                <li class="nav-item has-treeview {{ (request()->is('admin/product*') ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/product*') ? 'active' : '') }}">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>Product Management<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link {{ (request()->is('admin/products*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.categories.index') }}" class="nav-link {{ (request()->is('admin/product/categories*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.types.index') }}" class="nav-link {{ (request()->is('admin/product/types*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Types</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview {{ (request()->is('admin/users*') ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/users*') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users Management<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ (request()->is('admin/users*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ (request()->is('admin/blogs*') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Blog</p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ (request()->is('admin/pages/*') || request()->is('admin/fqas*') || request()->routeIs('admin.contact-info.index') || request()->routeIs('admin.contact-us.index')? 'menu-open' : '') }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/pages/*') || request()->is('admin/fqas*') || request()->routeIs('admin.contact-info.index') || request()->routeIs('admin.contact-us.index') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Pages<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pages','about-us') }}" class="nav-link {{ (request()->is('admin/pages/about-us*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Us</p>
                            </a>
                        </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.pages','privacy-policy') }}" class="nav-link {{ (request()->is('admin/pages/privacy-policy*') ? 'active' : '') }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Privacy Policy</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.pages','terms-and-conditions') }}" class="nav-link {{ (request()->is('admin/pages/terms-and-conditions*') ? 'active' : '') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Terms & Conditions</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.pages','cookie-policy') }}" class="nav-link {{ (request()->is('admin/pages/cookie-policy*') ? 'active' : '') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cookie Policy</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.pages','purchasing-policy') }}" class="nav-link {{ (request()->is('admin/pages/purchasing-policy*') ? 'active' : '') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Purchasing Policy</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.fqas.index') }}" class="nav-link {{ (request()->is('admin/fqas*') ? 'active' : '') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>FQAS</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.contact-info.index') }}" class="nav-link {{ (request()->routeIs('admin.contact-info.index') ? 'active' : '') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact Info</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.contact-us.index') }}" class="nav-link {{ (request()->routeIs('admin.contact-us.index') ? 'active' : '') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact Messages</p>
                        </a>
                      </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ (request()->is('admin/settings/*') ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/settings/*') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('admin.settings.newsletters.index') }}" class="nav-link {{ (request()->is('admin/settings/newsletters*') ? 'active' : '') }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Newsletter</p>
                          </a>
                      </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.appearance.index') }}" class="nav-link {{ (request()->is('admin/settings/appearance*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Appearance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.sliders.index') }}" class="nav-link {{ (request()->is('admin/settings/sliders*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.advertisements.index') }}" class="nav-link {{ (request()->is('admin/settings/advertisements*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advertisement</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ url('/customer/bidding-price') }}" class="nav-link {{ (request()->is('customer/bidding-price*') ? 'active' : '') }}">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>Products Biddings</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
