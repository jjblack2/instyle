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

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route' => 'password.email', 'method' => 'POST']) !!}

                        {{ Form::label('email', 'Alamat Email:') }}
                        {{ Form::email('email', null, ['class' => 'form-control']) }}

                        {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing']) }}

                    {!! Form::close() !!}

                    @include('partials.errors')
                </div>
            </div>

        </div>
    </div>
@endsection
