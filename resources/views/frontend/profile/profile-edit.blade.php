@extends('frontend.main')
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

                    <!-- Nav Tabs Body-->
                    <div class="tab-content">
                        <!-- Second tab pane -->
                        <div class="tab-pane profile-pane show" id="tab-2">
                            <h2 class="heading">Update Profile Information</h2>
                            <form action="{{route('update.profile', $user->id)}}" method="post" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="fname">Full Name</label>
                                    <input type="text" class="form-input" id="fname" name="name" placeholder="Full Name" value="{{$user->name}}" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-input" id="email" name="email" placeholder="Email Address" value="{{$user->email}}" />
                                </div>
                                <div class="form-group">
                                    <label for="image">Profile Image</label>
                                    <div class="profile-img-mod">
                                        <img src="{{!empty($user->profile_image)? url('upload/profile/user-image/'.$user->profile_image): url('upload/profile/default/default.png')}}" alt="profile image">
                                    </div>
                                    <input type="file" class="form-input" id="image" name="profile_image" />
                                </div>
                                <input type="submit" value="Update Profile" class="btn btn-update" />
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