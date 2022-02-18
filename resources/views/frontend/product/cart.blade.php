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
                <span class="total-label">Total:</span>
                <span class="total">₦<strong class="total" id="cart-total">0:00</strong></span>
            </div>
            <div class="product-action row">
                <a href="products.html" class="btn btn-cart">Continue Shopping</a>
                <a href="#" class="btn btn-buy">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>
<!------------End Product Cart----------->


@endsection