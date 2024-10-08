<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use function Livewire\find;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminOrderController extends Controller
{
    private $order;

    public function index()
    {
        return view('admin.order.index', ['orders' => Order::latest()->get()]);

    }

    public function detail($id)
    {
        return view('admin.order.detail', ['order' => Order::find($id)]);

    }

    public function edit($id)
    {
        return view('admin.order.edit', [
            'order'     => Order::find($id),
            'couriers'   => Courier::all()
            ]);

    }

    public function update(Request $request, $id)
    {

        $this->order = Order::find($id);

        if ($request->order_status == 'pending')
        {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
        }
        elseif ($request->order_status == 'processing')
        {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->courier_id        = $request->courier_id;
        }
        elseif ($request->order_status == 'complete')
        {
            $this->order->order_status          = $request->order_status;
            $this->order->delivery_status       = $request->order_status;
            $this->order->payment_status        = $request->order_status;
            $this->order->delivery_date         = date('Y-m-d');
            $this->order->delivery_timestamp    = strtotime(date('Y-m-d'));
            $this->order->payment_amount        = $this->order->order_total;
            $this->order->payment_date          = date('Y-m-d');
            $this->order->payment_timestamp     = strtotime(date('Y-m-d'));
        }
        elseif ($request->order_status == 'cancel')
        {
            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
        }

        $this->order->save();
        return redirect('/admin-order')->with('message', 'Admin Order Info Update Successfully');

    }

    public function showInvoice($id)
    {
        return view('admin.order.show-invoice' , [
            'order' => Order::find($id),
        ]);

    }

    public function downloadInvoice($id)
    {
        $pdf = Pdf::loadView('admin.order.download-invoice', ['order' => Order::find($id)]);
        return $pdf->stream();
        //return view('admin.order.download-invoice');

    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        foreach ($orderDetails as $orderDetail)
        {
            $orderDetail->delete();
        }

        return back()->with('message', 'Admin Order Info Delete Successfully');
    }

}
