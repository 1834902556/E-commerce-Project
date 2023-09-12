@extends('admin.master')
@section('content')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Brand</h4>
                <hr>
                <h4 class="text-center text-success">{{session('msgs')}}</h4>
                <form class="form-horizontal p-t-20" method="post" action="{{route('update.brand',['id'=>$brand->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Brand Name" value="{{$brand->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Brand Description</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea pe="text" rows="10" class="form-control" id="description" name="description" placeholder="Brand Description">{{$brand->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Brand Image</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="image" id="input-file-now" class="dropify" />
                                <img src="{{asset($brand->image)}}" alt="img" height="50px" width="100px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Publication Status</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <label class="me-3"><input type="radio" name="status" {{$brand->status == 1 ? 'checked' : ''}} value="1">Published</label>
                                <label><input type="radio" name="status" {{$brand->status == 0 ? 'checked' : ''}}  value="0">Unpublished</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
