@extends('main')

@section('title')
    Tambah Order
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

            @include('partials.errors')

            <h1>Tambah Order</h1>
            <hr>
            {!! Form::open(['route' => 'orders.store']) !!}
                {{ Form::hidden('user_id', Auth::user()->id)}}

                {{ Form::label('costumer_id', 'Nama Costumer:') }}
                <select class="form-control" name="costumer_id">
                    @foreach ($costumers as $costumer)
                        <option value="{{ $costumer->id }}">
                            {{ $costumer->costumer_name }}
                            ({{ $costumer->costumer_phone }})
                        </option>
                    @endforeach
                </select>

                {{ Form::label('product_id', 'Kode Produk:') }}
                <select class="form-control" name="product_id">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->product_id }}
                        </option>
                    @endforeach
                </select>

                {{ Form::label('shipper_id', 'Shipper:') }}
                <select class="form-control" name="shipper_id">
                    @foreach ($shippers as $shipper)
                        <option value="{{ $shipper->id }}">{{ $shipper->shipper_name }}</option>
                    @endforeach
                </select>

                {{ Form::label('order_date', 'Tanggal Pemesanan:') }}
                {{ Form::text('order_date', null, ['class' => 'form-control', 'id' => 'datepicker']) }}

                <div class="col-sm-6">
                    <a href="{{ route('orders.index') }}" class="btn btn-danger btn-lg btn-block" style="margin-top: 20px;">Batal</a>
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Tambah Order', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;']) }}
                </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
