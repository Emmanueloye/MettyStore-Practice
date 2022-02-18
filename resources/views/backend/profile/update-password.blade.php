@extends ('backend.main')
@section('admin')

<div class="new-section">
    <div class="edit-section">
        <h2 class="heading">Update Password</h2>
        <form action="{{route('admin.password.update')}}" class="equal-width-form" method="post">
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
            @if(Session('success'))
            <div class="error">
                <ul>
                    <li>{{ Session('success') }}</li>
                </ul>
            </div>
            @endif

            <div class="e-col-6">
                <div class="form-group">
                    <h4>Current Password<span>*</span></h4>
                    <input type="password" name="current_password" class="form-input" placeholder="Current Password" />
                </div>
            </div>
            <div class="e-col-6">
                <div class="form-group">
                    <h4>New Password<span>*</span></h4>
                    <input type="password" name="password" class="form-input" placeholder="New Password" />
                </div>
            </div>
            <div class="e-col-6">
                <div class="form-group">
                    <h4>Confirm Password <span>*</span></h4>
                    <input type="password" name="confirm_password" class="form-input image" placeholder="Confirm Password" />
                </div>
            </div>

            <button class="btn">Update Password</button>

        </form>
    </div>
</div>

@endsection