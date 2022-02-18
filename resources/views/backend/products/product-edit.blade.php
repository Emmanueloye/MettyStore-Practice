@extends ('backend.main')
@section('admin')

<div class="product-management">
    <div class="tab-pane product-form show">
        <div class="row product-area-header">
            <h2 class="heading">Add Product Form</h2>
        </div>
        <form action="{{route('update.product', $product->id)}}" method="post" class="add-product-form" enctype="multipart/form-data">
            @csrf
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
            <div class="row e-check-header">
                <div class="form-group e-check">
                    <label for="new-arrival-check">New Arrivals</label>
                    <input type="checkbox" name="new_arrival" id="new-arrival-check" value="1" {{$product->new_arrival === 1 ? 'checked': ''}} />
                </div>
                <div class="form-group e-check">
                    <label for="popular-demand-check">Popular Demand</label>
                    <input type="checkbox" name="popular_demand" id="popular-demand-check" value="1" {{$product->popular_demand == 1? 'checked': '' }} />
                </div>
                <div class="form-group e-check">
                    <label for="hot-deals-check">Hot Deals</label>
                    <input type="checkbox" name="hot_deals" id="hot-deals-check" value="1" {{$product->hot_deals === 1 ? 'checked': ''}} />
                </div>
                <div class="form-group e-check">
                    <label for="featured-check">Featured Products</label>
                    <input type="checkbox" name="featured" id="featured-check" value="1" {{$product->featured === 1 ? 'checked': ''}} />
                </div>
                <div class="form-group e-check">
                    <label for="all-products-check">All Products</label>
                    <input type="checkbox" name="all_products" id="all-products-check" value="1" {{$product->all_products === 1 ? 'checked': ''}} />
                </div>
            </div>
            <div class="e-col-3">
                <div class="form-group">
                    <h4>Product Code<span>*</span></h4>
                    <input type="text" name="product_Code" class="form-input" value="{{$product->product_code}}" disabled />
                </div>
            </div>
            <div class="row main-form-body">
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Nav Lists<span>*</span></h4>
                        <select name="navlist_id" id="Nav-list" class="nav-list">
                            <option value="default" selected disabled>
                                Select NavLists
                            </option>
                            @foreach($navlists as $navlist)
                            <option value="{{$navlist->id}}" {{$navlist->id == $product->navlist_id ? 'selected': ''}}> {{$navlist->navlist_name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Category<span>*</span></h4>
                        <select name="category_id" id="Category" class="category">
                            <option value="default" selected disabled>
                                Select Category
                            </option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected': ''}}> {{$category->category_name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>SubCategory<span>*</span></h4>
                        <select name="subcategory_id" id="SubCategory">
                            <option value="default" selected disabled>
                                Select SubCategory
                            </option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}" {{$subcategory->id == $product->subcategory_id ? 'selected': ''}}> {{$subcategory->subcategory_name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Name<span>*</span></h4>
                        <input type="text" name="product_name" class="form-input" value="{{$product->product_name}}" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Quantity<span>*</span></h4>
                        <input type="text" name="product_qty" class="form-input" value="{{$product->product_qty}}" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Color<span>*</span></h4>
                        <input type="text" name="product_color" class="form-input" value="{{$product->product_color}}" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Tags<span>*</span></h4>
                        <input type="text" class="form-input tag-input" name="product_tag" id="tag-edit" value="{{$product->product_tag}}" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Selling Price<span>*</span></h4>
                        <input type="text" name="selling_price" class="form-input" value="{{$product->selling_price}}" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Discount Price<span>*</span></h4>
                        <input type="text" name="discount_price" class="form-input" value="{{$product->discount_price}}" />
                    </div>
                </div>
                <div class="e-col-4 exception-col-4">
                    <div class="form-group">
                        <div class="prev-image">
                            <img src="{{asset($product->product_image)}}" alt="Product image">
                        </div>
                        <h4 class="img-txt">Update Product Image</h4>
                        <input type="file" name="product_image" class="form-input p-image" />
                        <input type="hidden" name="old_image" value="{{$product->product_image}}">
                    </div>
                    <img src="" class="img-preview">
                </div>
                <div class="e-col-8 row flex">
                    @foreach($thumbnails as $img)
                    <div class="e-col-4 ">
                        <div class="form-group">
                            <div class="prev-image">
                                <img src="{{asset($img->thumbnail_img)}}" alt="thumbnail images">
                            </div>
                            <h4 class="img-txt">Update Images</h4>
                            <input type="file" name="thumbnail[{{$img->id}}]" class="form-input multi-img" />
                        </div>
                    </div>
                    @endforeach
                    <div class="multi-img-show"></div>
                </div>

                <div class="e-col-full">
                    <div class="form-group">
                        <h4>Short Description<span>*</span></h4>
                        <textarea name="short_desc" class="form-input" cols="2" rows="2">{{$product->short_desc}}</textarea>
                    </div>
                </div>
                <div class="e-col-full">
                    <div class="form-group">
                        <h4>Long Description<span>*</span></h4>
                        <textarea name="long_desc" id="editor2">{{$product->long_desc}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-add">Update Product</button>
            </div>
        </form>
    </div>
</div>

<script src="{{asset('backend/fetchAPI/add-product.js')}}"></script>

@endsection