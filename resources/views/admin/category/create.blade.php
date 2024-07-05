@extends('admin.master')

@section('title')
    Create Category Page
@endsection

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Category</li>
            </ol>
        </div>
    </div>

    {{-- Form Strat here... --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <form class="form-horizontal">
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" id="name" placeholder="Enter category name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Text something here.."></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control-file" name="image" id="image" type="file">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status" class="col-md-3 form-label">Publication Staus</label>
                            <div class="col-md-9">
                                <label><input  name="status" id="status"  type="radio" checked value="1"> Published</label>
                                <label><input  name="status" id="status"  type="radio" value="0"> Unublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
