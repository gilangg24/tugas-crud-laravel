<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Manajemen Produk') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-900 antialiased bg-slate-50 min-h-screen flex flex-col">

    <header class="border-b border-slate-200 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="/" class="text-base font-semibold text-slate-900 tracking-tight">Manajemen Produk</a>
            <nav class="flex items-center gap-2">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm transition">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        </div>
    </header>

    <main class="flex-1">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-2xl">
                <h1 class="text-4xl sm:text-5xl font-semibold tracking-tight text-slate-900 leading-tight">
                    Manajemen produk<br>yang sederhana.
                </h1>
                <p class="mt-5 text-base sm:text-lg text-slate-600 leading-relaxed">
                    Kelola daftar produk dan kategori Anda dalam satu tempat.
                    Tanpa fitur berlebihan, fokus pada hal yang penting.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="inline-flex items-center px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm transition">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm transition">
                            Mulai
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-slate-700 hover:text-slate-900">
                            Buat akun
                        </a>
                    @endauth
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-slate-500">
            &copy; {{ date('Y') }} Manajemen Produk.
        </div>
    </footer>

</body>
</html>
