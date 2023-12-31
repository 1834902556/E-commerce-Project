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
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Punlication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sub_categories as $sub_category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$sub_category->category->Category_Name}}</td>
                            <td>{{$sub_category->name}}</td>
                            <td>{{$sub_category->description}}</td>
                            <td><img src="{{asset($sub_category->image)}}" alt="{{$sub_category->image}}" height="50px" width="80px"></td>
                            <td>{{$sub_category->status== 1 ? 'published' : 'unpublished'}}</td>
                            <td>
                                <a href="{{route('edit.sub-category',['id'=>$sub_category->id])}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to edit it.')">
                                    <i class="ti-agenda"></i>
                                </a>
                                <a href="{{route('delete.sub-category',['id'=>$sub_category->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it.')">
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
