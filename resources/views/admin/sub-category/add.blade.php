@extends('admin.master')
@section('content')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Sub Category</h4>
                <hr>
                <h4 class="text-center text-success">{{session('msgs')}}</h4>
                <form class="form-horizontal p-t-20" method="post" action="{{route('create.sub-category')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                                <option value="" disabled selected>---Select Category---</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->Category_Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Sub Category Name</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Sub Category Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub Category Description</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea pe="text" rows="10" class="form-control" id="description" name="description" placeholder="Sub Category Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Sub Category Image</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="image" id="input-file-now" class="dropify" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Publication Status</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <label class="me-3"><input type="radio" name="status" value="1">Published</label>
                                <label><input type="radio" name="status" value="0">Unpublished</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
