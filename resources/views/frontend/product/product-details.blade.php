@extends('frontend.main')
@section('content')

@section('title')
MettyHair - {{$product->product_name}}
@endsection

<!-- ---------Alert Box------------------- -->
<div class="alert-box">
    <span class="alert-icon"><i class="fas fa-check"></i></span>
    <span class="alert-msg">Error Message</span>
</div>
<!-- ---------End Alert Box----------------- -->

<!------------Product Image Slider --------------->
<section class="products-info">
    <div class="container">
        <div class="product-slider row">
            <div class="col-40">
                <div class="product-top-img">
                    <img class="main-image" src="{{asset($product->product_image)}}" alt="Current Product Image" />
                </div>
                <div class="thumbnails">
                    <div class="thumb">
                        <img src="{{asset($product->product_image)}}" class="thumb-img" alt="product Image" />
                    </div>
                    @foreach($thumbnails as $img)
                    <div class="thumb">
                        <img src="{{asset($img->thumbnail_img)}}" class="thumb-img" alt="product Image" />
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-60">
                <div class="product-details">
                    <h2 class="card-title">{{$product->product_name}}</h2>
                    <h4 class="product-type">
                        Product Type: <span>{{$product->subcategotyRel->subcategory_name}}</span>
                    </h4>
                    <input type="hidden" class="id" value="{{$product->id}}">
                    <div class="review">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span class="remark">(Verified product ratings)</span>
                    </div>
                    <h3 class="sec-heading">Description</h3>
                    <p class="short-desc">
                        {{$product->short_desc}}
                    </p>
                    <h3 class="sec-heading">Price</h3>
                    <div class="pricing">
                        @if($product->discount_price == NULL)
                        <span class="offer-price">₦{{number_format($product->selling_price)}}</span>
                        @else
                        <span class="offer-price">₦{{number_format($product->discount_price)}}</span>
                        <span class="listing-price">₦{{number_format($product->selling_price)}}</span>
                        @endif
                    </div>
                    <div class="qty-input">
                        <label for="quantity">Quantity: </label>
                        <input type="number" id="quantity" class="form-input" value="1" min="1" />
                    </div>
                    <div class="product-action row">
                        <button class="btn btn-cart p-det-cart">Add to Cart</button>
                        <a href="#" class="btn btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------------End Product Image Slider ----------->
<!------------Product Review tab------------------>
<section class="review-section">
    <div class="container">
        <div class="tabs row">
            <div class="col-20">
                <div class="tab-links">
                    <button class="tab-btn active" data-id="tab-1">
                        Description
                    </button>
                    <button class="tab-btn" data-id="tab-2">Review</button>
                </div>
            </div>

            <!-- Nav Tabs Body-->
            <div class="col-80">
                <div class="tab-content">
                    <!-- First tab pane -->
                    <div class="tab-pane long-desc show" id="tab-1">
                        <h4 class="sec-heading">Product Details</h4>
                        <p>
                            {!!$product->long_desc!!}
                        </p>
                    </div>

                    <!-- Second tab pane -->
                    <div class="tab-pane customer-reviews" id="tab-2">
                        <button class="btn add-review-btn">Add Review</button>
                        <h3 class="review-heading">Customer Reviews</h3>
                        <div class="review-card">
                            <div class="review-title">
                                <span class="summary">We love the Product</span>
                                <span class="date"><i class="far fa-calendar-alt"></i> 1 day ago</ispan>
                            </div>
                            <p class="main-review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus rem aut, harum error magnam ut laboriosam repellendus soluta voluptate. Doloremque laudantium vero quod sapiente neque, dolorem nihil doloribus dolore placeat.</p>
                        </div>
                        <div class="review-card">
                            <div class="review-title">
                                <span class="summary">We love the Product</span>
                                <span class="date"><i class="far fa-calendar-alt"></i> 1 day ago</ispan>
                            </div>
                            <p class="main-review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus rem aut, harum error magnam ut laboriosam repellendus soluta voluptate. Doloremque laudantium vero quod sapiente neque, dolorem nihil doloribus dolore placeat.</p>
                        </div>
                        <div class="review-card">
                            <div class="review-title">
                                <span class="summary">We love the Product</span>
                                <span class="date"><i class="far fa-calendar-alt"></i> 1 day ago</ispan>
                            </div>
                            <p class="main-review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus rem aut, harum error magnam ut laboriosam repellendus soluta voluptate. Doloremque laudantium vero quod sapiente neque, dolorem nihil doloribus dolore placeat.</p>
                        </div>
                    </div>

                    <!-- Third tab pane -->
                    <div class="tab-pane add-review-form" id="tab-3">
                        <h2 class="review-heading">Product Review Form</h2>
                        <h3 class="review-sub-heading">Thanks for your patronage. Please Write your review</h3>
                        <div class="responsive-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Criteria/Ratings</th>
                                        <th>1 star</th>
                                        <th>2 stars</th>
                                        <th>3 stars</th>
                                        <th>4 stars</th>
                                        <th>5 stars</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell-label">Quanlity</td>
                                        <td><input type="radio" name="quality" value="1"></td>
                                        <td><input type="radio" name="quality" value="2"></td>
                                        <td><input type="radio" name="quality" value="3"></td>
                                        <td><input type="radio" name="quality" value="4"></td>
                                        <td><input type="radio" name="quality" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td class="cell-label">Price</td>
                                        <td><input type="radio" name="price" value="1"></td>
                                        <td><input type="radio" name="price" value="2"></td>
                                        <td><input type="radio" name="price" value="3"></td>
                                        <td><input type="radio" name="price" value="4"></td>
                                        <td><input type="radio" name="price" value="5"></td>
                                    </tr>
                                    <tr>
                                        <td class="cell-label">Value</td>
                                        <td><input type="radio" name="value" value="1"></td>
                                        <td><input type="radio" name="value" value="2"></td>
                                        <td><input type="radio" name="value" value="3"></td>
                                        <td><input type="radio" name="value" value="4"></td>
                                        <td><input type="radio" name="value" value="5"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form action="" class="review-form">
                            <div class="form-group">
                                <label for="name">Your Name<span>*</span></label>
                                <input type="text" id="name" class="form-input" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="review-summary">Review Summary<span>*</span></label>
                                <input type="text" id="review-summary" class="form-input" placeholder="Review Summary">
                            </div>
                            <div class="form-group">
                                <label for="review">Review<span>*</span></label>
                                <textarea id="review" class="form-input" cols="10" rows="5"></textarea>
                            </div>
                            <input type="submit" value="Submit Review" class="btn btn-review">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------------End Product Review tab-------------->

<!------------ Related Product Section ----------->
<div class="container">
    <div class="related-product-section">
        <h2 class="heading">Related Products</h2>
        <div class="related-products row">
            @foreach($relatedProducts as $product)
            <div class="col-4">
                <div class="card">
                    <div class="card-image">
                        <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_image)}}" alt="Product Image" /></a>
                        @php
                        $amount = $product->selling_price - $product->discount_price;
                        $discount = round(($amount / $product->selling_price ) * 100);
                        @endphp
                        @if($product->discount_price == NULL)
                        <div class="e-badge-new">Sales</div>
                        @else
                        <div class="e-badge-hot">{{$discount}}% <br> Off</div>
                        @endif
                    </div>
                    <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}">
                        <div class="card-body">
                            <h3 class="card-title">{{\Illuminate\Support\Str::limit($product->product_name, 24, '...')}}</h3>
                            <p class="short-desc">
                                {{\Illuminate\Support\Str::limit($product->short_desc, 100, '...')}}
                            </p>
                            <div class="review">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="price-group">
                                @if($product->discount_price == NULL)
                                <p class="offer-price">&#8358;{{number_format($product->selling_price)}}</p>
                                @else
                                <p class="offer-price">&#8358;{{number_format($product->discount_price)}}</p>
                                <p class="listing-price">&#8358;{{$product->selling_price}}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="action-cart">
                        <a href="#" class="btn btn-add-cart">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection