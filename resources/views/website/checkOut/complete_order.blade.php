@extends('website.master')
@section('title')
Check-Out
@endsection
@section('content')
<div class="breadcrumbs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">checkout</h1>
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
        <h4 class="text-success">{{Session('msg')}}</h4>
      </div>
    </div>
  </section>
@endsection
