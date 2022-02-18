@extends ('backend.main')
@section('admin')

@if(Session('success'))
<div class="notification-msg">
    <p>{{Session('success')}}</p>
</div>
@endif

<div class="product-management">
    <div class="tab-pane main-product show">
        <div class="header-container">
            <div class="row main-product-header">
                <h2 class="heading">Product Management</h2>
                <button class="btn add-product-btn">Add New Products</button>
            </div>
        </div>

        <div class="responsive-table">
            <table class="my-table">
                <thead>
                    <tr>
                        <th class="table-size-2">Product Code</th>
                        <th class="table-size-2">Product Image</th>
                        <th class="table-size-1">Product Name</th>
                        <th class="table-size-1">Quantity</th>
                        <th class="table-size-1">Price</th>
                        <th class="table-size-1">Status</th>
                        <th class="table-size-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_code}}</td>
                        <td class="profile-img td-img">
                            <img src="{{asset($product->product_image)}}" alt="product image" />
                        </td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_qty}}</td>
                        <td>&#8358;{{number_format($product->selling_price)}}</td>
                        <td>
                            @if($product->status === 1)
                            <span class="activated">Active</span>
                            @else
                            <span class="error">Inactive</span>
                            @endif
                        </td>
                        <td class="action-links">
                            <div class="a-btn">
                                <a href="{{route('edit.product', $product->id)}}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('delete.product', $product->id)}}" class="btn btn-delete"><i class="fas fa-trash-alt"></i></a>
                                @if($product->status === 1)
                                <a href="{{route('deactivate.product', $product->id)}}" class="btn btn-delete"><i class="fas fa-arrow-down" title="Deactivate Product"></i></a>
                                @else
                                <a href="{{route('activate.product', $product->id)}}" class="btn btn-edit"><i class="fas fa-arrow-up" title="Activate Product"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane product-form">
        <div class="row product-area-header">
            <h2 class="heading">Add Product Form</h2>
            <a href="" class="btn btn-back">Back to All Products</a>
        </div>
        <form action="{{route('add.product')}}" method="post" class="add-product-form" enctype="multipart/form-data">
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
                    <input type="checkbox" name="new_arrival" id="new-arrival-check" value="1" />
                </div>
                <div class="form-group e-check">
                    <label for="popular-demand-check">Popular Demand</label>
                    <input type="checkbox" name="popular_demand" id="popular-demand-check" value="1" />
                </div>
                <div class="form-group e-check">
                    <label for="hot-deals-check">Hot Deals</label>
                    <input type="checkbox" name="hot_deals" id="hot-deals-check" value="1" />
                </div>
                <div class="form-group e-check">
                    <label for="featured-check">Featured Products</label>
                    <input type="checkbox" name="featured" id="featured-check" value="1" />
                </div>
                <div class="form-group e-check">
                    <label for="all-products-check">All Products</label>
                    <input type="checkbox" name="all_products" id="all-products-check" value="1" />
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
                            <option value="{{$navlist->id}}"> {{$navlist->navlist_name}} </option>
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
                        </select>
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Name<span>*</span></h4>
                        <input type="text" name="product_name" class="form-input" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Quantity<span>*</span></h4>
                        <input type="text" name="product_qty" class="form-input" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Color<span>*</span></h4>
                        <input type="text" name="product_color" class="form-input" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Product Tags<span>*</span></h4>
                        <input type="text" class="form-input tag-input" name="product_tag" id="tags" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Selling Price<span>*</span></h4>
                        <input type="text" name="selling_price" class="form-input" />
                    </div>
                </div>
                <div class="e-col-3">
                    <div class="form-group">
                        <h4>Discount Price<span>*</span></h4>
                        <input type="text" name="discount_price" class="form-input" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Product Image<span>*</span></h4>
                        <input type="file" name="product_image" class="form-input p-image" />
                    </div>
                    <img src="" class="img-preview">
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Thumbnail Images<span>*</span></h4>
                        <input type="file" name="thumbnail[]" class="form-input multi-img" multiple="" />
                    </div>
                    <div class="row multi-img-show"></div>
                </div>

                <div class="e-col-full">
                    <div class="form-group">
                        <h4>Short Description<span>*</span></h4>
                        <textarea name="short_desc" class="form-input" cols="2" rows="2"></textarea>
                    </div>
                </div>
                <div class="e-col-full">
                    <div class="form-group">
                        <h4>Long Description<span>*</span></h4>
                        <textarea name="long_desc" id="editor1"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-add">Add Product</button>
            </div>
        </form>
    </div>
</div>

<script src="{{asset('backend/fetchAPI/add-product.js')}}"></script>

@endsection