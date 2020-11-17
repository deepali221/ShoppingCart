@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @foreach($products->chunk(3) as $productChunk)
      <div class="row">
        @foreach($productChunk as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <img class="img-responsive" src="{{ $product->thumbnail_path }}" alt="">
            <div class="caption">
                <h3>{{$product->title}}</h3>
                <p class="description">{{$product->description}}</p>
                    <div class="clearfix">
                    <div class="pull-left price" >Rs {{$product->price}}</div>
                    <p><a href="{{route('product.addToCart',['id'=>$product->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a></p>
                </div>
            </div>
            </div>
        </div>
        @endforeach
      </div>
    @endforeach

@endsection
