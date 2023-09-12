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
                            <th>Brand Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Punlication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->description}}</td>
                            <td><img src="{{asset($brand->image)}}" alt="{{$brand->image}}" height="50px" width="80px"></td>
                            <td>{{$brand->status== 1 ? 'published' : 'unpublished'}}</td>
                            <td>
                                <a href="{{route('edit.brand',['id'=>$brand->id])}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to edit it.')">
                                    <i class="ti-agenda"></i>
                                </a>
                                <a href="{{route('delete.brand',['id'=>$brand->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it.')">
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
