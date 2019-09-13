@extends('layouts.main')
@section('content')
    @if(Session::has('success'))
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        <div id="charge-message" class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
    @endif
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




