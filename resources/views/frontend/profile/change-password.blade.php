@extends('frontend.main')
@section('content')@extends('frontend.main')
@section('content')

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


                    <!-- Third tab pane -->
                    <div class="tab-pane profile-pane show" id="tab-3">
                        <h2 class="heading">Update Password</h2>
                        <form action="{{route('update.password')}}" method="post">
                            @csrf
                            @if ($errors->any())
                            <div class="error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(Session('success'))
                            <div class="error">
                                <p>{{Session('success')}}</p>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="current-password">Current Password</label>
                                <input type="password" class="form-input" id="current-password" name="current_password" placeholder="Current Password" />
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-input" id="password" name="password" placeholder="New Password" />
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" class="form-input" id="confirm-password" name="confirm_password" placeholder="Confirm Password" />
                            </div>

                            <input type="submit" value="Update Password" class="btn btn-update" />
                        </form>
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

@endsection

@endsection