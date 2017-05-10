@extends('main')

@section('title')
    Login
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Login</h1>
            <hr>
            {!! Form::open() !!}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                <br>
                {{ Form::checkbox('remember')}} {{ Form::label('remember', 'Ingatkan Saya')}}

                <br>
                {{ Form::submit('Masuk', ['class' => 'btn btn-primary btn-block']) }}

                <a href="{{ route('password.request') }}">Lupa Password</a>

            {!! Form::close() !!}
            @include('partials.errors')
        </div>
    </div>
@endsection
