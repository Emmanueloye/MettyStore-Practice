@extends ('backend.main')
@section('admin')


<div class="product-management">
    <div class="header-container">
        <h2 class="heading">Update Category Form</h2>
    </div>
    <div class="e-col-6">
        <form action="{{route('category.update', $category->id)}}" method="post">

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
                <h4>Update Navlist<span>*</span></h4>
                <select name="navlist_id" id="Nav-list" class="form-input nav-list">
                    <option value="default" selected disabled>
                        Select Nav Lists
                    </option>
                    @foreach($navlists as $navlist)
                    <option value="{{$navlist->id}}" {{$navlist->id == $category->navlist_id ? 'selected': ''}}>{{$navlist->navlist_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <h4>Update Category<span>*</span></h4>
                <input type="text" class="form-input" name="category_name" value="{{$category->category_name}}" placeholder="Category">
            </div>
            <button class="btn">Update Category</button>
        </form>
    </div>
</div>


@endsection