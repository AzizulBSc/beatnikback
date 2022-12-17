<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav on no-full">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html"><img src="{{ asset('frontend') }}/images/logo.png"
                        class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/services')}}">Our Services</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/mechanics')}}">Our Mechanics</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/products')}}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about')}}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/location')}}">Our Location</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Get Service</a></li>

                    @if (Auth::check())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home')}}">Dashboard</li>
                    @else
                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->