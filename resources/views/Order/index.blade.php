@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>

                    <div class="card-body">
                        <form action="{{ route('order.store') }}" class="d-flex align-items-center" method="POST">
                            @csrf
                            <label for="amount" class="form-label me-3">Amount</label>
                            <input type="number" class="form-control me-3" id="amount" name="amount"
                                value="{{ old('amount') }}" step="0.01" min="0.01">
                            <input type="submit" value="Make Order" class="btn btn-primary">
                        </form>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">USER</th>
                                    <th scope="col">AMOUNT</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->amount }}</td>
                                        <td>
                                            @switch($order->status)
                                                @case('pending')
                                                <span class="badge bg-warning">{{ $order->status }}</span>
                                                @break

                                                @case('paid')
                                                <span class="badge rounded-pill text-bg-success">{{ $order->status }}</span>
                                                @break

                                                @case('failed')
                                                <span class="badge rounded-pill text-bg-danger">{{ $order->status }}</span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
