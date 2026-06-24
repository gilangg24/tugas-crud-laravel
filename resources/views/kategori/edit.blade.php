<x-app-layout>
    <x-page-header
        title="Edit Kategori"
    >
        <x-slot:actions>
            <a href="{{ route('kategori.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-md shadow-sm transition">
                Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-2xl">
        <div class="bg-white border border-slate-200 rounded-lg p-6">
            <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <x-form-input
                    name="name"
                    label="Nama Kategori"
                    :value="$kategori->name"
                    :required="true"
                    :autofocus="true"
                />

                <x-form-textarea
                    name="description"
                    label="Deskripsi"
                    :value="$kategori->description"
                    :rows="4"
                    :required="true"
                />

                <div class="flex items-center gap-2 pt-2">
                    <x-primary-button>Simpan Perubahan</x-primary-button>
                    <a href="{{ route('kategori.index') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-900 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
