@extends('admin.master')

@section('title')
    Create Unit Page
@endsection

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Unit Category</li>
            </ol>
        </div>
    </div>

    {{-- Form Strat here... --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Unit Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success">{{session('message')}}</p>
                    {{-- Form start --}}
                    <form class="form-horizontal" action="{{route('unit.store')}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" placeholder="Enter unit name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Unit Code</label>
                            <div class="col-md-9">
                                <input class="form-control" name="code" placeholder="Enter unit code" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Unit Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description"  placeholder="Text something here.."></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9">
                                <label><input  name="status"  type="radio" checked value="1"> Published</label>
                                <label><input  name="status"  type="radio" value="0"> Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New Unit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
