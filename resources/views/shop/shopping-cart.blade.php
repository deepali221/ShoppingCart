@extends('layouts.master')

@section('title')
My Cart
@endsection
@section('content')
  @if((Session::has('cart')) && ( $totalQty > 0))
    <div class="col-md-9">
      <div class="thumbnail">
        <h3><bold> My Cart ({{ $totalQty }})</bold></h3>
        @foreach($products as $product)
        <hr>
        <div class="product-row row">
          <div class="col-md-3">
            <img class="img-responsive" src="{{ $product['item']['thumbnail_path'] }}" alt="">
            </div>
            <div class='col-md-offset-1 col-md-4'>
              <h2>{{ $product['item']['title'] }}</h2>
              <p> Rs {{ $product['item']['price'] }}</p>
              <p>
                <i href="#" class="fa fa-minus-circle" aria-hidden="true"></i>
                  <span class="badge"> Qty:{{ $product['qty'] }}</span>
                <i href="#" class="fa fa-plus-circle" aria-hidden="true"></i>
              </p>
            </div>
            <div class="col-md-4">
              <div class="col-md-10">
              <a href="{{ route('product.remove',['id'=>$product['item']['id']]) }}" class="close pull-right" aria-label="close">&times;</a>
            </div>
            </div>
          </div>
        @endforeach
      </div>
      <p>
      <a href="{{route('checkout')}}"
      class="btn btn-success pull-right btn-lg" role="button">
      Place Order
    </a>
    <a href="{{ route('product.index') }}"
      class="btn btn-info btn-lg pull-right" role="button">
      Continue Shopping
    </a>
    </p>

    </div>
    <div class='col-md-3'>
      <div class="thumbnail">
          <h4><light>Details</light></h4>
          <hr>
          <div class="row">
            <div class='col-md-6'>
              <p >Total Qty</p>
            </div>
            <div class='col-md-5'>
              <p class="pull-right">{{ $totalQty }}</p>
            </div>
        </div>
        <div class="row">
          <div class='col-md-6'>
            <p >Total Amount</p>
          </div>
          <div class='col-md-5'>
            <p class="pull-right">Rs {{ $totalPrice }}</p>
          </div>
      </div>
      </div>
    </div>
  @else
    <div class="col-md-12">
      <div class="thumbnail error">
        <img class="img-responsive" src="{{ URL::to('source/images/empty-state-cart.png') }}" alt="">
        <div class="caption text-center">
          <h3>No Items in Cart!</h3>
          <p><a href="{{route('product.index')}}" class="btn btn-primary" role="button">
            <span><i class="fa fa-arrow-left" aria-hidden="true"></i> Browse Products</span></a></p>
        </div>
      </div>
    </div>
  @endif
@endsection
