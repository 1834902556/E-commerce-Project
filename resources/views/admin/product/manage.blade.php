@extends('admin.master')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <p class="text-center text-success">{{session('msg')}} </p>
                <table id="myTable" class="table table-striped border">
                    <thead>
                        <tr>
                            <th>SL NO.</th>
                            <th>Product Name</th>
                            <th>Code</th>
                            <th>Stock Amount</th>
                            <th>Image</th>
                            <th>Punlication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->stock_amount}}</td>
                            <td><img src="{{asset($product->image)}}" alt="{{$product->image}}" height="50px" width="80px"></td>
                            <td>{{$product->status== 1 ? 'published' : 'unpublished'}}</td>
                            <td>
                                <a href="{{route('detail.product',['id'=>$product->id])}}" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to see details.')">
                                    <i class="ti-reddit"></i>
                                </a>
                                <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to edit it.')">
                                    <i class="ti-agenda"></i>
                                </a>
                                <a href="{{route('delete.product',['id'=>$product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it.')">
                                    <i class="ti-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
