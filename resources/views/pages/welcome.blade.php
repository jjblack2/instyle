@extends('main')

@section('title')
    Home
@endsection

@section('content')
    {{-- header content --}}
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="col-lg-12">
            <h1 class="page-header">Catalogues</h1>
        </div>

        @foreach ($products as $product)

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <h3>{{ $product->product_id }}</h3>
                <h4>{{ $product->category->category_name }}</h4>
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="{{ asset('images/' . $product->product_image) }}">
                </a>
                <h4>Harga: Rp {{ number_format($product->product_price) }}</h4>
            </div>

        @endforeach
        {{-- end post --}}
        {{-- <div class="sidebar-module sidebar-module-inset">
            asdasd
        </div> --}}

    </div>
    <nav class="pagination">
        {!! $products->links(); !!}
    </nav>
    {{-- end body content --}}
@endsection
