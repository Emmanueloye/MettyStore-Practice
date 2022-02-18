@extends ('backend.main')
@section('admin')


<div class="product-management">
    <div class="header-container">
        <h2 class="heading">Update NavList Form</h2>
    </div>
    <div class="e-col-6">
        <form action="{{route('nav.update', $navlist->id)}}" method="post">

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
            <div class="form-group">
                <h4>Update Nav List</h4>
                <input type="text" class="form-input" name="navlist_name" value="{{$navlist->navlist_name}}" placeholder="Nav List">
            </div>
            <button class="btn">Update NavList</button>
        </form>
    </div>
</div>


@endsection