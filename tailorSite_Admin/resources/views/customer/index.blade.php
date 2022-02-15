@extends('adminlte::page')

@section('title', 'DK Coutour Admin')

@section('content_header')
<div class="row">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div>
        </div>
@stop

@section('content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{route('customer.create')}}" class="btn btn-outline-secondary">New Customer</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-12 ">
            <div class="card card-secondary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                <div class="card-header">
                    <h3 class="card-title">All Customers</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                @if (session('new_customer'))
                    <div class="alert alert-success alert-dismissible mb-1">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i><span class="text">Customer Added Successfully!!!.</span></h5>

                    </div>
                    {{--@php
                        unset(session('new_customer'));
                    @endphp--}}
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('customer.show',$customer->id)}}" class="btn btn-outline-info mx-1" aria-roledescription="view button">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <button type="button" class="btn btn-outline-danger mx-1" aria-roledescription="delete button" data-toggle="modal" data-msg="Are you sure you want to delete {{$customer->name}}" data-modal_for="customer" data-id="{{$customer->id}}" data-title="Delete Customer" data-target="#shared_modal">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </div>
                            </td>
                            <!-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> -->
                            </tr>
                            @endforeach

                        </tbody>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @include("layout.modal",["modal_class" => "bg-danger text-white"])
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="{{url('/js/script.js')}}"> </script>
    <script src="{{url('/js/app.js')}}"> </script>
@stop
