<x-app-layout>
    <x-page-header
        title="Kategori"
    >
        <x-slot:actions>
            <a href="{{ route('kategori.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 shadow-sm transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Kategori
            </a>
        </x-slot:actions>
    </x-page-header>

    <x-flash-message type="success" />
    <x-flash-message type="error" />

    @if ($kategoris->isEmpty())
        <x-empty-state
            title="Belum ada kategori"
            description="Tambahkan kategori pertama untuk mulai mengelompokkan produk."
        >
            <x-slot:action>
                <a href="{{ route('kategori.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-md border border-slate-700 transition">
                    Tambah Kategori
                </a>
            </x-slot:action>
        </x-empty-state>
    @else
        <div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3 w-16">No</th>
                        <th class="text-left text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3">Nama</th>
                        <th class="text-left text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3">Deskripsi</th>
                        <th class="text-left text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3 w-24">Produk</th>
                        <th class="text-right text-xs font-medium text-slate-500 uppercase tracking-wider px-6 py-3 w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($kategoris as $kategori)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $loop->iteration + ($kategoris->currentPage() - 1) * $kategoris->perPage() }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $kategori->name }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($kategori->description, 80) }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600 tabular-nums">{{ $kategori->products_count }}</td>
                            <td class="px-6 py-4 text-right text-sm">
                                <a href="{{ route('kategori.edit', $kategori) }}"
                                   class="text-slate-700 hover:text-slate-900 font-medium mr-3">Edit</a>
                                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Hapus kategori ini?')"
                                            class="text-red-600 hover:text-red-700 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($kategoris->hasPages())
                <div class="px-6 py-3 border-t border-slate-200">
                    {{ $kategoris->links() }}
                </div>
            @endif
        </div>
    @endif
</x-app-layout>
