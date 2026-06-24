<?php

namespace App\Policies;

use App\Models\Kategori;
use App\Models\User;

class KategoriPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Kategori $kategori): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Kategori $kategori): bool
    {
        return true;
    }

    public function delete(User $user, Kategori $kategori): bool
    {
        return true;
    }
}
