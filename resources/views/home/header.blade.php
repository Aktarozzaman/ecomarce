<!-- header section strats -->
<header class="header_section">
    <style>
        .cart-count {
            /* background-color: #ff0000; */
            color: #ff0000;
            padding: 3px 7px;
            border-radius: 60%;
        }
    </style>

    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="200" src="{{ asset('home/images/logo.png') }}"
                    alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('all_product') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/show_order') }}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_cart') }}"><span
                                class="material-symbols-outlined">shopping_cart</span>
                            <!-- Check if cart items are available -->
                            @if (isset($cartItems) && $cartItems->isNotEmpty())
                                <!-- Display cart items count or other details -->
                                <span class="cart-count">{{ $cartItems->count() }}</span>
                            @else
                                 {{-- <span class="cart-count">{{ $cartItems = 0 }}</span> --}}
                            @endif
                            

                        </a>


                    </li>





                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss"
                                    href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item">

                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Resister</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
