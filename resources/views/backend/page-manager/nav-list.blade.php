@extends ('backend.main')
@section('admin')


<div class="product-management">
    <div class="header-container">
        <h2 class="heading">Category Form</h2>
    </div>
    <div class="e-col-6">
        <form action="{{route('add.navlist')}}" method="post">
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
                <h4>Nav List</h4>
                <input type="text" class="form-input" name="navlist_name" placeholder="Nav List">
            </div>
            <button class="btn">Add NavList</button>
        </form>
    </div>
    <div class="header-container">
        <div class="row main-product-header">
            <h2 class="heading">Navigation Lists</h2>
        </div>
    </div>
    <div class="tab-pane main-product show">
        <div class="responsive-table">
            <table class="my-table">
                <thead>
                    <tr>
                        <th class="table-size-1">S/N</th>
                        <th class="table-size-1">Navlist</th>
                        <th class="table-size-1">Created Date</th>
                        <th class="table-size-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($navlists as $navlist)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$navlist->navlist_name}}</td>
                        <td>{{$navlist->created_at}}</td>
                        <td class="action-links">
                            <div class="a-btn">
                                <a href="{{route('nav.edit', $navlist->id)}}" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('nav.delete', $navlist->id)}}" class="btn btn-delete"><i class="fas fa-trash-alt"></i></a>
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