@extends('layouts.master')

@section('title')
Checkout
@endsection
@section('content')
  <div class="row">
    <div class="col-sm-6 col-md-8 col-sm-offset-3 col-md-offset-2 ">
      <div class="thumbnail blue">
        <h3 class="title" >Logged in <a class="highlight">as {{ Auth::user()->email}}</a>
          <a class="btn pull-right" role="button">Change</a>
        </h3>
      </div>
      <div class="thumbnail" style="{background-color: lightgreen}">
        <h3 class="title">Delivery Details</h3>
        @if(!(Session::has('step')) || Session::get('step') == 1)
        <hr/>
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
            <form action="{{ route('user.update') }}" method="post">

              <div class="col-md-6 nopadding">
                <div class="form-group">
                    <lable for="name">Name:</lable>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
              </div>

              <div class="col-md-5 nopadding col-md-offset-1">
                <div class="form-group">
                    <lable for="phone">Phone No.:</lable>
                    <input type="number" id="phone" name="name" class="form-control">
                </div>
              </div>

              <div class="col-md-6 nopadding">
                <div class="form-group">
                    <lable for="pincode">Pincode:</lable>
                    <input type="number" id="pincode" name="pincode" class="form-control">
                </div>
              </div>

              <div class="col-md-5 nopadding col-md-offset-1">
                <div class="form-group">
                    <lable for="locality">Locality:</lable>
                    <input type="text" id="locality" name="locality" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" rows="4" id="address"></textarea>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Save</button>
              {{ csrf_field() }}
            </form>

          </div>
        </div>
      @endif
      </div>
      <div class="thumbnail">
        <h3 class="title" >Payment</h3>
      </div>
    </div>
  </div>
@endsection
