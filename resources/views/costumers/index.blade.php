@extends('main')

@section('title')
    Costumer
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Data Costumer</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('costumers.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Tambah Costumer</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-default">
                        <th style="vertical-align: middle;">#</th>
                        <th style="vertical-align: middle;">Nama Costumer</th>
                        <th style="vertical-align: middle;">No. Handphone</th>
                        <th style="vertical-align: middle;">Alamat</th>
                        <th style="vertical-align: middle;">Dibuat pada</th>
                    </thead>

                    <tbody>
                        @foreach ($costumers as $costumer)
                            <tr>
                                <th style="vertical-align: middle;">{{ $costumer->id }}</th>
                                <td style="vertical-align: middle;">{{ $costumer->costumer_name }}</td>
                                <td style="vertical-align: middle;">{{ $costumer->costumer_phone }}</td>
                                <td style="vertical-align: middle;">{!! $costumer->costumer_address !!}</td>

                                <td style="vertical-align: middle;">
                                    {{ $costumer->created_at->formatLocalized('%d %B %Y') }}
                                </td>
                                <td>
                                    <a href="{{ route('costumers.edit', ['costumer' => $costumer->id]) }}" class="btn btn-success">Edit</a>
                                    {!! Form::open(['route' => ['costumers.destroy', $costumer->id], 'method' => 'DELETE']) !!}
                                        {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $costumers->links(); !!}

                </div>
            </div>

        </div>
    </div>
@endsection
