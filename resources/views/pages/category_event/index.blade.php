@extends('layouts/contentLayoutMaster')

@section('title', 'Category Event')
@section('vendor-style')
        {{-- vendor css files --}}
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category Event</h4>
                        <div>
                            <a href="/category_event/create" class="btn btn-primary">Tambah</a>
                        </div>    
                    </div>
                   
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table nowrap scroll-horizontal-vertical">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($categories as $i)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$i->title}}</td>
                                            <td>{{$i->author}}</td>
                                            <td>{{$i->status}}</td>
                                            <td class="product-action">
                                                <span class="action-edit"><a href="/category_event/edit/{{$i->id}}" class="feather icon-edit"></a></span>
                                                <span class="action-delete"><a href="/category_event/delete/{{$i->id}}" class="feather icon-trash"></a></span>
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
        </div>
    </section>
@endsection