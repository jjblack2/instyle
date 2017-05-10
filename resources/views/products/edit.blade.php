@extends('main')

@section('title')
    Edit Produk
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

        {!! Form::model($product, ['route' => ['products.update', $product->product_id], 'method' => 'PATCH']) !!}
        <div class="col-md-8">
            <h1>Edit Produk</h1>
            <hr>
            <h3>Kode Produk: {{ $product->product_id }}</h3>
            {{ Form::label('product_name', 'Nama Produk:') }}
            {{ Form::text('product_name', null, ['class' => 'form-control']) }}

            {{ Form::label('category_id', 'Kategori Produk:') }}
            <br>
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
            <br>

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
            @include('partials.errors')
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Dibuat pada: </dt>
                    <dd>{{ $product->created_at->formatLocalized('%d %B %Y') }}</dd>
                    <dd>({{ $product->created_at->diffForHumans() }})</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Terakhir diupdate: </dt>
                    <dd>{{ $product->updated_at->formatLocalized('%d %B %Y') }}</dd>
                    <dd>({{ $product->updated_at->diffForHumans() }})</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('products.show', ['product' => $product->product_id]) }}" class="btn btn-danger btn-block">Batal</a>
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
