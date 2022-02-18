@extends ('backend.main')
@section('admin')

<div class="product-management">

    <div class="tab-pane product-form show">
        <div class="row product-area-header">
            <h2 class="heading">Update Slider Form</h2>
            <a href="" class="btn btn-back">Back to All Products</a>
        </div>
        <form action="{{route('update.slider', $slider->id)}}" method="post" class="add-product-form" enctype="multipart/form-data">
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
                        <h4>Slider Title</h4>
                        <input type="text" name="slider_title" class="form-input" value="{{$slider->slider_title}}" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Slider Description</h4>
                        <textarea name="slider_desc" class="form-input" cols="5" rows="5">
                        {{$slider->slider_desc}}
                        </textarea>
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Slider Image</h4>
                        <img src="{{asset($slider->slider_img)}}" style="width: 100px;">
                        <input type="file" name="slider_img" class="form-input" />
                        <input type="hidden" name="old_image" value="{{$slider->slider_img}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-add">Update Slider</button>
            </div>
        </form>
    </div>
</div>

@endsection