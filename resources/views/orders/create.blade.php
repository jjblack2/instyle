@extends('main')

@section('title')
    Tambah Order
@endsection

@section('stylesheets')

@endsection

@section('content')
    <div id="root">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">Buat Pesanan</span>
                    <a href="{{ route('orders.index') }}" class="btn btn-default pull-right">Back</a>

                </div>
            </div>

            <div class="panel-body">
                @include('orders.form')
            </div>

            <div class="panel-footer">
                <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>
                <button class="btn btn-success">Create</button>
            </div>
        </div>
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
