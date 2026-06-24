<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1) User default (kalau belum ada)
        User::firstOrCreate(
            ['email' => 'alex@contoh.com'],
            [
                'name'              => 'Alex',
                'password'          => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2) Kategori
        $kategoris = [
            'Makanan'    => 'Produk makanan ringan, camilan, dan bahan pangan.',
            'Minuman'    => 'Minuman kemasan, kopi, teh, dan sejenisnya.',
            'Elektronik' => 'Perangkat elektronik rumah tangga dan gadget.',
        ];

        foreach ($kategoris as $name => $description) {
            Kategori::firstOrCreate(
                ['name' => $name],
                ['description' => $description]
            );
        }

        // 3) Produk contoh
        $produk = [
            ['Mie ayam',     'Mie instan rasa ayam, kemasan 85gr.',                       4500,   'Makanan'],
            ['Citato',       'Camilan kerupuk tipis rasa sapi panggang, 68gr.',          12000,  'Makanan'],
            ['Kopi Sachet',  'Kopi instan isi 10 sachet, rasa original.',                18000,  'Minuman'],
            ['Mouse Wireless', 'Mouse bluetooth tanpa kabel, baterai tahan 6 bulan.',    125000, 'Elektronik'],
        ];

        foreach ($produk as [$name, $description, $price, $kategoriName]) {
            $kategori = Kategori::where('name', $kategoriName)->first();
            if (! $kategori) {
                continue;
            }
            Product::firstOrCreate(
                ['name' => $name],
                [
                    'description' => $description,
                    'price'       => $price,
                    'category_id' => $kategori->id,
                ]
            );
        }
    }
}
