@extends('admin.master')

@section('title')
    Create Product Page
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
                <li class="breadcrumb-item active" aria-current="page">Create Product</li>
            </ol>
        </div>
    </div>

    {{-- Form Strat here... --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Category</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id">
                                            <option value=""> -- Select Category Name -- </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Sub Category</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="sub_category_id">
                                            <option value=""> -- Select Sub Category Name -- </option>
                                            @foreach($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-md-3 form-label">Brand Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="brand_id">
                                            <option value=""> -- Select Brand Name -- </option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="Category_id" class="col-md-3 form-label">Unit Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="unit_id">
                                            <option value=""> -- Select Unit Name -- </option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="name" class="col-md-3 form-label">Product Name</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="name" id="productName" placeholder="Enter Product name" type="text">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="productCode" class="col-md-3 form-label">Product Code</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="code" id="productCode" placeholder="Enter Product Code" type="text">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="image" class="col-md-3 form-label">Product Price</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input class="form-control" name="regular_price" type="number" placeholder="Regular Price">
                                            <input class="form-control" name="selling_price" type="number" placeholder="Selling Price">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="stockAmount" class="col-md-3 form-label">Stock Amount</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="stock_amount" id="stockAmount" type="number">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="metaTitle" class="col-md-3 form-label">Meta Title</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="meta_title" id="metaTitle" placeholder="Text Meta Title"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="metaDescription" class="col-md-3 form-label">Meta Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="meta_description" id="metaDescription" placeholder="Text Meta Description"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="shortDescription" class="col-md-3 form-label">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="short_description" id="shortDescription" placeholder="Text short something here.."></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="row mb-4">
                                    <label for="summernote" class="col-md-3 form-label">Long Description</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="long_description" id="summernote" placeholder="Text Long something here.."></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="image" class="col-md-3 form-label">Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control-file" name="image" id="image" type="file">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="image" class="col-md-3 form-label">Other Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control-file" name="other_image[]" multiple id="otherImage" type="file">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="status" class="col-md-3 mt-0 form-label">Publication Status</label>
                                    <div class="col-md-9">
                                        <label><input  name="status" id="status"  type="radio" checked value="1"> Published</label>
                                        <label><input  name="status" id="status"  type="radio" value="0"> Unpublished</label>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Create New Product</button>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
