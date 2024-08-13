<?php

namespace App\Services;

use App\Models\Curso;
use Illuminate\Support\Collection;

class CursoService
{
    public function getAll(): Collection
    {
        return Curso::all();
    }

    public function getById(int $id): ?Curso
    {
        return Curso::find($id);
    }

    public function create(array $data): Curso
    {
        return Curso::create($data);
    }

    public function update(int $id, array $data): ?Curso
    {
        $curso = Curso::find($id);

        if ($curso) {
            $curso->update($data);
        }

        return $curso;
    }

    public function delete(int $id): bool
    {
        $curso = Curso::find($id);

        if ($curso) {
            return $curso->delete();
        }

        return false;
    }
}
