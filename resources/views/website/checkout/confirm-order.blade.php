@extends('website.master')

@section('title')
    Shopping Checkout Page
@endsection

@section('body')

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


                <section class="checkout-wrapper section">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="checkout-steps-form-style-1">
                                    <ul id="accordionExample">
                                        <li>
                                            <h6 class="title">Please Give Your Order Delivery Address & Payment Info </h6>
                                            <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                              {{-- Form here --}}
                                                <form action="{{route('checkout.new-order')}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="single-form form-default">
                                                                <label>Delivery Address</label>
                                                                <div class="form-input form">
                                                                    <textarea  class="pt-3" style="height: 80px" name="delivery_address" placeholder="Delivery Address"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="single-checkbox checkbox-style-3">
                                                                <input type="radio" name="payment_method" checked value="Cash">
                                                                <label>Cash On Delivery</label>
                                                            </div>

                                                            <div class="single-checkbox checkbox-style-3">
                                                                <input type="radio" name="payment_method" value="Online">
                                                                <label>Online</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-form button">
                                                                <button class="btn" type="submit" >Confirm Order</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </section>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                    <div class="checkout-sidebar-price-table ">
                                        <h5 class="title">Pricing Table</h5>
                                        <div class="sub-total-price">
                                            @php($sum=0)
                                            @foreach(Cart::content() as $item)
                                            <div class="total-price">
                                                <p class="value">{{$item->name}}, ({{$item->price}} * {{$item->qty}})</p>
                                                <p class="price">TK. {{$item->qty * $item->price}}</p>
                                            </div>
                                            @php($sum = $sum + ($item->qty * $item->price))
                                            @endforeach
                                            <div class="total-price shipping">
                                                <p class="value">Subotal Price:</p>
                                                <p class="price">TK. {{$sum}}</p>
                                            </div>
                                            <div class="total-price discount">
                                                <p class="value">Tax Amount:</p>
                                                <p class="price">TK. {{$tax = round($sum * 0.15)}}</p>
                                            </div>
                                            <div class="total-price discount">
                                                <p class="value">Shipping Cost:</p>
                                                <p class="price">TK. {{$shipping = 100}}</p>
                                            </div>
                                        </div>
                                        <div class="total-payable">
                                            <div class="payable-price">
                                                <p class="value">Total Payable:</p>
                                                <p class="price">TK. {{$totalPayable = $sum + $tax + $shipping}}</p>
                                            </div>
                                        </div>

                                        <?php
                                            Session::put('order_total', $totalPayable);
                                            Session::put('tax_amount', $tax);
                                            Session::put('shipping_amount', $shipping);
                                        ?>

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



            </div>
        </div>
    </section>


@endsection
