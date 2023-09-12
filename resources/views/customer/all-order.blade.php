
@extends('website.master')
@section('title')
Customer Profile
@endsection
@section('content')
<div class="breadcrumbs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">Customer Profile</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="breadcrumb-nav">
            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
            <li><a href="index.html">Shop</a></li>
            <li>checkout</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <section class="checkout-wrapper section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-3">
           <div class="list-group">
            <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">Profile</a>
            <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action">Order</a>
            <a href="" class="list-group-item list-group-item-action">Account</a>
            <a href="" class="list-group-item list-group-item-action">Change Password</a>
            <a href="" class="list-group-item list-group-item-action">Settings</a>
           </div>
        </div>
        <div class="col-md-9">
            <table id="myTable" class="table table-striped border">
                <thead>
                    <tr>
                        <th>SL NO.</th>
                        <th>Order No</th>
                        <th>Order Date</th>
                        <th>Order Total</th>
                        <th>Delivery Address</th>
                        <th>Delivery Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$order->id}}</td>
                       <td>{{$order->order_date}}</td>
                       <td>{{$order->order_total}}</td>
                       <td>{{$order->delivary_address}}</td>
                       <td>{{$order->order_status}}</td>
                       <td>
                        <a href="" class="btn btn-success">Detail</a>
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>
@endsection
