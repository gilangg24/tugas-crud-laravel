<x-app-layout>
    <x-page-header
        title="Produk"
    >
        <x-slot:actions>
            <a href="{{ route('produk.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk
            </a>
        </x-slot:actions>
    </x-page-header>

    <x-flash-message type="success" />
    <x-flash-message type="error" />

    @if ($products->isEmpty())
        <x-empty-state
            title="Belum ada produk"
            description="Tambahkan produk pertama Anda untuk mulai mengelola inventaris."
        >
            <x-slot:action>
                <a href="{{ route('produk.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 transition">
                    Tambah Produk
                </a>
            </x-slot:action>
        </x-empty-state>
    @else
        <div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="text-left text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3 w-16">No</th>
                            <th class="text-left text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3">Produk</th>
                            <th class="text-left text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3">Kategori</th>
                            <th class="text-right text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3">Harga</th>
                            <th class="text-right text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($products as $produk)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-slate-900">{{ $produk->name }}</div>
                                    <div class="text-xs text-slate-500 mt-0.5 line-clamp-1">{{ \Illuminate\Support\Str::limit($produk->description, 60) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($produk->kategori)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-700">
                                            {{ $produk->kategori->name }}
                                        </span>
                                    @else
                                        <span class="text-xs text-slate-400">—</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-900 text-right tabular-nums">
                                    Rp {{ number_format((float) $produk->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-right text-sm">
                                    <a href="{{ route('produk.edit', $produk) }}"
                                       class="text-slate-700 hover:text-slate-900 font-medium mr-3">Edit</a>
                                    <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Hapus produk ini?')"
                                                class="text-red-600 hover:text-red-700 font-medium">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($products->hasPages())
                <div class="px-6 py-3 border-t border-slate-200">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    @endif
</x-app-layout>
