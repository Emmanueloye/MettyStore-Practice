<aside class="col-40">
    <div class="profile-card">
        <div class="profile-img">
            <img src="{{!empty(Auth::user()->profile_image)? url('upload/profile/user-image/'.Auth::user()->profile_image): url('upload/profile/default/default.png')}}" alt="profile image" />
            <p class="heading">Profile Image</p>
        </div>
    </div>
</aside>