@if (count($errors) > 0)
    <div class="alert alert-danger btn-h1-margin-top-10" role="alert">
        <strong>Error:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
