@extends('adminlte::page')

@section('title', 'DK Coutour Admin')

{{--@section('content_header')
    <h1>Dk Coutour Admin</h1>
@stop--}}

@section('content')
    <div class="row my-2 py-2 mx-auto">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="col-md-9 center">
        <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Create Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('customer.store')}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control form-control-border" id="name" name="name" placeholder="Full name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control form-control-border" id="email" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control form-control-border" id="phone" placeholder="Phone" name="phone">
                  </div>
                  <div class="form-group">
                    <label for="home_address1">Home Address</label>
                    <input type="text" class="form-control form-control-border" id="home_address" placeholder="Home Address" name="home_address">
                  </div>
                  <div class="form-group">
                    <label for="country">Country</code></label>
                    <select class="custom-select form-control-border" id="country" name="country">
                        <option>Value 1</option>
                        <option>Value 2</option>
                        <option>Value 3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="state">State</code></label>
                    <select class="custom-select form-control-border" id="state" name="state">
                        <option>Value 1</option>
                        <option>Value 2</option>
                        <option>Value 3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="city">City</code></label>
                    <select class="custom-select form-control-border" id="city" name="city">
                        <option>Value 1</option>
                        <option>Value 2</option>
                        <option>Value 3</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
