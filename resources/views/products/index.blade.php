@extends('main')

@section('title')
    Home
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Products</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('products.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Buat Produk</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-default">
                        <th style="vertical-align: middle;">Kode Produk</th>
                        <th style="vertical-align: middle;">Nama Produk</th>
                        <th style="vertical-align: middle;">Kategori Produk</th>
                        <th style="vertical-align: middle;">Harga Produk</th>
                        <th style="vertical-align: middle;">Berat Produk</th>
                        <th style="vertical-align: middle;">Dibuat pada</th>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th style="vertical-align: middle;">{{ $product->product_id }}</th>
                                <td style="vertical-align: middle;">{{ $product->product_name }}</td>
                                <td style="vertical-align: middle;">{{ $product->category->category_name }}</td>
                                <td style="vertical-align: middle;">
                                    Rp {{ number_format($product->product_price) }}
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ number_format($product->product_weight) }} gr
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ $product->created_at->formatLocalized('%d %B %Y') }}
                                </td>
                                <td><a href="{{ route('products.show', ['product' => $product->product_id]) }}" class="btn btn-default">Lihat</a>
                                    <a href="{{ route('products.edit', ['product' => $product->product_id]) }}" class="btn btn-default">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $products->links(); !!}

                </div>
            </div>

        </div>
    </div>
@endsection
