<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:kategoris,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Nama produk wajib diisi.',
            'name.max'             => 'Nama produk maksimal :max karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.max'      => 'Deskripsi maksimal :max karakter.',
            'price.required'       => 'Harga wajib diisi.',
            'price.numeric'        => 'Harga harus berupa angka.',
            'price.min'            => 'Harga tidak boleh negatif.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
        ];
    }
}
