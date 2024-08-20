@extends('admin.master')

@section('title')
    Manage Order Page
@endsection

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Order</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Order</li>
            </ol>
        </div>
    </div>


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Order Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL No</th>
                                <th class="wd-15p border-bottom-0">Order ID</th>
                                <th class="wd-15p border-bottom-0">Order Date</th>
                                <th class="wd-20p border-bottom-0">Customer Info</th>
                                <th class="wd-15p border-bottom-0">Order Total</th>
                                <th class="wd-10p border-bottom-0">Order Status</th>
                                <th class="wd-10p border-bottom-0">Payment Status</th>
                                <th class="wd-10p border-bottom-0">Delivery Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>
                                        Name: {{$order->customer->name}}<br>
                                        Mobile: {{$order->customer->name}}
                                    </td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td>
                                        <a href="{{route('admin-order.detail', $order->id)}}" class="btn btn-success btn-sm" title="View Order Details">
                                            <i class="fa fa-bookmark-o"></i>
                                        </a>

                                        <a href="{{route('admin-order.edit', $order->id)}}" class="btn btn-primary btn-sm" title="Order Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{route('admin-order.show-invoice', $order->id)}}" class="btn btn-warning btn-sm" title="Show Order Invoice">
                                            <i class="fa fa-book"></i>
                                        </a>

                                        <a href="{{route('admin-order.download-invoice', $order->id)}}" class="btn btn-warning btn-sm" title="Download Order Invoice">
                                            <i class="fa fa-download"></i>
                                        </a>

                                        <a href="{{route('admin-order.destroy', $order->id)}}" class="btn btn-danger btn-sm" title="Order Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->





@endsection

