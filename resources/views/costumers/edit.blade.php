@extends('main')

@section('title')
    Edit Costumer
@endsection

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">

        {!! Form::model($costumer, ['route' => ['costumers.update', $costumer->id], 'method' => 'PATCH']) !!}
        <div class="col-md-8">
            <h1>Edit Costumer</h1>
            <hr>
            {{ Form::label('costumer_name', 'Nama Costumer:') }}
            {{ Form::text('costumer_name', null, ['class' => 'form-control']) }}

            {{ Form::label('costumer_phone', 'No. Handphone:') }}
            {{ Form::text('costumer_phone', null, ['class' => 'form-control']) }}

            {{ Form::label('costumer_address', 'Alamat:') }}
            {{ Form::textarea('costumer_address', null, ['class' => 'form-control']) }}

            @include('partials.errors')
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Dibuat pada: </dt>
                    <dd>{{ $costumer->created_at->formatLocalized('%d %B %Y') }}</dd>
                    <dd>({{ $costumer->created_at->diffForHumans() }})</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Terakhir diupdate: </dt>
                    <dd>{{ $costumer->updated_at->formatLocalized('%d %B %Y') }}</dd>
                    <dd>({{ $costumer->updated_at->diffForHumans() }})</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('costumers.index') }}" class="btn btn-danger btn-block">Batal</a>
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Simpan', ['class' => 'btn btn-success btn-block'])}}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection
