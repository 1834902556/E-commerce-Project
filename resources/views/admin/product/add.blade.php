@extends('admin.master')
@section('content')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Product</h4>
                <hr>
                <h4 class="text-center text-success">{{session('msgs')}}</h4>
                <form class="form-horizontal p-t-20" method="post" action="{{route('create.product')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id" id="categoryId">
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
                            <select class="form-control" name="sub_category_id" id="subCategoryId">
                                <option value="" disabled selected>---Select Sub Category---</option>
                                @foreach($sub_categories as $sub_category)
                                <option value="{{$sub_category->id}}"></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="brand_id">
                                <option value="" disabled selected>---Select Brand---</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="unit_id">
                                <option value="" disabled selected>---Select Unit---</option>
                                @foreach($units as $unit)
                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Product Code</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="code" name="code" placeholder="Product code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Product Model</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="model" name="model" placeholder="Product Model">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Product Stock Amount</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" id="stock_amount" name="stock_amount" placeholder="Product Stock Amount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Product Price</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" id="regular_price" name="regular_price" placeholder="Regular Price">
                                <input type="number" class="form-control" id="selling_price" name="selling_price" placeholder="Selling Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Sort Description</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea pe="text"class="form-control" id="sort_description" name="sort_description" placeholder="Sort Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Long Description</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea pe="text" rows="10" class="form-control summernote" id="long_description" name="long_description" placeholder="Long Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Feature Image</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="feature_image" id="input-file-now" class="dropify" accept="image/*" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Other Image</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="other_image[]" multiple id="input-file-now" class="dropify" />
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
