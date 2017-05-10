@extends('main')

@section('title')
    Lupa Password
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Reset Password</strong></div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'password.request', 'method' => 'POST']) !!}

                        {{ Form::hidden('token', $token) }}

                        {{ Form::label('email', 'Alamat Email:') }}
                        {{ Form::email('email', $email, ['class' => 'form-control']) }}

                        {{ Form::label('password', 'Password Baru:') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}

                        {{ Form::label('password_confirmation', 'Ulangi Password Baru:') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                        {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing'])}}

                    {!! Form::close() !!}
                    @include('partials.errors')
                </div>
            </div>

        </div>
    </div>
@endsection
