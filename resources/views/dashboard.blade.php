@extends('frontend.main')
@section('content')

<!-- Profile Section -->
<section class="profile-section">
    <div class="container">
        <div class="profile-info row">
            @include('frontend.profile.profile-image')
            <main class="col-60">
                <div class="tabs">
                    @include('frontend.profile.profile-tab')

                    <!-- Nav Tabs Body-->
                    <div class="tab-content">
                        <!-- First tab pane -->
                        <div class="tab-pane profile-pane show" id="tab-1">
                            <h3 class="heading">User Profile Information</h3>
                            <div class="user-info">
                                <h5 class="firstname">First Name: <span>{{Auth::user()->name}}</span></h5>
                                <h5 class="firstname">
                                    Email Address: <span>{{Auth::user()->email}}</span>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>

<!-- Suggested Product Section -->
<div class="container">
    <div class="suggested-product-section">
        <h2 class="heading">Suggested for you</h2>
        <div class="suggested-products row">
            <div class="col-4">
                <div class="card">
                    <div class="card-image">
                        <a href="productDetails.html"><img src="asset/images/image-2.jpeg" alt="Product Image" /></a>
                    </div>
                    <a href="productDetails.html">
                        <div class="card-body">
                            <h3 class="card-title">Product Name</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sint porro maiores quos ...
                            </p>
                            <div class="review">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="price-group">
                                <p class="offer-price">&#8358;100,000</p>
                                <p class="listing-price">&#8358;200,000</p>
                            </div>
                        </div>
                    </a>
                    <div class="action-cart">
                        <a href="#" class="btn btn-add-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-image">
                        <a href="productDetails.html"><img src="asset/images/image-2.jpeg" alt="Product Image" /></a>
                    </div>
                    <a href="productDetails.html">
                        <div class="card-body">
                            <h3 class="card-title">Product Name</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sint porro maiores quos ...
                            </p>
                            <div class="review">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="price-group">
                                <p class="offer-price">&#8358;100,000</p>
                                <p class="listing-price">&#8358;200,000</p>
                            </div>
                        </div>
                    </a>
                    <div class="action-cart">
                        <a href="#" class="btn btn-add-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-image">
                        <a href="productDetails.html"><img src="asset/images/image-2.jpeg" alt="Product Image" /></a>
                    </div>
                    <a href="productDetails.html">
                        <div class="card-body">
                            <h3 class="card-title">Product Name</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sint porro maiores quos ...
                            </p>
                            <div class="review">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="price-group">
                                <p class="offer-price">&#8358;100,000</p>
                                <p class="listing-price">&#8358;200,000</p>
                            </div>
                        </div>
                    </a>
                    <div class="action-cart">
                        <a href="#" class="btn btn-add-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-image">
                        <a href="productDetails.html"><img src="asset/images/image-2.jpeg" alt="Product Image" /></a>
                    </div>
                    <a href="productDetails.html">
                        <div class="card-body">
                            <h3 class="card-title">Product Name</h3>
                            <p class="short-desc">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sint porro maiores quos ...
                            </p>
                            <div class="review">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="price-group">
                                <p class="offer-price">&#8358;100,000</p>
                                <p class="listing-price">&#8358;200,000</p>
                            </div>
                        </div>
                    </a>
                    <div class="action-cart">
                        <a href="#" class="btn btn-add-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection