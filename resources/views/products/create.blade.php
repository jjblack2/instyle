@extends('main')

@section('title')
    Buat Produk
@endsection

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::script('https://cloud.tinymce.com/stable/tinymce.min.js') !!}
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'lists',
            menubar: false
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.errors')

            <h1>Buat Produk Baru</h1>
            <hr>
            {!! Form::open(['route' => 'products.store', 'files' => true]) !!}
                {{ Form::label('product_id', 'Kode Produk:') }}
                {{ Form::text('product_id', null, ['class' => 'form-control']) }}

                {{ Form::label('product_name', 'Nama Produk:') }}
                {{ Form::text('product_name', null, ['class' => 'form-control']) }}

                {{ Form::label('product_category', 'Kategori Produk:') }}

                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>

                {{ Form::label('product_description', 'Deskripsi Produk:') }}
                {{ Form::textarea('product_description', null, ['class' => 'form-control']) }}

                {{ Form::label('product_article', 'Ringkasan Produk:') }}
                {{ Form::textarea('product_article', null, ['class' => 'form-control']) }}

                {{ Form::label('product_weight', 'Berat Produk:') }}
                <div class="input-group">
                    {{ Form::text('product_weight', null, ['class' => 'form-control']) }}
                    <div class="input-group-addon">gram</div>
                </div>

                {{ Form::label('product_price', 'Harga Produk:') }}
                <div class="input-group">
                    <div class="input-group-addon">Rp</div>
                    {{ Form::text('product_price', null, ['class' => 'form-control']) }}
                    <div class="input-group-addon">.00</div>
                </div>

                {{ Form::label('display_image', 'Upload Gambar Produk:')}}
                {{ Form::file('display_image') }}

                <div class="col-sm-6">
                    <a href="{{ route('products.index') }}" class="btn btn-danger btn-lg btn-block" style="margin-top: 20px;">Batal</a>
                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Buat Produk', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;']) }}
                </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
