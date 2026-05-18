<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $siteName ?? config('app.name')) | {{ $siteName ?? 'PNU Kanang' }}</title>
    <meta name="description" content="@yield('meta_description', 'Pondok Pesantren Nahdlatul Ummah Kanang - membentuk generasi Qurani, berakhlakul karimah, dan berwawasan Ahlussunnah wal Jamaah.')">
    <meta name="keywords" content="@yield('meta_keywords', 'pondok pesantren, nahdlatul ummah, kanang, NU, tahfidz, kitab kuning, Polewali Mandar')">

    <link rel="icon" href="{{ asset('img/logo-pnu.svg') }}" type="image/svg+xml">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    @include('frontend.partials.topbar')
    @include('frontend.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
