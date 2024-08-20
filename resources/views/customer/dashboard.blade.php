@extends('website.master')

@section('title')
    My dashboard
@endsection

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
               <div class="col">
                   <h4>My dashboard</h4>
                   <hr>
                   <p class="text-secondary-dark fw-bold">My Recent order</p>
                   <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>SL No</th>
                              <th>Order Id</th>
                              <th>Order Total</th>
                              <th>Order Date</th>
                              <th>Order Status</th>
                              <th>Payment Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                       <tbody>
                       @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">Detail</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>
            </div>
        </div>
    </div>


@endsection

