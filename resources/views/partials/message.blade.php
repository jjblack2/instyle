@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Berhasil:</strong> {{Session::get('success')}}
    </div>
@endif
