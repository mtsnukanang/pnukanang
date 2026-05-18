<section class="page-header">
    <div class="container">
        <h1>{{ $title ?? 'Halaman' }}</h1>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                @if(! empty($parents))
                    @foreach($parents as $label => $url)
                        <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                    @endforeach
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $title ?? '' }}</li>
            </ol>
        </nav>
    </div>
</section>
