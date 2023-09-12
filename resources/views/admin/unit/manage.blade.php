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
                            <th>Unit Name</th>
                            <th>Unit Code</th>
                            <th>Description</th>
                            <th>Punlication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $unit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$unit->name}}</td>
                            <td>{{$unit->code}}</td>
                            <td>{{$unit->description}}</td>
                            <td>{{$unit->status== 1 ? 'published' : 'unpublished'}}</td>
                            <td>
                                <a href="{{route('edit.unit',['id'=>$unit->id])}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to edit it.')">
                                    <i class="ti-agenda"></i>
                                </a>
                                <a href="{{route('delete.unit',['id'=>$unit->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete it.')">
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
