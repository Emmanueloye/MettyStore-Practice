<div class="tab-links">
    <a href="{{route('dashboard')}}" class="tab-btn active">User Profile</a>
    <a href="{{route('edit-profile', Auth::user()->id)}}" class="tab-btn">Update Profile</a>
    <a href="{{route('change.password', Auth::user()->id)}}" class="tab-btn">Change Passward</a>
</div>