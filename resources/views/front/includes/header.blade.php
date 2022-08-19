<header class="header header-10 header-intro-clearance">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
            </div>
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li class="login">
                                @if(Session::get('customer_id'))
                                    <a href="{{ route('customer.logout') }}">Logout</a>
                                @else
                                    <a href="{{ route('login') }}">Sign in / Sign up</a>
                                @endif
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ route('/') }}" class="logo">
                    <img src="{{asset('/')}}assets/images/demos/demo-13/logo.png" alt="Molla Logo" width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="" disabled selected>All Departments</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{$category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div><!-- End .select-custom -->
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="header-dropdown-link">
                    <div class="dropdown compare-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                            <i class="icon-random"></i>
                            <span class="compare-txt">Compare</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="compare-products">
                                <li class="compare-product">
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                </li>
                                <li class="compare-product">
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                </li>
                            </ul>

                            <div class="compare-actions">
                                <a href="#" class="action-link">Clear All</a>
                                <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                            </div>
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .compare-dropdown -->

                    <a href="wishlist.html" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">3</span>
                        <span class="wishlist-txt">Wishlist</span>
                    </a>

                    <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">{{Cart::count()}}</span>
                                <span class="cart-txt">Cart</span>
                            </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                @php($sum = 0)
                                @foreach($cart_products as $cart_product)
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">{{ $cart_product->name }}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $cart_product->qty }}</span>
                                                    x TK. {{ $cart_product->price }}
                                                </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ $cart_product->options->image }}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="{{ route('cart.delete', ['id' =>$cart_product->rowId]) }}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div>
                                    @php($sum = $sum + ($cart_product->price * $cart_product->qty))
                                @endforeach
                            </div>

                            <div class="dropdown-cart-total">
                                <span>Subtotal</span>
                                <span class="cart-total-price">TK. {{ number_format($sum) }}</span>
                            </div>
                            <div class="dropdown-cart-total">
                                <span>Tax</span>
                                @php($tax = round((($sum*15)/100)))
                                <span class="cart-total-price">TK. {{ number_format($tax )}}</span>
                            </div>
                            <div class="dropdown-cart-total">
                                <span>Total</span>
                                <span class="cart-total-price">TK. {{number_format(($sum + $tax))}}</span>
                            </div>

                            <div class="dropdown-cart-action">
                                <a href="{{ route('cart.show') }}" class="btn btn-primary">View Cart</a>
                                <a href="{{route('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div>
                    </div><!-- End .cart-dropdown -->
                </div>
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div>
    {{--    @include('front.includes.category')--}}
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown show is-on" data-visible="false">
                    {{--                    <div class="dropdown category-dropdown show is-on" data-visible="true">--}}
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        Browse Categories
                    </a>

                    <div class="dropdown-menu">
                        <!--menu show nazmul -->
                        {{--<div class="dropdown-menu show">--}}
                        <!--menu show off nazmul -->
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                @foreach($categories as $category)
                                    <li class="megamenu-container">
                                        <a class="sf-with-ul" href="{{route('category-product',['id'=>base64_encode($category->id)])}}">{{$category->name}}</a>
                                        <div class="megamenu">
                                            <div class="row no-gutters">
                                                <div class="col-md-8">
                                                    <div class="menu-col">
                                                        <div class="row">
                                                            @foreach($category->subcategory as $subcategory)
                                                                <div class="col-md-4">
                                                                    <div class="menu-title">{{ $subcategory->name }}</div>
                                                                    @foreach($subcategory->products as $subcategoryProducts)
                                                                        <ul>
                                                                            <li><a href="">{{$subcategoryProducts->name}}</a></li>
                                                                        </ul>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="banner banner-overlay">
                                                        <a href="category.html" class="banner banner-menu">
                                                            <img src="{{asset('/')}}assets/images/demos/demo-13/menu/banner-1.jpg" alt="Banner">
                                                        </a>
                                                    </div><!-- End .banner banner-overlay -->
                                                </div><!-- End .col-md-4 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu -->
                                    </li>
                                @endforeach
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div>
            {{--            @include('front.includes.menu')--}}
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container">
                            <a href="{{ route('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{route('product-allCategory')}}" >Shop</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav>
            </div>
            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p><span>Clearance Up to 30% Off</span></p>
            </div>
        </div>
    </div>
</header>


