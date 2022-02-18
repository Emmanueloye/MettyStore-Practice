@extends ('backend.main')
@section('admin')


<div class="product-management">
    <div class="header-container">
        <h2 class="heading">Category Form</h2>
    </div>
    <div class="e-col-6">
        <form action="{{route('add.category')}}" method="post">
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
                <h4>Nav Lists<span>*</span></h4>
                <select name="navlist_id" id="Nav-list" class="form-input nav-list">
                    <option value="default" selected disabled>
                        Select Nav Lists
                    </option>
                    @foreach($navlists as $navlist)
                    <option value="{{$navlist->id}}">{{$navlist->navlist_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <h4>Category<span>*</span></h4>
                <input type="text" class="form-input" name="category_name" placeholder="Category">
            </div>
            <button class="btn">Add Category</button>
        </form>
    </div>
    <div class="header-container">
        <div class="row main-product-header">
            <h2 class="heading">Categories Lists</h2>
        </div>
    </div>
    <div class="tab-pane main-product show">
        <div class="responsive-table">
            <table class="my-table">
                <thead>
                    <tr>
                        <th>NavList Name</th>
                        <th>Category Name</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->CategoryRel->navlist_name}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td class="action-links">
                            <div class="a-btn">
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('category.delete', $category->id)}}" class="btn btn-delete"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection