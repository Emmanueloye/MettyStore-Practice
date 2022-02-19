@extends('frontend.main')
@section('content')
@section('title')
MettyHair - Shoppingcart
@endsection

<!-- ---------Alert Box------------------- -->
<div class="alert-box">
    <span class="alert-icon"><i class="fas fa-check"></i></span>
    <span class="alert-msg">Error Message</span>
</div>
<!-- ---------End Alert Box----------------- -->
<!------------Product Cart --------------->
<div class="shopping-cart">
    <div class="container">
        <div class="shopping-cart-details">
            <div class="shopping-cart-header">
                <span class="cart-heading">Shopping Cart </span>
                <span class="cart-heading">- <strong class="cart-count cart-heading">0</strong> items </span>
            </div>
            <div class="cart-items"></div>
            <div class="cart-total">

                @if(Session::has('coupon'))

                @else
                <div class="coupon-sec">
                    <label for="coupon-code">coupon Code</label>
                    <input type="text" class="form-input form-coupon" id="coupon-code" placeholder="Enter coupon code" />
                    <button class="btn btn-apply">Apply</button>
                </div>
                @endif

                <div class="cart-total-cal"></div>
            </div>
            <div class="product-action row">
                <a href="products.html" class="btn btn-cart">Continue Shopping</a>
                <a href="#" class="btn btn-buy">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>
<!------------End Product Cart----------->
<script src="{{asset('frontend/ajax/coupon.js')}}"></script>

@endsection