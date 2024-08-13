<?php

namespace App\Services;

use App\Models\Estudiante;
use Illuminate\Support\Collection;

class EstudianteService
{
    public function getAll(): Collection
    {
        return Estudiante::all();
    }

    public function getById(int $id): ?Estudiante
    {
        return Estudiante::find($id);
    }

    public function create(array $data): Estudiante
    {
        return Estudiante::create($data);
    }

    public function update(int $id, array $data): ?Estudiante
    {
        $estudiante = Estudiante::find($id);

        if ($estudiante) {
            $estudiante->update($data);
        }

        return $estudiante;
    }

    public function delete(int $id): bool
    {
        $estudiante = Estudiante::find($id);

        if ($estudiante) {
            return $estudiante->delete();
        }

        return false;
    }
}
