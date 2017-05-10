@extends('main')

@section('title')
    Order
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Orders</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('orders.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Tambah Order</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-default">
                        <th style="vertical-align: middle;">#</th>
                        <th style="vertical-align: middle;">Nama Costumer</th>
                        <th style="vertical-align: middle;">Nama User</th>
                        <th style="vertical-align: middle;">Shipper</th>
                        <th style="vertical-align: middle;">Tanggal Order</th>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th style="vertical-align: middle;">{{ $order->id }}</th>
                                <td style="vertical-align: middle;">{{ $order->costumer->costumer_name }}</td>
                                <td style="vertical-align: middle;">{{ $order->user->name }}</td>
                                <td style="vertical-align: middle;">{{ $order->shipper->shipper_name }}</td>
                                <td style="vertical-align: middle;">{{ $order->order_date->formatLocalized('%d %B %Y') }}</td>

                                <td>
                                    <a href="{{ route('orders.edit', ['order' => $order->id]) }}" class="btn btn-success btn-block">Edit</a>
                                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
                                        {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-block']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $orders->links(); !!}

                </div>
            </div>

        </div>
    </div>
@endsection
