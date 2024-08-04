@extends('admin.master')

@section('title')
    Product Detail Page
@endsection

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
            </ol>
        </div>
    </div>


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product Detail</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <tr>
                                <th>Product ID</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Sub Category</th>
                                <td>{{$product->subCategory->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Unit</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{$product->short_description}}</td>
                            </tr>
                            <tr>
                                <th>Long Description</th>
                                <td>{!! $product->long_description !!}</td>
                            </tr>
                            <tr>
                                <th>Regular Price</th>
                                <td>{{$product->regular_price}}</td>
                            </tr>
                            <tr>
                                <th>Selling Price</th>
                                <td>{{$product->selling_price}}</td>
                            </tr>
                            <tr>
                                <th>Stock Amount</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Meta Title</th>
                                <td>{{$product->meta_title}}</td>
                            </tr>
                            <tr>
                                <th>Meta Description</th>
                                <td>{{$product->meta_description}}</td>
                            </tr>
                            <tr>
                                <th>Stock Amount</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td><img src="{{asset($product->image)}}" alt="" height="200" width="200"></td>
                            </tr>
                            <tr>
                                <th>Product Other Image</th>
                                <td>
                                    @foreach($product->productImages as $productImage)
                                        <img src="{{asset($productImage->image)}}" alt="" height="200" width="200">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Total View</th>
                                <td>{{$product->hit_count}}</td>
                            </tr>
                            <tr>
                                <th>Total Sales</th>
                                <td>{{$product->sales_count}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->





@endsection
