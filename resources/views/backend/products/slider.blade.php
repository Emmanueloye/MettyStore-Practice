@extends ('backend.main')
@section('admin')

<div class="product-management">
    <div class="tab-pane main-product show">
        <div class="header-container">
            <div class="row main-product-header">
                <h2 class="heading">Manage Slider</h2>
                <button class="btn add-product-btn">Add New Slider</button>
            </div>
        </div>

        <div class="responsive-table">
            <table class="my-table">
                <thead>
                    <tr>
                        <th class="table-size-2">Slider Image</th>
                        <th class="table-size-2">Slider Title</th>
                        <th class="table-size-1">Slider Description</th>
                        <th class="table-size-1">Status</th>
                        <th class="table-size-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td class="profile-img td-img">
                            <img src="{{asset($slider->slider_img)}}" alt="product image" />
                        </td>
                        <td>
                            @if($slider->slider_title === NULL)
                            <span class="error">No title</span>
                            @else
                            {{$slider->slider_title}}
                            @endif
                        </td>
                        <td>
                            @if($slider->slider_desc === NULL)
                            <span class="error">No description</span>
                            @else
                            {{$slider->slider_desc}}
                            @endif
                        </td>
                        <td>
                            @if($slider->status === 1)
                            <span class="activated">Active</span>
                            @else
                            <span class="error">Inactive</span>
                            @endif
                        </td>
                        <td class="action-links">
                            <div class="a-btn">
                                <a href="{{route('edit.slider', $slider->id)}}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('delete.slider', $slider->id)}}" class="btn btn-delete"><i class="fas fa-trash-alt"></i></a>
                                @if($slider->status === 1)
                                <a href="{{route('deactivate.slider', $slider->id)}}" class="btn btn-delete"><i class="fas fa-arrow-down" title="Deactivate Slider"></i></a>
                                @else
                                <a href="{{route('activate.slider', $slider->id)}}" class="btn btn-edit"><i class="fas fa-arrow-up" title="Activate Slider"></i></a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-pane product-form">
        <div class="row product-area-header">
            <h2 class="heading">Add Slider Form</h2>
            <a href="" class="btn btn-back">Back to All Products</a>
        </div>
        <form action="{{route('add.slider')}}" method="post" class="add-product-form" enctype="multipart/form-data">
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
                        <input type="text" name="slider_title" class="form-input" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Slider Description</h4>
                        <textarea name="slider_desc" class="form-input" cols="5" rows="5"></textarea>
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Slider Image<span>*</span></h4>
                        <input type="file" name="slider_img" class="form-input" />
                    </div>
                </div>

                <button type="submit" class="btn btn-add">Add Slider</button>
            </div>
        </form>
    </div>
</div>

@endsection