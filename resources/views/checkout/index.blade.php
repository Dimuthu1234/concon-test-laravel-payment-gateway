@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Checkout!</h1>
                    <h3 class="h4 text-gray-900 mb-4">Your Total amount : {{ env('CURRENCY', '$').$total }}</h3>
                    @if(Session::has('error'))
                        <div id="charge-error" class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
                <form class="user" action="{{ route('checkout.store') }}" method="post" id="checkout-form">
                    @csrf
                    <div class="form-group">
                        <input placeholder="Name" class="form-control  form-control-user" type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input placeholder="Address"  class="form-control  form-control-user" type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <input placeholder="Card Holder Name"  class="form-control  form-control-user" type="text" id="card-name" required>
                    </div>
                    <div class="form-group">
                        <input placeholder="Credit Card Number"  class="form-control  form-control-user" type="text" id="card-number" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input placeholder="Expiration Month"  class="form-control  form-control-user" type="text" id="card-expiry-month" required>
                        </div>
                        <div class="col-sm-6">
                            <input placeholder="Expiration Year" class="form-control  form-control-user" type="text" id="card-expiry-year" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input placeholder="CVC" class="form-control  form-control-user" type="text" id="card-cvc" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Buy now
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ url('js/checkout.js') }}"></script>
@endpush
