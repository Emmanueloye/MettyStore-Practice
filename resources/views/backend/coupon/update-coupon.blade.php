@extends ('backend.main')
@section('admin')

<div class="product-management">

    <div class="tab-pane product-form show">
        <div class="row product-area-header">
            <h2 class="heading">Update Coupon</h2>
        </div>
        <form action="{{route('update.coupon', $coupon->id)}}" method="post" class="add-product-form">
            @csrf
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
                        <h4>Coupon Code<span>*</span></h4>
                        <input type="text" name="coupon_code" class="form-input" value="{{$coupon->coupon_code}}" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Coupon Type<span>*</span></h4>
                        <select name="coupon_type">
                            <option value="default" selected disabled>Select coupon type</option>
                            <option value="Fixed" {{$coupon->coupon_type == 'Fixed'? 'selected': ''}}>Fixed</option>
                            <option value="Percentage" {{$coupon->coupon_type == 'Percentage'? 'selected': ''}}>Percentage</option>
                        </select>
                    </div>
                </div>

                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Coupon Discount<span>*</span></h4>
                        <input type="text" name="coupon_discount" class="form-input" value="{{$coupon->coupon_discount}}" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Coupon Expiration Date<span>*</span></h4>
                        <input type="date" name="expiration_date" class="form-input" value="{{$coupon->expiration_date}}" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                    </div>
                </div>

                <button type="submit" class="btn btn-add">Add Coupon</button>
            </div>
        </form>
    </div>
</div>

@endsection