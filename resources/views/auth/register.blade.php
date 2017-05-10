@extends('main')

@section('title')
    Register
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Registration</h1>
            <hr>
            {!! Form::open() !!}

                {{ Form::label('name', 'Nama:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                {{ Form::label('password_confirmation', 'Konfirmasi Password:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                <br>
                {{ Form::submit('Daftar', ['class' => 'btn btn-primary btn-block']) }}

            {!! Form::close() !!}
            @include('partials.errors')
        </div>
    </div>
@endsection
