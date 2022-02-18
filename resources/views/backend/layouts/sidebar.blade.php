@php
$adminData = App\Models\Admin::where('id', Auth::guard('admin')->user()->id)->first();
@endphp

<div class="side-bar-card">
    <div class="profile-img">
        <img src="{{!empty($adminData->	profile_image)? url('upload/profile/admin-image/'.$adminData->profile_image): url('upload/profile/default/default.png')}}" alt="profile-image" />
    </div>
    <div class="admin-info">
        <h3>{{Auth::guard('admin')->user()->name}}</h3>
        <p>Administrator</p>
    </div>
    <button class="close-btn">x</button>
</div>
<div class="menu-list">
    <ul class="list">
        <li class="list-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link active">
                <span class="nav-icon" title="Dashboard"><i class="fas fa-tachometer-alt"></i></span>
                <span class="item-text">Dashboard</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#" class="nav-link">
                <span class="nav-icon" title="Products"><i class="fas fa-shopping-basket"></i></span>
                <span class="item-text">Products</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{route('products')}}">Manage Products</a></li>
            </ul>
        </li>
        <li class="list-item">
            <a href="#" class="nav-link">
                <span class="nav-icon" title="Products"><i class="fas fa-shopping-basket"></i></span>
                <span class="item-text">Coupon</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{route('coupon')}}">Manage Coupon</a></li>
            </ul>
        </li>
        <li class="list-item">
            <a href="#" class="nav-link">
                <span class="nav-icon" title="Products"><i class="fas fa-shopping-basket"></i></span>
                <span class="item-text">Sliders & Others</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{route('slider')}}">Manage Slider</a></li>
                <li><a href="{{route('value')}}">Manage Value Section</a></li>
            </ul>
        </li>
        <li class="list-item">
            <a href="#" class="nav-link">
                <span class="nav-icon" title="Page Manager"><i class="fas fa-book-open"></i></span>
                <span class="item-text">Page Manager</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{route('nav.view')}}">Nav List</a></li>
                <li><a href="{{route('category.view')}}">Category</a></li>
                <li><a href="{{route('subcategory.view')}}">Sub-Category</a></li>
            </ul>
        </li>
        <li class="list-item">
            <a href="#" class="nav-link">
                <span class="nav-icon" title="Stock Management"><i class="fas fa-store-alt"></i></span>
                <span class="item-text">Stock Management</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <ul class="sub-menu">
                <li><a href="#">Inventory</a></li>
                <li><a href="#">Sales</a></li>
                <li><a href="#">Returns</a></li>
            </ul>
        </li>
        <li class="list-item">
            <a href="#" class="nav-link">
                <span class="nav-icon" title="Order Management"><i class="fas fa-people-arrows"></i></span>
                <span class="item-text">Order Management</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <ul class="sub-menu">
                <li><a href="#">Inventory</a></li>
                <li><a href="#">Sales</a></li>
                <li><a href="#">Returns</a></li>
            </ul>
        </li>
    </ul>
</div>