@extends('main')

@section('title')
    Kategori
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Kategori Produk</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <h3>Tambah Kategori Baru</h3>
                    <hr>
                    {{ Form::label('category_name', 'Nama Kategori:') }}
                    {{ Form::text('category_name', null, ['class' => 'form-control']) }}
                    {{ Form::submit('Tambah', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                {!! Form::close() !!}
                @include('partials.errors')
            </div>
        </div>
    </div>
@endsection
