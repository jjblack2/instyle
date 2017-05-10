@extends('main')

@section('title')
    Edit Produk
@endsection

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')!!}
    {!! Html::script('https://code.jquery.com/jquery-1.12.4.js') !!}
    {!! Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js') !!}
    <script>
        var $j = jQuery.noConflict();
        $j( function() {
            $j( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'PATCH']) !!}

            @include('partials.errors')

            <h1>Edit Order</h1>
            <hr>
            <h3>Order ID: {{ $order->id }}</h3>
            {{ Form::hidden('user_id', Auth::user()->id) }}

            {{ Form::label('costumer_id', 'Nama Costumer:') }}
            {{ Form::select('costumer_id', $costumers, null, ['class' => 'form-control']) }}

            {{ Form::label('shipper_id', 'Shipper:') }}
            {{ Form::select('shipper_id', $shippers, null, ['class' => 'form-control']) }}

            {{ Form::label('order_date', 'Tanggal Pemesanan:') }}
            {{ Form::text('order_date', null, ['class' => 'form-control', 'id' => 'datepicker']) }}
            <br>
            <div class="col-sm-6">
                <a href="{{ route('orders.index') }}" class="btn btn-danger btn-block">Batal</a>
            </div>
            <div class="col-sm-6">
                {{ Form::submit('Simpan', ['class' => 'btn btn-success btn-block'])}}
            </div>
        </div>

        {!! Form::close() !!}

    </div>
@endsection
