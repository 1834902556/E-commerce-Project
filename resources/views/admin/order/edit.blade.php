@extends('admin.master')
@section('content')
<div class="row">
    <div class="card mt-5 pt-5">
        <div class="card-body">
            <h4 class="card-title">Order Information</h4>
            <div class="m-t-40">
                <p class="text-center text-success">{{session('msg')}} </p>
                 <form action="{{route('update.order-detail',['id'=> $order->id ])}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Customer Info</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" readonly  value="{{$order->customer->name.'('.$order->customer->mobile.')'}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Order ID</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" readonly  value="{{$order->id}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Order Total</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control"readonly value="{{$order->order_total}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Order Status</label>
                        <div class="col-sm-9">
                            <select name="order_status" id="" class="form-control">
                                <option value="Pending"     {{$order->order_status == 'Pending' ? 'selected':''}}>Pending</option>
                                <option value="Processing"  {{$order->order_status == 'Processing' ? 'selected':''}}>Processing</option>
                                <option value="Complete"    {{$order->order_status == 'Complete' ? 'selected':''}}>Complete</option>
                                <option value="Cancel"      {{$order->order_status == 'Cancel' ? 'selected':''}}>Cancel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Delivery Address</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="delivary_address" value="{{$order->delivary_address}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect w-100 waves-light text-white">Update</button>
                        </div>
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection
