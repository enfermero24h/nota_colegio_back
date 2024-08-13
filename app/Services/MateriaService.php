<?php

namespace App\Services;

use App\Models\Materia;
use Illuminate\Support\Collection;

class MateriaService
{
    public function getAll(): Collection
    {
        return Materia::all();
    }

    public function getById(int $id): ?Materia
    {
        return Materia::find($id);
    }

    public function create(array $data): Materia
    {
        return Materia::create($data);
    }

    public function update(int $id, array $data): ?Materia
    {
        $materia = Materia::find($id);

        if ($materia) {
            $materia->update($data);
        }

        return $materia;
    }

    public function delete(int $id): bool
    {
        $materia = Materia::find($id);

        if ($materia) {
            return $materia->delete();
        }

        return false;
    }
}
