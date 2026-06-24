<x-app-layout>
    <x-page-header
        title="Tambah Produk"
    >
        <x-slot:actions>
            <a href="{{ route('produk.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-md shadow-sm transition">
                Kembali
            </a>
        </x-slot:actions>
    </x-page-header>

    <div class="max-w-2xl">
        <div class="bg-white border border-slate-200 rounded-lg p-6">
            <form action="{{ route('produk.store') }}" method="POST" class="space-y-5">
                @csrf

                <x-form-input
                    name="name"
                    label="Nama Produk"
                    placeholder="Contoh: Laptop ASUS ROG"
                    :value="old('name')"
                    :required="true"
                    :autofocus="true"
                />

                <x-form-select
                    name="category_id"
                    label="Kategori"
                    :options="$kategoris->pluck('name', 'id')"
                    :value="old('category_id')"
                    :required="true"
                />

                <x-form-textarea
                    name="description"
                    label="Deskripsi"
                    placeholder="Jelaskan produk ini secara singkat..."
                    :value="old('description')"
                    :rows="4"
                    :required="true"
                />

                <x-form-input
                    name="price"
                    label="Harga (Rp)"
                    type="number"
                    placeholder="0"
                    hint="Masukkan harga dalam Rupiah tanpa titik atau koma."
                    :value="old('price')"
                    :required="true"
                />

                <div class="flex items-center gap-2 pt-2">
                    <x-primary-button>Simpan</x-primary-button>
                    <a href="{{ route('produk.index') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-900 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
