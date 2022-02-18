@extends ('backend.main')
@section('admin')


<div class="product-management">
    <div class="header-container">
        <h2 class="heading">Update Category Form</h2>
    </div>
    <div class="e-col-6">
        <form action="{{route('subcategory.update', $subcategory->id)}}" method="post">

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
                    <option value="{{$navlist->id}}" {{$navlist->id == $subcategory->navlist_id ? 'selected': ''}}>{{$navlist->navlist_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <h4>Update Category<span>*</span></h4>
                <select name="category_id" id="category" class="form-input">
                    <option value="default" selected disabled>
                        Select Category
                    </option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected': ''}}>{{$category->category_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <h4>Update Subcategory<span>*</span></h4>
                <input type="text" class="form-input" name="subcategory_name" value="{{$subcategory->subcategory_name}}" placeholder="Subcategory">
            </div>
            <button class="btn">Update Subcategory</button>
        </form>
    </div>
</div>


@endsection