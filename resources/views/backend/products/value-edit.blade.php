@extends ('backend.main')
@section('admin')

<div class="product-management">

    <div class="tab-pane product-form show">
        <div class="row product-area-header">
            <h2 class="heading">Update Value Slide Form</h2>
            <a href="" class="btn btn-back">Back to All Products</a>
        </div>
        <form action="{{route('update.value.slide', $value->id)}}" method="post" class="add-product-form" enctype="multipart/form-data">
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
            <div class="main-form-body">
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Title</h4>
                        <input type="text" name="title" class="form-input" value="{{$value->title}}" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Description</h4>
                        <textarea name="short_desc" class="form-input" cols="5" rows="5">
                        {{$value->short_desc}}
                        </textarea>
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Image</h4>
                        <img src="{{asset($value->image_path)}}" style="width: 100px;">
                        <input type="file" name="image_path" class="form-input" />
                        <input type="hidden" name="old_image" value="{{$value->image_path}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-add">Update Slide</button>
            </div>
        </form>
    </div>
</div>

@endsection