  @extends('frontend.main')
  @section('content')
  @section('title')
  MettyHair - Home
  @endsection
  <!-------------- Hero Section --------------->
  <div class="hero-section">
      <div class="slider">
          @foreach($sliders as $slider)
          <div class="slide show">
              <div class="slider-bg" style="
              background-image: linear-gradient(
                  rgba(0, 0, 0, 0.5),
                  rgba(0, 0, 0, 0.5)
                ),
                url({{asset($slider->slider_img)}});
            ">
                  <div class="slider-content">
                      <h2 class="slider-heading">
                          {{$slider->slider_title}}
                      </h2>
                      <p class="slider-parag">
                          {{$slider->slider_desc}}
                      </p>
                      <a href="products.html" class="btn">Shop Now</a>
                  </div>
              </div>
          </div>
          @endforeach
          <div class="slider-control">
              <span class="prev-btn"><i class="fas fa-angle-left"></i></span>
              <span class="next-btn"><i class="fas fa-angle-right"></i></span>
          </div>
      </div>
  </div>
  <!-------------- EndHero Section ------------>

  <!---------- Business Culture Section ------->
  <div class="culture">
      <div class="container">
          <h2 class="heading">Why Choose Us</h2>
          <div class="row">
              <div class="col-3 col-12">
                  <div class="biz-card" style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)
                  ),
                  url('{{asset('frontend/asset/images/slider1.jpg')}}');
              ">
                      <div class="biz-card-heading">Transparency</div>
                      <div class="biz-card-body">
                          <p class="biz-card-text">
                              Ask your questions, make your findings. We are plain as white.
                          </p>
                          <a href="#" class="btn">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-3 col-12">
                  <div class="biz-card" style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)
                  ),
                  url('{{asset('frontend/asset/images/slider2.jpg')}}');
              ">
                      <div class="biz-card-heading">Integrity</div>
                      <div class="biz-card-body">
                          <p class="biz-card-text">
                              We sell what you see. What you see is what you get.
                          </p>
                          <a href="#" class="btn">See More</a>
                      </div>
                  </div>
              </div>
              <div class="col-3 col-12">
                  <div class="biz-card" style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)
                  ),
                  url('{{asset('frontend/asset/images/slider3.jpg')}}');
              ">
                      <div class="biz-card-heading special">Customer Service</div>
                      <div class="biz-card-body">
                          <p class="biz-card-text">
                              Be in touch with us. We are here to listen. Also monitor your
                              order.
                          </p>
                          <div class="customer-options">
                              <a href="#" class="btn">Track Order</a>
                              <a href="#" class="btn">Contact us</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-------- End Business Culture Section ----->

  <!-- ---------Alert Box------------------- -->
  <div class="alert-box">
      <span class="alert-icon"><i class="fas fa-check"></i></span>
      <span class="alert-msg">Error Message</span>
  </div>
  <!-- ---------End Alert Box----------------- -->

  <!---------- Hair Category Section ------------>
  <div class="section-header">
      <div class="container">
          <div class="new-section-header">
              <h2 class="heading">{{$hairSkip->category_name}}</h2>
          </div>
          <div class="owl-carousel owl-theme">
              @foreach($hairProducts as $product)
              <div class="card products">
                  <div class="card-image">
                      <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_image)}}" alt="Product Image" /></a>
                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = round(($amount / $product->selling_price ) * 100);
                      @endphp
                      @if($product->discount_price == NULL)
                      <div class="e-badge-new">New</div>
                      @else
                      <div class="e-badge-hot">{{$discount}}% <br> Off</div>
                      @endif
                  </div>
                  <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}">
                      <div class="card-body">
                          <h3 class="card-title product-name">{{\Illuminate\Support\Str::limit($product->product_name, 24, '...')}}</h3>
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
                              <p class="offer-price selling-price">&#8358;{{number_format($product->selling_price)}}</p>
                              @else
                              <p class="offer-price discount-price">&#8358;{{number_format($product->discount_price)}}</p>
                              <p class="listing-price">&#8358;{{$product->selling_price}}</p>
                              @endif
                          </div>
                      </div>
                  </a>
                  <input type="hidden" class="id" value="{{$product->id}}">
                  <input type="hidden" class="product-qty" value="1" min="1">
                  <input type="hidden" class="subcategory" value="{{$product->subcategotyRel->subcategory_name}}">
                  <div class="action-cart">
                      <button class="btn btn-add-cart">Add to Cart</button>
                  </div>
              </div>
              @endforeach
          </div>
          <div class="call-to-action">
              <a href="#" class="btn btn-shop">Shop Now</a>
          </div>
      </div>
  </div>
  <!---------- End Hair Category  Section -------->

  <!---------- Hair Accessories Section ------------>
  <div class="section-header">
      <div class="container">
          <div class="new-section-header">
              <h2 class="heading">{{$accessoriesSkip->category_name}}</h2>
          </div>
          <div class="owl-carousel owl-theme">
              @foreach($accessoriesProducts as $product)
              <div class="card products">
                  <div class="card-image">
                      <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_image)}}" alt="Product Image" /></a>
                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = round(($amount / $product->selling_price ) * 100);
                      @endphp
                      @if($product->discount_price == NULL)
                      <div class="e-badge-new">New</div>
                      @else
                      <div class="e-badge-hot">{{$discount}}% <br> Off</div>
                      @endif
                  </div>
                  <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}">
                      <div class="card-body">
                          <h3 class="card-title product-name">{{\Illuminate\Support\Str::limit($product->product_name, 24, '...')}}</h3>
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
                              <p class="offer-price selling-price">&#8358;{{number_format($product->selling_price)}}</p>
                              @else
                              <p class="offer-price discount-price">&#8358;{{number_format($product->discount_price)}}</p>
                              <p class="listing-price">&#8358;{{$product->selling_price}}</p>
                              @endif
                          </div>
                      </div>
                  </a>
                  <input type="hidden" class="id" value="{{$product->id}}">
                  <input type="hidden" class="product-qty" value="1" min="1">
                  <input type="hidden" class="subcategory" value="{{$product->subcategotyRel->subcategory_name}}">
                  <div class="action-cart">
                      <button class="btn btn-add-cart">Add to Cart</button>
                  </div>
              </div>
              @endforeach
          </div>
          <div class="call-to-action">
              <a href="#" class="btn btn-shop">Shop Now</a>
          </div>
      </div>
  </div>
  <!---------- End Hair Accessories  Section -------->

  <!---------- Hair Care Section ------------>
  <div class="section-header">
      <div class="container">
          <div class="new-section-header">
              <h2 class="heading">{{$haircareSkip->category_name}}</h2>
          </div>
          <div class="owl-carousel owl-theme">
              @forelse($haircareProduct as $product)
              <div class="card products">
                  <div class="card-image">
                      <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_image)}}" alt="Product Image" /></a>
                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = round(($amount / $product->selling_price ) * 100);
                      @endphp
                      @if($product->discount_price == NULL)
                      <div class="e-badge-new">New</div>
                      @else
                      <div class="e-badge-hot">{{$discount}}% <br> Off</div>
                      @endif
                  </div>
                  <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}">
                      <div class="card-body">
                          <h3 class="card-title product-name">{{\Illuminate\Support\Str::limit($product->product_name, 24, '...')}}</h3>
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
                              <p class="offer-price selling-price">&#8358;{{number_format($product->selling_price)}}</p>
                              @else
                              <p class="offer-price discount-price">&#8358;{{number_format($product->discount_price)}}</p>
                              <p class="listing-price">&#8358;{{$product->selling_price}}</p>
                              @endif
                          </div>
                      </div>
                  </a>
                  <input type="hidden" class="id" value="{{$product->id}}">
                  <input type="hidden" class="subcategory" value="{{$product->subcategotyRel->subcategory_name}}">
                  <input type="hidden" class="product-qty" value="1" min="1">
                  <div class="action-cart">
                      <button class="btn btn-add-cart">Add to Cart</button>
                  </div>
              </div>
              @empty
              <div class="empty-notice">
                  <P>Sorry, No product is found for this category</P>
              </div>
              @endforelse
          </div>
          <div class="call-to-action">
              <a href="#" class="btn btn-shop">Shop Now</a>
          </div>
      </div>
  </div>
  <!---------- End Hair Care  Section -------->

  <!---------- New Arrival Section ------------>
  <div class="new-arrivals section-header">
      <div class="container">
          <div class="new-section-header">
              <h2 class="heading">New Products</h2>
          </div>
          <div class="owl-carousel owl-theme">
              @foreach($products as $product)
              <div class="card products">
                  <div class="card-image">
                      <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_image)}}" alt="Product Image" /></a>
                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = round(($amount / $product->selling_price ) * 100);
                      @endphp
                      @if($product->discount_price == NULL)
                      <div class="e-badge-new">New</div>
                      @else
                      <div class="e-badge-hot">{{$discount}}% <br> Off</div>
                      @endif
                  </div>
                  <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}">
                      <div class="card-body">
                          <h3 class="card-title product-name">{{\Illuminate\Support\Str::limit($product->product_name, 24, '...')}}</h3>
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
                              <p class="offer-price selling-price">&#8358;{{number_format($product->selling_price)}}</p>
                              @else
                              <p class="offer-price discount-price">&#8358;{{number_format($product->discount_price)}}</p>
                              <p class="listing-price">&#8358;{{$product->selling_price}}</p>
                              @endif
                          </div>
                      </div>
                  </a>
                  <input type="hidden" class="id" value="{{$product->id}}">
                  <input type="hidden" class="product-qty" value="1" min="1">
                  <input type="hidden" class="subcategory" value="{{$product->subcategotyRel->subcategory_name}}">
                  <div class="action-cart">
                      <button class="btn btn-add-cart">Add to Cart</button>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
  <!---------- End New Arrival Section -------->

  <!---------- Popular Demand Section --------->
  <div class="Popular-Demand section-header">
      <div class="container">
          <div class="new-section-header">
              <h2 class="heading">Popular Demand</h2>
          </div>
          <div class="owl-carousel owl-theme">
              @foreach($highDemands as $product)
              <div class="card products">
                  <div class="card-image">
                      <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_image)}}" alt="Product Image" /></a>
                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = round(($amount / $product->selling_price ) * 100);
                      @endphp
                      @if($product->discount_price == NULL)
                      <div class="e-badge-new">New</div>
                      @else
                      <div class="e-badge-hot">{{$discount}}% <br> Off</div>
                      @endif
                  </div>
                  <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}">
                      <div class="card-body">
                          <h3 class="card-title product-name">{{\Illuminate\Support\Str::limit($product->product_name, 24, '...')}}</h3>
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
                              <p class="offer-price selling-price">&#8358;{{number_format($product->selling_price)}}</p>
                              @else
                              <p class="offer-price discount-price">&#8358;{{number_format($product->discount_price)}}</p>
                              <p class="listing-price">&#8358;{{$product->selling_price}}</p>
                              @endif
                          </div>
                      </div>
                  </a>
                  <input type="hidden" class="id" value="{{$product->id}}">
                  <input type="hidden" class="product-qty" value="1" min="1">
                  <input type="hidden" class="subcategory" value="{{$product->subcategotyRel->subcategory_name}}">
                  <div class="action-cart">
                      <button class="btn btn-add-cart">Add to Cart</button>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
  <!-------- End Popular Demand Section ------->

  <!------------ Hot Deals Section ------------>
  <div class="hot-deal section-header">
      <div class="container">
          <div class="new-section-header">
              <h2 class="heading">Hot Deals</h2>
          </div>
          <div class="owl-carousel owl-theme">
              @foreach($hotDeals as $product)
              <div class="card products">
                  <div class="card-image">
                      <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_image)}}" alt="Product Image" /></a>
                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = round(($amount / $product->selling_price ) * 100);
                      @endphp
                      @if($product->discount_price == NULL)
                      <div class="e-badge-new">New</div>
                      @else
                      <div class="e-badge-hot">{{$discount}}% <br> Off</div>
                      @endif
                  </div>
                  <a href="{{url('/product-details/'.$product->id.'/'.$product->product_slug)}}">
                      <div class="card-body">
                          <h3 class="card-title product-name">{{\Illuminate\Support\Str::limit($product->product_name, 24, '...')}}</h3>
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
                              <p class="offer-price selling-price">&#8358;{{number_format($product->selling_price)}}</p>
                              @else
                              <p class="offer-price discount-price">&#8358;{{number_format($product->discount_price)}}</p>
                              <p class="listing-price">&#8358;{{$product->selling_price}}</p>
                              @endif
                          </div>
                      </div>
                  </a>
                  <input type="hidden" class="id" value="{{$product->id}}">
                  <input type="hidden" class="product-qty" value="1" min="1">
                  <input type="hidden" class="subcategory" value="{{$product->subcategotyRel->subcategory_name}}">
                  <div class="action-cart">
                      <button class="btn btn-add-cart">Add to Cart</button>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
  <!------------ End Hot Deals Section -------->

  @endsection