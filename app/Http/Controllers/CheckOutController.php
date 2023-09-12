<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use ShoppingCart;

class CheckOutController extends Controller
{
    public $customer,$order,$order_detail;
    public function checkOut(){
        if(Session::get('customer_id')){
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        return view('website.checkOut.index',['customer'=> $this->customer]);
    }

    private function orderCustomerValidate($request){
        $this->validate($request,[
            'name'  	         => 'required',
            'email'              => 'required|unique:customers,email',
            'mobile'             => 'required|unique:customers,mobile',
            'delivary_address'   => 'required',
        ]);
    }

    public function newCashOrder(Request $request){
        if(Session::get('customer_id')){
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else{

            $this->orderCustomerValidate($request);
            $this->customer =  Customer::newCustomer($request);
            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name',$this->customer->name);
        }
        $this->order = Order::newOrder($request,$this->customer->id);
        OrderDetail::newOrderDetail($this->order->id);
        return redirect('/complete-order')->with('msg','Congratulation.......Your order information post successfully......please stay tune for update.....we will contact you soon.');

    }

    public function completeOrderCash(){
        return view('website.checkOut.complete_order');
    }
}
