@extends('main')

@section('title')
    Tambah Costumer
@endsection

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::script('https://cloud.tinymce.com/stable/tinymce.min.js') !!}
    <script>
        tinymce.init({
            selector: 'textarea',
            menubar: false
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.errors')

            <h1>Tambah Costumer Baru</h1>
            <hr>
            {!! Form::open(['route' => 'costumers.store', 'files' => true]) !!}

                {{ Form::label('costumer_name', 'Nama Costumer:') }}
                {{ Form::text('costumer_name', null, ['class' => 'form-control']) }}

                {{ Form::label('costumer_phone', 'No. Handphone:') }}
                {{ Form::text('costumer_phone', null, ['class' => 'form-control']) }}

                {{ Form::label('costumer_address', 'Alamat:') }}
                {{ Form::textarea('costumer_address', null, ['class' => 'form-control']) }}

                <div class="col-sm-6">
                    <a href="{{ route('costumers.index') }}" class="btn btn-danger btn-lg btn-block" style="margin-top: 20px;">Batal</a>
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Tambah Costumer', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;']) }}
                </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
