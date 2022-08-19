@extends('front.master')

@section('title')
    Checkout
@endsection

@section('body')
    <main class="main">
        <div class="page-header text-center" style="background-image:url('{{asset('/')}}assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
{{--                    <div class="checkout-discount">--}}
{{--                        <form action="#">--}}
{{--                            <input type="text" class="form-control" required id="checkout-discount-input">--}}
{{--                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>--}}
{{--                        </form>--}}
{{--                    </div><!-- End .checkout-discount -->--}}
                    <form action="{{ route('order.new') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title text-center">Please fillup form carefully</h2>
                                <label>Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                                <label>Mobile Number<span class="text-danger">*</span></label>
                                <input type="text" name="mobile" class="form-control" required>
                                <label>Delivery Address<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="delivery_address" required cols="30" rows="4" placeholder="Please give your order delivery address"></textarea>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3>

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($sum=0)
                                        @foreach($cart_products as $cart_product)
                                        <tr>
                                            <td><a href="#">{{$cart_product->name}}</a></td>
                                            <td>{{$cart_product->price*$cart_product->qty}}</td>
                                            @php($sum = $sum + ($cart_product->price * $cart_product->qty))
                                        </tr>
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{number_format($sum)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr>
                                            <td>Tax:</td>
                                            <td>{{number_format($tax = round(($sum*15)/100)) }}</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>{{number_format($tax + $sum)}}</td>
                                            <?php Session::put('tax', $tax);?>
                                            <?php Session::put('total', ($tax + $sum));?>
                                        </tr>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                </div>
                            </aside>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection


