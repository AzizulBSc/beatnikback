<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('admin') }}/img/user8-128x128.jpg" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin') }}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ url("/servicereq") }}"
                        class="nav-link {{ (request()->is('servicereq')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            Service Request
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ url("/vehicle") }}" class="nav-link {{ (request()->is('vehicle')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Vehicle Manage
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ url("/service") }}" class="nav-link {{ (request()->is('service')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Service List
                        </p>
                    </a>
                </li>

                @if (auth::user()->role==1)
                <li class="nav-item mt-auto">
                    <a href="{{ url("/customer") }}"
                        class="nav-link {{ (request()->is('customer*')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-pen-square"></i>
                        <p>
                            Customer Manages
                        </p>
                    </a>
                </li>


                <li class="nav-item mt-auto">
                    <a href="{{ url("/mechanic") }}"
                        class="nav-link {{ (request()->is('mechanic*')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Mechanic
                        </p>
                    </a>
                </li>

                <li class="nav-item mt-auto">
                    <a href="{{ url("/vehicleCat") }}"
                        class="nav-link {{ (request()->is('vehicleCat*')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Vehicle Category
                        </p>
                    </a>
                </li>

                <li class="nav-item mt-auto">
                    <a href="{{ url("/vehiclecolor") }}"
                        class="nav-link {{ (request()->is('vehiclecolor*')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Vehicle Color
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ url("/vehiclebrand") }}"
                        class="nav-link {{ (request()->is('vehiclebrand*')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-bold"></i>
                        <p>
                            Vehicle Brand
                        </p>
                    </a>
                </li>


                @endif

                {{-- <li class="nav-item mt-auto">
                    <a href="{{ url("/product") }}" class="nav-link {{ (request()->is('product*')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ url("/faq") }}" class="nav-link {{ (request()->is('faq*')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-pen-square"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li> --}}


                <li class="nav-item mt-auto">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a href="{{ url("/") }}" class="nav-link {{ (request()->is('/')) ? 'active': '' }}">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Go to Website
                        </p>
                    </a>
                </li>
                {{-- <li class="text-center mt-5">
                    <a href="{{ route('website') }}" class="btn btn-primary text-white" target="_blank">
                        <p class="mb-0">
                            View Website
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>