<x-app-layout>
    <x-page-header
        title="{{ $kategori->name }}"
    >
        <x-slot:actions>
            <a href="{{ route('kategori.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-md shadow-sm transition">
                Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="grid gap-6 md:grid-cols-3">
        <div class="md:col-span-2 bg-white border border-slate-200 rounded-lg p-6 space-y-4">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Deskripsi</p>
                <p class="mt-1 text-sm text-slate-900 whitespace-pre-line">{{ $kategori->description }}</p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center gap-3">
                <a href="{{ route('kategori.edit', $kategori) }}"
                   class="inline-flex items-center px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm transition">
                    Edit Kategori
                </a>
                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Hapus kategori ini?')"
                            class="inline-flex items-center px-4 py-2 bg-white border border-red-200 hover:bg-red-50 text-red-600 text-sm font-medium rounded-md transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-6">
            <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Produk dalam Kategori</p>
            <p class="mt-2 text-3xl font-semibold text-slate-900 tabular-nums">{{ $kategori->products()->count() }}</p>
            <a href="{{ route('produk.index', ['kategori' => $kategori->id]) }}"
               class="mt-4 inline-flex items-center text-sm font-medium text-slate-700 hover:text-slate-900">
                Lihat produk →
            </a>
        </div>
    </div>
</x-app-layout>
