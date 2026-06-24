<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(): View
    {
        $kategoris = Kategori::withCount('products')->latest()->paginate(10);

        return view('kategori.index', compact('kategoris'));
    }

    public function create(): View
    {
        return view('kategori.create');
    }

    public function store(StoreKategoriRequest $request): RedirectResponse
    {
        Kategori::create($request->validated());

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Kategori $kategori): View
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori): View
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(UpdateKategoriRequest $request, Kategori $kategori): RedirectResponse
    {
        $kategori->update($request->validated());

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori): RedirectResponse
    {
        try {
            $kategori->delete();

            return redirect()
                ->route('kategori.index')
                ->with('success', 'Kategori berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()
                    ->route('kategori.index')
                    ->with('error', 'Kategori tidak bisa dihapus karena masih ada produk di dalamnya.');
            }

            return redirect()
                ->route('kategori.index')
                ->with('error', 'Terjadi kesalahan pada database.');
        }
    }
}
