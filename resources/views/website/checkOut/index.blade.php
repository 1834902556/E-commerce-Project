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
        <div class="col-lg-8">
          <div class="checkout-steps-form-style-1">
            <ul class="nav nav-pills">
                <li><a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash on Delivery</a></li>
                <li><a href="" class="nav-link" data-bs-target="#online" data-bs-toggle="pill"> Online</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="cash">
                   <form action="{{route('new-cash-order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                          <div class="single-form form-default">
                            <label>Full Name</label>
                            <div class="row">
                              <div class="col-md-12 form-input form">
                                @if(Session::get('customer_id'))
                                <input type="text" name="name" value="{{$customer->name}}" readonly required  placeholder="Full Name"/>
                                @else
                                <input type="text" name="name" required placeholder="Full Name"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="single-form form-default">
                            <label>Email Address</label>
                            <div class="form-input form">
                                @if(Session::get('customer_id'))
                                <input type="email" name="email" value="{{$customer->email}}" readonly required placeholder="Email Address"/>
                                @else
                                <input type="email" name="email" required placeholder="Email Address"/>
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email'):''}}</span>
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="single-form form-default">
                            <label>Phone Number</label>
                            <div class="form-input form">
                                @if(Session::get('customer_id'))
                                <input type="number" name="mobile" value="{{$customer->mobile}}" readonly required placeholder="Phone Number"/>
                                @else
                                <input type="number" name="mobile" required placeholder="Phone Number"/>
                                <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile'):''}}</span>
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="single-form form-default">
                            <label>Delivery Address</label>
                            <div class="form-input form">
                              <textarea type="text" required style="padding-top:10px;height:100px" name="delivary_address" placeholder="Order Delivery Address"></textarea>
                              <span class="text-danger">{{$errors->has('delivary_address') ? $errors->first('delivary_address'):''}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-form form-default">
                              <label>Payment Method</label>
                              <div class="">
                                <label><input type="radio" name="payment_type" value="1" checked>Cash On Delivery</label>
                              </div>
                            </div>
                          </div>
                        <div class="col-md-12">
                          <div class="single-checkbox checkbox-style-3">
                            <input type="checkbox" id="checkbox-3" checked>
                            <label for="checkbox-3"><span></span></label>
                            <p>I accept all terms and condition.</p>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="single-form button">
                            <button type="submit" class="btn"> Confirm Order </button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
                <div class="tab-pane fade show px-3" id="online">
                  <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" name="name" class="form-control" id="customer_name" placeholder="Your Name"
                                   value="" required>
                            <div class="invalid-feedback">
                                Valid customer name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+88</span>
                            </div>
                            <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Mobile number is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="Your Email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea type="text" class="form-control" id="address" name="delivary_address" placeholder="Delivery Address" required></textarea>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100 form-control" id="country" name="country" required>
                                <option value="">Choose...</option>
                                <option value="Bangladesh">Bangladesh</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100 form-control" id="state" name="state" required>
                                <option value="">Choose...</option>
                                <option value="Dhaka">Dhaka</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-form form-default">
                          <label>Payment Method</label>
                          <div class="">
                            <label><input type="radio" name="payment_type" value="1" checked>Online</label>
                          </div>
                        </div>
                      </div>
                    <div class="col-md-12 pb-3">
                      <div class="single-checkbox checkbox-style-3">
                        <input type="checkbox" id="checkbox-3" checked>
                        <label for="checkbox-3"><span></span></label>
                        <p>I accept all terms and condition.</p>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>

                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="checkout-sidebar">
            <div class="checkout-sidebar-price-table">
              <h5 class="title">Shopping Cart Summary</h5>
              <div class="sub-total-price">
                @php($sum=0)
                @foreach(ShoppingCart::all() as $item)
                <div class="total-price">
                    <p class="value">
                        {{$item->name}}
                    </p>
                    <p class="price">{{$item->qty * $item->price}}</p>
                </div>
                @php($sum = $sum + ($item->qty * $item->price))
                @endforeach
                <hr/>
                <div class="total-price shipping">
                  <p class="value">Sub-Total Price:</p>
                  <p class="price">{{$sum}}</p>
                </div>
                <div class="total-price shipping">
                    <p class="value">Tax Amount:</p>
                    <p class="price">{{$tax=(($sum*15)/100)}}</p>
                  </div>
                  <div class="total-price shipping">
                    <p class="value">shipping Amount:</p>
                    <p class="price">{{$shipping=500}}</p>
                  </div>
                  <hr/>
                  <div class="total-price shipping">
                  <p class="value">Total Price:</p>
                  <p class="price">{{$order_total = $sum+$tax+$shipping}}</p>
                </div>
                <?php
                 Session::put('order_total',$order_total);
                 Session::put('tax_total',$tax);
                 Session::put('shipping_total',$shipping);
                ?>
              <div class="price-table-btn button">
                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
              </div>
            </div>
            <div class="checkout-sidebar-banner mt-30">
              <a href="product-grids.html">
                <img src="assets/images/banner/banner.jpg" alt="#">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
