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
              <li class="breadcrumb-item"><a href="{{url('/customer')}}">Customers</a></li>
              <li class="breadcrumb-item active">{{$customer->name}}</li>
            </ol>
          </div>
        </div>
@stop

@section('content')
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-between">
        <a href="{{route('customer.message',$customer->id)}}" class="btn btn-outline-primary">Messages</a>
            <a href="{{route('customer.index')}}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-12 ">
            <div class="card card-secondary" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                <div class="card-header">
                    <h3 class="card-title">Customer Detail</h3>
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                                <div class="card-header">
                                    <h3 class="card-title">Customer info</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10 ">
                                                <input type="email" name="email" class="form-control form-control-border transparent" id="Email" value="{{$customer->email}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10 ">
                                                <input type="tel" name="phone" class="form-control form-control-border transparent" id="Email" value="{{$customer->phone}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10 ">
                                            <input type="input" class="form-control form-control-border transparent" id="Email" value="{{$customer->home_address}} {{$customer->lga}} {{$customer->state}} {{$customer->country}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input" id="signed_up" disabled {{$customer->signed_up?"checked":""}}>
                                                    <label class="custom-control-label" for="signed_up">Signed Up</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-info float-right">Edit</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                                <div class="card-header">
                                    <h3 class="card-title">Customer sizes</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="sizes mx-2">
                                        @forelse ($customer->sizes as $size )
                                        <div class="row size bg-light align-items-center my-1">
                                            <div class="col-sm-5"><span class="text-capitalize">{{$size->sizeType->name}}</span></div>
                                            <div class="col-sm-3"><span class="text-lowercase">{{$size->size}} {{$size->unit->name}}</span></div>
                                            <div class="col-sm-4 d-flex justify-content-end">
                                                <button class="btn text-danger mx-1 "><i class="fa fa-trash align-top"></i></button>
                                                <button class="btn text-info mx-1 " data-toggle="modal" data-target="#sizeEditModal" data-name="{$size->sizeType->name}}" data-name="{$size->id}}"><i class="fa fa-edit align-top"></i></button>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="row size bg-light align-items-center my-1 ">
                                            <div class="col-sm-12"><span class="text-capitalize py-1 text-center w-100 d-inline-block">sorry {{$customer->name}} has no sizes yet</span></div>

                                        </div>
                                        @endforelse

                                    </div>
                                    <div class="add-size float-right">
                                        <button class="btn text-success" data-toggle="modal" data-target="#sizeAddModal" data-name="{$size->sizeType->name}}" data-name="{$size->id}}"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>

                    <!-- customers order  -->
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
                            {{-- @foreach ($customers as $customer)
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
                                --}}
                            </tbody>
                            </table>
                        </div>
                    <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <aside>
        <div  class="modal fade" id="sizeAddModal" tabindex="-1" role="dialog" aria-labelledby="sizeAddModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sizeAddModalLabel">Add Size</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="form-addSize" class="form-addSize">
                            <input type="hidden" name="customer_id" id="customer_id" value="{{$customer->id}}">
                            <div class="form-group form-row align-items-center">
                                <div class="form-group col-md-6">
                                    <label for="size-type" class=""></label>
                                    <input type="text" class="form-control form-control-border" id="size-type" placeholder="size type" list="sizetypelist">
                                    <datalist id="sizetypelist">
                                    @foreach ($sizetypes as $sizetype)
                                        <option>{{$sizetype->name}}</option>
                                    @endforeach
                                    </datalist>
                                </div>
                                <div class="form-group col-md-4 ">
                                    <label for="size" class=""></label>
                                    <input type="number" class="form-control form-control-border w-100" id="size" placeholder="Size...">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="unit">
                                    </label>
                                    <select name="unit" id="unit" class="custom-select form-control form-control-border">
                                        @foreach ($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" name="addSize" class="btn-addSize btn btn-success">Add Size</button>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    @include("layout.modal",["modal_class" => "bg-danger text-white"])
@stop


@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script src="{{url('/js/app.js')}}"> </script>
@stop
