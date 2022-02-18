@php
$adminData = App\Models\Admin::where('id', Auth::guard('admin')->user()->id)->first();
@endphp

<div class="top-nav">
    <div class="header-icons icon">
        <div class="toggle-menu">
            <span class="the-toggle"><i class="fas fa-bars"></i></span>
        </div>
        <div class="message-icon icon">
            <span><i class="fas fa-envelope"></i></span>
            <span class="badge badge-1">3</span>
        </div>
        <div class="notification icon">
            <span><i class="fas fa-bell"></i></span>
            <span class="badge badge-2">3</span>
        </div>
    </div>
    <div class="search-box">
        <input type="text" class="search-input" placeholder="Search here..." />
        <input type="submit" class="btn-search" value="Search" />
    </div>
    <div class="profile">
        <div class="profile-img">
            <img src="{{!empty($adminData->	profile_image)? url('upload/profile/admin-image/'.$adminData->profile_image): url('upload/profile/default/default.png')}}" class="p-img" alt="Admin Profile Image" />
            <ul class="auth-dropdown">
                <li>
                    <a href="{{route('admin.profile')}}">
                        <span><i class="fas fa-user"></i></span>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.update.password')}}">
                        <span><i class="fas fa-key"></i></span>
                        <span> Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><i class="fas fa-cog"></i></span>
                        <span> Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.logout')}}">
                        <span><i class="fas fa-sign-out-alt"></i></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>