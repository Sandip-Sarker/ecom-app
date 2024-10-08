<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;

    public function newCustomer(Request $request)
    {

        $this->customer = Customer::newCustomer($request);
        session::put('customer_id', $this->customer->id);
        session::put('customer_name', $this->customer->name);

        return redirect('/checkout/confirm-order');

    }

    public function dashboard()
    {
        return view('customer.dashboard', [
            'orders' => Order::where('customer_id', Session::get('customer_id'))->latest()->get()
        ]);
    }

    public function login()
    {
        return view('customer.login');
    }

    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                session::put('customer_id', $this->customer->id);
                session::put('customer_name', $this->customer->name);

                return redirect('/checkout/confirm-order');
            }
            else
            {
                return back()->with('message', 'Sorry .. Your password is not valid');
            }
        }
        else
        {
            return back()->with('message', 'Sorry .. Your email is not valid');
        }
    }

    public function register()
    {
        return view('customer.register');
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

}
