@extends('main')

@section('title')
    Tambah Order
@endsection

@section('stylesheets')

@endsection

@section('content')
    <div id="root">
        {!! Form::open(['route' => 'orders.store']) !!}
        @include('partials.errors')
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">Buat Pesanan</span>
                    <a href="{{ route('orders.index') }}" class="btn btn-default pull-right">Back</a>
                    {{ Form::hidden('user_id', Auth::user()->id)}}
                </div>
            </div>

            <div class="panel-body">
                @include('orders.form')
            </div>

            <div class="panel-footer">
                <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>
                {{-- <button class="btn btn-success" @click="store">Create</button> --}}
                {{ Form::submit('Buat Order', ['class' => 'btn btn-success']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    {{-- {!! Html::script('js/parsley.min.js') !!} --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script> --}}
    <script src="https://unpkg.com/vue@2.3.3"></script>
    <script src="https://unpkg.com/vue-resource@1.3.1/dist/vue-resource.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/js/dolor.js"></script>
@endsection
