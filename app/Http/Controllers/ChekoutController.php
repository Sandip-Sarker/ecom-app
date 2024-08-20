<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use Cart;

class ChekoutController extends Controller
{
    private $order, $orderDetail;

    public function index()
    {
        return view('website.checkout.index');
    }

    public function confirmOrder()
    {
        return view('website.checkout.confirm-order');
    }

    public function newOrder(Request $request)
    {
        $this->order       = new  Order();
        $this->order->customer_id       = Session::get('customer_id');
        $this->order->order_total       = Session::get('order_total');
        $this->order->tax_amount       = Session::get('tax_amount');
        $this->order->shipping_amount   = Session::get('shipping_amount');
        $this->order->order_date        = date('Y-m-d');
        $this->order->order_timestamp   = strtotime(date('Y-m-d'));
        $this->order->delivery_address  = $request->delivery_address;
        $this->order->payment_method    = $request->payment_method;
        $this->order->save();

        foreach (Cart::content() as $item)
        {
            $this->orderDetail  = new OrderDetail();
            $this->orderDetail->order_id        = $this->order->id;
            $this->orderDetail->product_id      = $item->id;
            $this->orderDetail->product_name    = $item->name;
            $this->orderDetail->product_price   = $item->price;
            $this->orderDetail->product_qty     = $item->qty;
            $this->orderDetail->save();

            Cart::remove($item->rowId);
        }

        return redirect('/checkout/complete-order')->with('message', 'Order complete successfully');
    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
