@extends('frontend.main')
@section('content')
@section('title')
MettyHair - {{$category->category_name}}
@endsection
<div class="container product-page">
    <div class="tabs row">
        <div class="col-20">
            <div class="tab-links">
                <div class="card">
                    <div class="card-heading">
                        <!-- <span class="toggle"><i class="fas fa-bars"></i></span> -->
                        <span class="menu">{{$category->category_name}}</span>
                    </div>

                    <div class="card-body">
                        @foreach($subcategories as $subcategory)
                        <a href="{{url('/product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug)}}" class=" tab-btn">{{$subcategory->subcategory_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Tabs Body-->
        <div class="col-80">
            <div class="tab-content">
                <!-- First tab pane -->
                <div class="tab-pane all-product show" id="tab-1">
                    <div class="tab-header">
                        <h2 class="heading">{{$category->category_name}}</h2>
                        <select name="hair" id="hair-options">
                            <option value="0">Human hair</option>
                            <option value="1">short</option>
                            <option value="2">Long</option>
                            <option value="3">price</option>
                        </select>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-4">
                            <div class="card">
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
                    <div>
                        {{$products->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection