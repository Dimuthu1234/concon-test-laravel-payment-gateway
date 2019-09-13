@extends('layouts.main')
@push('styles')
    <link href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
{{--@section('title', 'User List')--}}
{{--@section('actionUrl', route('adminUser.create'))--}}
{{--@section('actionIcon', 'fas fa-plus')--}}
{{--@section('actionBtn', 'Add a User')--}}
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="clear-history" style="padding: 20px">
                <button class="btn btn-primary">Clear All History</button>
            </div>
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Total Quantity</th>
                        <th>Total Price</th>
                        <th>Payment ID</th>
                        <th>Bought Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($histories as $history)
                        @for($x = 0; $x <= sizeof($itemArray) -1; $x++)
                            @if($itemArray[$x]['eachHistoryId'] == $history->id)
                            <tr>
                                <td>{{ $itemArray[$x]['cart']->totalQty }}</td>
                                <td>{{ $itemArray[$x]['cart']->totalPrice }}</td>
                                <td>{{ $history->payment_id }}</td>
                                <td>{{ Carbon\Carbon::parse($history->created_at)->diffForHumans() }}</td>
                            </tr>
                            @endif
                        @endfor
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('js/demo/datatables-demo.js') }}"></script>
@endpush




