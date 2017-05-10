@extends('main')

@section('title')
    Ekspedisi
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Ekspedisi</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($shippers as $shipper)
                        <tr>
                            <td>{{ $shipper->$shipper_name }}</td>
                            <td style="width: 10px;">
                                {!! Form::open(['route' => ['shippers.destroy', $shipper->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'shippers.store', 'method' => 'POST']) !!}
                    <h3>Tambah Ekspedisi Baru</h3>
                    <hr>
                    {{ Form::label('shipper_name', 'Nama Ekspedisi:') }}
                    {{ Form::text('shipper_name', null, ['class' => 'form-control']) }}
                    {{ Form::submit('Tambah', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                {!! Form::close() !!}
                @include('partials.errors')
            </div>
        </div>
    </div>
@endsection
