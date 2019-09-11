@extends('layouts.main')
@section('content')
    @foreach($products as $product)
        <div class="row cartcontent">
            <div class="col-sm-3 col-md-6 col-lg-4">
                <img src="{{url('images/'.$product->image)}}">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-8">
                <h2>{{ $product->title }}</h2>
                <h3>{{ env('CURRENCY', '$').$product->price }}</h3>
                <p>{{ $product->description }}</p>
                <a class="btn btn-primary addcart" href="{{ route('product.addToCart', ['id' => $product->id]) }}"><i class="fa fa-plus"></i>&nbsp; Add to Cart</a>
            </div>
        </div>
    @endforeach
@endsection




