@extends ('backend.main')
@section('admin')

<div class="new-section">
    <div class="profile-area">
        <a href="{{route('admin.edit')}}" class="btn btn-edit">Edit Profile</a>
        <div class="profile-area-img">
            <img src="{{!empty($adminData->	profile_image)? url('upload/profile/admin-image/'.$adminData->profile_image): url('upload/profile/default/default.png')}}" alt="Admin profile image" />
        </div>

        <div class="line"></div>
        <div class="admin-details">
            <div class="row admin-user-info">
                <div class="info e-col-3">
                    <h3>role</h3>
                    <p>Administrator</p>
                </div>
                <div class="info e-col-3">
                    <h3>Name</h3>
                    <p>{{$adminData->name}}</p>
                </div>
                <div class="info e-col-3">
                    <h3>Email</h3>
                    <p class="email-addr">{{$adminData->email}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection