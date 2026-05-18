@if(session('success'))
    <div class="alert alert-success auto-dismiss" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger auto-dismiss" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong><i class="bi bi-exclamation-circle me-2"></i>Mohon perbaiki kesalahan berikut:</strong>
        <ul class="mb-0 mt-2 ps-3">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif
