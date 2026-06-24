<x-app-layout>
    <x-page-header
        title="Dashboard"
    />

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="bg-white border border-slate-200 rounded-lg p-5">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Produk</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900 tabular-nums">{{ \App\Models\Product::count() }}</p>
            <a href="{{ route('produk.index') }}" class="mt-3 inline-flex items-center text-sm font-medium text-slate-700 hover:text-slate-900">
                Lihat produk →
            </a>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-5">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Kategori</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900 tabular-nums">{{ \App\Models\Kategori::count() }}</p>
            <a href="{{ route('kategori.index') }}" class="mt-3 inline-flex items-center text-sm font-medium text-slate-700 hover:text-slate-900">
                Lihat kategori →
            </a>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-5">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Total Nilai Inventaris</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900 tabular-nums">Rp {{ number_format((float) \App\Models\Product::sum('price'), 0, ',', '.') }}</p>
            <p class="mt-3 text-xs text-slate-500">Akumulasi harga semua produk.</p>
        </div>
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-2">
        <a href="{{ route('produk.create') }}"
           class="group bg-white border border-slate-200 rounded-lg p-5 hover:border-slate-300 transition">
            <p class="text-sm font-medium text-slate-900">Tambah produk baru</p>
            <p class="mt-1 text-sm text-slate-500">Masukkan produk ke dalam inventaris Anda.</p>
        </a>
        <a href="{{ route('kategori.create') }}"
           class="group bg-white border border-slate-200 rounded-lg p-5 hover:border-slate-300 transition">
            <p class="text-sm font-medium text-slate-900">Tambah kategori baru</p>
            <p class="mt-1 text-sm text-slate-500">Buat kelompok untuk produk Anda.</p>
        </a>
    </div>
</x-app-layout>
