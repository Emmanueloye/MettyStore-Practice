@extends ('backend.main')
@section('admin')

<div class="new-section">
    <div class="edit-section">
        <h2 class="heading">Update Profile Information</h2>
        <form action="{{route('admin.profile.store')}}" class="equal-width-form" method="post" enctype="multipart/form-data">
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
            <div class="row">
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Name</h4>
                        <input type="text" name="name" class="form-input" placeholder="Name" value="{{$adminData->name}}" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Email</h4>
                        <input type="text" name="email" class="form-input" placeholder="Email Address" value="{{$adminData->email}}" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Profile Image</h4>
                        <input type="file" name="profile_image" class="form-input image" placeholder="Address" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group prev-img">
                        <img src="{{!empty($adminData->profile_image)? url('upload/profile/admin-image/'.$adminData->profile_image): url('upload/profile/default/default.png')}}" alt="Profile Image Preview" class="image-preview">
                    </div>
                </div>
                <button class="btn">Update Profile</button>
            </div>
        </form>
    </div>
</div>

<script>
    // variables for Image Preview
    let image = document.querySelector(".image");
    let imagePreview = document.querySelector(".image-preview");

    // Image Preview Functionality
    image.addEventListener("change", function(e) {
        let reader = new FileReader();
        reader.addEventListener("load", function(e) {
            imagePreview.src = reader.result;
        });
        reader.readAsDataURL(e.target.files[0]);
    });
</script>

@endsection