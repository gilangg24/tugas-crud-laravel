<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKategoriRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Nama kategori wajib diisi.',
            'name.max'             => 'Nama kategori maksimal :max karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.max'      => 'Deskripsi maksimal :max karakter.',
        ];
    }
}
