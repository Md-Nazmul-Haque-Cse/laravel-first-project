@extends('front.master')

@section('title')
    Complete Order
@endsection

@section('body')
    <main class="main">
        <div class="page-header text-center" style="background-image:url('{{asset('/')}}assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Complete<span>Order</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product-allCategory')}}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Complete Order</li>
                </ol>
            </div>
        </nav>
        <div class="page-content">
            <div class="checkout">
                <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="checkout-title text-center text-success">
                                Welcome {{Session::get('name')}},
                                {{ Session:: get('message')}}
                                </h3>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </main>
@endsection



