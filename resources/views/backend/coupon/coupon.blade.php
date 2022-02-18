@extends ('backend.main')
@section('admin')


<div class="product-management">
    <div class="tab-pane main-product show">
        <div class="header-container">
            <div class="row main-product-header">
                <h2 class="heading">Manage Coupons</h2>
                <button class="btn add-product-btn">Add New Coupon</button>
            </div>
        </div>

        <div class="responsive-table">
            <table class="my-table">
                <thead>
                    <tr>
                        <th class="table-size-2">Coupon code</th>
                        <th class="table-size-2">Coupon type</th>
                        <th class="table-size-1">Coupon discount</th>
                        <th class="table-size-1">Expiration date</th>
                        <th class="table-size-1">validity</th>
                        <th class="table-size-1">Status</th>
                        <th class="table-size-3">Action</th>
                    </tr>
                </thead>
                <tbody class="t-body">
                    @foreach($coupons as $coupon)
                    <tr>
                        <td>{{$coupon->coupon_code}}</td>
                        <td>{{$coupon->coupon_type}}</td>
                        <td>
                            @if($coupon->coupon_type == 'Fixed')
                            &#8358;{{number_format($coupon->coupon_discount) }}
                            @else
                            {{$coupon->coupon_discount }}%
                            @endif
                        </td>
                        <td>{{Carbon\Carbon::parse($coupon->expiration_date)->format('D, d F Y')}}</td>
                        <td>
                            @if($coupon->expiration_date > Carbon\Carbon::now()->format('Y-m-d'))
                            <span class="activated">Valid</span>
                            @else
                            <span class="error">Expired</span>
                            @endif
                        </td>
                        <td>
                            @if($coupon->status === 1)
                            <span class="activated">Active</span>
                            @else
                            <span class="error">Inactive</span>
                            @endif
                        </td>
                        <td class="action-links">
                            <div class="a-btn">
                                <a href="{{route('edit.coupon', $coupon->id)}}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('delete.coupon', $coupon->id)}}" class="btn btn-delete"><i class="fas fa-trash-alt"></i></a>
                                @if($coupon->status === 1)
                                <a href="{{route('deactivate.coupon', $coupon->id)}}" class="btn deactivate btn-delete"><i class="fas fa-arrow-down" title="Deactivate Product"></i></a>
                                @else
                                <a href="{{route('activate.coupon', $coupon->id)}}" class="btn btn-edit"><i class="fas fa-arrow-up" title="Activate Product"></i></a>
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
            <h2 class="heading">Add New Coupon</h2>
            <a href="" class="btn btn-back">Back to All Coupon</a>
        </div>
        <form action="{{route('add.coupon')}}" method="post" class="add-product-form">
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
                        <input type="text" name="coupon_code" class="form-input" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Coupon Type<span>*</span></h4>
                        <select name="coupon_type">
                            <option value="default" selected disabled>Select coupon type</option>
                            <option value="Fixed">Fixed</option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>
                </div>

                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Coupon Discount<span>*</span></h4>
                        <input type="text" name="coupon_discount" class="form-input" />
                    </div>
                </div>
                <div class="e-col-6">
                    <div class="form-group">
                        <h4>Coupon Expiration Date<span>*</span></h4>
                        <input type="date" name="expiration_date" class="form-input" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                    </div>
                </div>

                <button type="submit" class="btn btn-add">Add Coupon</button>
            </div>
        </form>
    </div>
</div>

<script src="{{asset('backend/fetchAPI/status.js')}}"></script>

@endsection