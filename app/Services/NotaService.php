<?php

namespace App\Services;

use App\Models\Nota;
use Illuminate\Support\Collection;

class NotaService
{
    public function getAll(): Collection
    {
        return Nota::all();
    }

    public function getById(int $id): ?Nota
    {
        return Nota::find($id);
    }

    public function create(array $data): Nota
    {
        return Nota::create($data);
    }

    public function update(int $id, array $data): ?Nota
    {
        $nota = Nota::find($id);

        if ($nota) {
            $nota->update($data);
        }

        return $nota;
    }

    public function delete(int $id): bool
    {
        $nota = Nota::find($id);

        if ($nota) {
            return $nota->delete();
        }

        return false;
    }
}
