@extends('layouts.main')
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Your Cart</h1>
                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item">
                                    <span class="badge">Quantity({{ $product['qty'] }})</span>
                                    <strong>{{ $product['item']['title'] }}</strong>
                                    <span class="label label-success">Price({{ env('CURRENCY', '$').$product['price'] }})</span>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                            Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Reduce by one</a></li>
                                            <li><a href="#">Reduce all</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="p-5">
                    <div class="text-center">
                        <strong>Total : {{ $totalPrice }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="p-5">
                    <div class="text-center">
                        <a href="{{ route('checkout.index') }}" type="button" class="btn btn-success btn-user btn-block" >Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="p-5">
                    <div class="text-center">
                        <h2>No items in Cart!</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
