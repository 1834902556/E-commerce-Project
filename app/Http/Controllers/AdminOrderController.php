<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use PDF;
use Illuminate\Http\Request;
use PDO;

class AdminOrderController extends Controller
{

    private $order;
    public function index(){
        return view('admin.order.index',['orders' => Order::orderBy('id','desc')->get()]);
    }

    public function edit($id){
        return view('admin.order.edit',['order' => Order::find($id)]);
    }

    public function orderDetails($id){
        return view('admin.order.detail',['order' => Order::find($id)]);
    }

    public function orderInvoice($id){
        return view('admin.order.invoice',['order' => Order::find($id)]);
    }

    public function printInvoice($id){
        $pdf = PDF::loadView('admin.order.print-invoice',['order' => Order::find($id)]);
        return $pdf->stream($id.'-order.pdf');
    }

    public function update(Request $request,$id){
        $this->order = Order::find($id);
        if($request->order_status == 'Pending'){
            $this->order->order_status        = $request->order_status;
            $this->order->delivary_status     = $request->order_status;
            $this->order->payment_status      = $request->order_status;
            $this->order->save();
        }
        else if($request->order_status == 'Processing'){
          $this->order->order_status        = $request->order_status;
          $this->order->delivary_address    = $request->delivary_address;
          $this->order->delivary_status     = $request->order_status;
          $this->order->payment_status      = $request->order_status;
          $this->order->save();
        }
        else if($request->order_status == 'Complete'){

            $this->order->order_status        = $request->order_status;
            $this->order->delivary_status     = $request->order_status;
            $this->order->payment_status      = $request->order_status;
            $this->order->save();
        }
        else if($request->order_status == 'Cancel'){
            $this->order->order_status        = $request->order_status;
            $this->order->delivary_status     = $request->order_status;
            $this->order->payment_status      = $request->order_status;
            $this->order->save();
        }
        return redirect('/all-order')->with('msg','Order info updated successfully');
    }

    public function delete($id){
    $this->order = Order::find($id);
       if($this->order->order_status=='Cancel'){
        Order::deleteOrder($id);
        OrderDetail::deleteOrderDetail($id);
        return back()->with('msg','Order deleted successgully');
       }
       return back()->with('msg','Sorry....you cannot delete this order');
     }
}
