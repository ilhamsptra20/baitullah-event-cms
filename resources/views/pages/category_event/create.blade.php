@extends('layouts/contentLayoutMaster')

@section('title', 'Create Category Event')
@section('vendor-style')
        {{-- vendor css files --}}
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')

    <div class="add-new-data-sidebar">

        <div class="overlay-bg"></div>
        <div class="add-new-data">
            <form action="/category_event/store" method="POST">
                @csrf
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                <div>
                    <h4 class="text-uppercase">List View Data</h4>
                </div>
                <div class="hide-data-sidebar">
                    <i class="feather icon-x"></i>
                </div>
                </div>
                <div class="data-items pb-3">
                <div class="data-fields px-2 mt-1">
                    <div class="row">
                        <div class="col-sm-12 data-field-col">
                            <label for="data-title">Title</label>
                            <input type="text" class="form-control" name="title" id="data-title">
                        </div>
                        {{-- <div class="col-sm-12 data-field-col">
                            <label for="data-author">Author</label>
                            <input type="text" class="form-control" name="author" id="data-author">
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <label for="data-status"> Status</label>
                            <select class="form-control" id="data-status" name="status">
                            <option>Pending</option>
                            <option>Cancelled</option>
                            <option>Delivered</option>
                            <option>On Hold</option>
                            </select>
                        </div> --}}
                  
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                <div class="add-data-btn">
                    <input type="submit" class="btn btn-primary" value="Add Data">
                </div>
                <div class="cancel-data-btn">
                    <input type="reset" class="btn btn-outline-danger" value="Cancel">
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection