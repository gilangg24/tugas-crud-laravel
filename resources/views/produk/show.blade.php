<x-app-layout>
    <x-page-header
        title="{{ $product->name }}"
    >
        <x-slot:actions>
            <a href="{{ route('produk.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-md shadow-sm transition">
                Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="grid gap-6 md:grid-cols-3">
        <div class="md:col-span-2 bg-white border border-slate-200 rounded-lg p-6 space-y-4">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Kategori</p>
                <p class="mt-1 text-sm text-slate-900">
                    @if ($product->kategori)
                        <a href="{{ route('kategori.show', $product->kategori) }}" class="hover:underline">{{ $product->kategori->name }}</a>
                    @else
                        <span class="text-slate-400">Tanpa kategori</span>
                    @endif
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Harga</p>
                <p class="mt-1 text-2xl font-semibold text-slate-900 tabular-nums">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Deskripsi</p>
                <p class="mt-1 text-sm text-slate-700 whitespace-pre-line">{{ $product->description }}</p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center gap-3">
                <a href="{{ route('produk.edit', $product) }}"
                   class="inline-flex items-center px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm transition">
                    Edit Produk
                </a>
                <form action="{{ route('produk.destroy', $product) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Hapus produk ini?')"
                            class="inline-flex items-center px-4 py-2 bg-white border border-red-200 hover:bg-red-50 text-red-600 text-sm font-medium rounded-md transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-6 space-y-4">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Dibuat</p>
                <p class="mt-1 text-sm text-slate-700">{{ $product->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Diperbarui</p>
                <p class="mt-1 text-sm text-slate-700">{{ $product->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
