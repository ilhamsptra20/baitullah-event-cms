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
                        <h4 class="card-title">Payment Method</h4>
                        <div>
                            <a href="{{ route('payment_method.create')}}" class="btn btn-primary">Tambah</a>
                        </div>    
                    </div>
                   
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table nowrap scroll-horizontal-vertical">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Tutorial</th>
                                            <th>Key value</th>
                                            <th>Order By</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($metodePembayarans as $i)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$i->title}}</td>
                                            <td>{{$i->tutorial}}</td>
                                            <td>{{$i->key_value}}</td>
                                            <td>{{$i->order_by}}</td>
                                            <td>{{$i->author}}</td>
                                            <td>{{$i->status}}</td>
                                            <td class="product-action">
                                                <span class="action-edit"><a href="/payment_method/edit/{{$i->id}}" class="feather icon-edit"></a></span>
                                                <span class="action-delete"><a href="/payment_method/delete/{{$i->id}}" class="feather icon-trash"></a></span>
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