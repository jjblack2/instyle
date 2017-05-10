@extends('main')

@section('title')
    Produk View
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Kode Produk: {{ $product->product_id }}</h1>
            <hr>
            <h3>{{ $product->product_name }}</h3>
            <h4>Harga: Rp {{ number_format($product->product_price) }}</h4>
            <h4>Berat: {{ number_format($product->product_weight) }} gr</h4>

            <div class="col-md-4" style="border-right: 1px solid #bfbfbc;">
                <img id="zoom_01" src="{{ asset('images/' . $product->product_image) }}" data-zoom-image="{{ asset('images/' . $product->image) }}" class="img-thumbnail">
            </div>

            <div class="col-md-8">
                <strong>Details:</strong>
                <br>
                {{ $product->product_article }}
            </div>

            <div class="well col-md-12" style="margin-top: 10px;">
                <h3><strong>Deskripsi</strong></h3>
                {!! $product->product_description !!}
            </div>

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Kategori Produk: </dt>
                    <dd><strong>{{ $product->category->category_name }}</strong></dd>
                </dl>

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
                        <a href="{{ route('products.edit', ['product' => $product->product_id]) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>

                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['products.destroy', $product->product_id], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" style="margin-top: 10px;">
                        <a href="{{ route('products.index') }}" class="btn btn-default btn-block"><< Lihat Semua Produk</a>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
