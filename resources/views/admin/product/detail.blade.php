@extends('admin.master')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <p class="text-center text-success">{{session('msg')}} </p>
                <table class="table table-striped border">
                    <tr>
                        <th>Product Id</th>.
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>.
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Code</th>.
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Product Model</th>.
                        <td>{{$product->model}}</td>
                    </tr>
                    <tr>
                        <th>Product Category</th>.
                        <td>{{$product->category->Category_Name}}</td>
                    </tr>
                    <tr>
                        <th>Product Sub Category</th>.
                        <td>{{$product->subCategory}}</td>
                    </tr>
                    <tr>
                        <th>Product Brand</th>.
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Unit</th>.
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Stock Amount</th>.
                        <td>{{$product->stock_amount}}</td>
                    </tr>
                    <tr>
                        <th>Product Regular Price</th>.
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Product Selling Price</th>.
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>.
                        <td>{{$product->sort_description}}</td>
                    </tr>
                    <tr>
                        <th>Long Description</th>.
                        <td>{{$product->long_description}}</td>
                    </tr>
                    <tr>
                        <th>Product Feature Image</th>.
                        <td><img src="{{asset($product->image)}}" alt="" height="100px" width="120px"></td>
                    </tr>  <tr>
                        <th>Product Other Image</th>.
                        <td>
                            @foreach($product->otherImages as $otherImage)
                            <img src="{{asset($otherImage->image)}}" alt="" height="100px" width="120px">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Product Hit Count</th>.
                        <td>{{$product->hit_count}}</td>
                    </tr>
                    <tr>
                        <th>Product Sales Count</th>.
                        <td>{{$product->sales_count}}</td>
                    </tr>
                    <tr>
                        <th>Product Feature Status</th>.
                        <td>{{$product->feature_status}}</td>
                    </tr>
                    <tr>
                        <th>Product Publication Status</th>.
                        <td>{{$product->status== 1 ? 'published' : 'unpublished'}}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
