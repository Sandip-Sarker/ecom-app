@extends('admin.master')

@section('title')
    Edit Sub Category Page
@endsection

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>

    {{-- Form Strat here... --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Sub Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('sub-category.update', $sub_category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="Category_id" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value=""> -- Select Category Name -- </option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected($sub_category->category_id == $category->id)>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" value="{{$sub_category->name}}" id="name" placeholder="Enter sub category name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="summernote" placeholder="Text something here..">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control-file" name="image" id="image" type="file">
                                <img src="{{asset($sub_category->image)}}" alt="" height="100">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 mt-0 form-label">Publication Staus</label>
                            <div class="col-md-9">
                                <label><input  name="status" {{$sub_category->status == 1 ? 'checked' : ''}} type="radio" checked value="1"> Published</label>
                                <label><input  name="status" {{$sub_category->status == 0 ? 'checked' : ''}} type="radio" value="0"> Unublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
