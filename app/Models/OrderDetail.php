<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShoppingCart;

class OrderDetail extends Model
{
    use HasFactory;
    private static $order_detail;

    public static function newOrderDetail($orderId){
        foreach (ShoppingCart::all() as $item) {
           self::$order_detail                  = new OrderDetail();
           self::$order_detail->order_id        = $orderId;
           self::$order_detail->product_id      = $item->id;
           self::$order_detail->product_name    = $item->name;
           self::$order_detail->product_price   = $item->price;
           self::$order_detail->product_qty     = $item->qty;
           self::$order_detail->save();

        ShoppingCart::remove($item->__raw_id);

        }
    }

    public static function deleteOrderDetail($id){
        self::$order_detail = OrderDetail::where('order_id',$id);
        foreach(self::$order_detail as $oderDetail){
            $oderDetail->delete();
        }
    }
}
