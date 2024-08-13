<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nota;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Materia;

class NotaSeeder extends Seeder
{
    public function run()
    {
        // Obtenemos IDs de estudiantes, cursos y materias
        $estudianteIds = Estudiante::pluck('id')->all();
        $cursoIds = Curso::pluck('id')->all();
        $materiaIds = Materia::pluck('id')->all();

        foreach (range(1, 5) as $index) {
            Nota::create([
                'estudiante_id' => $estudianteIds[array_rand($estudianteIds)],
                'curso_id' => $cursoIds[array_rand($cursoIds)],
                'materia_id' => $materiaIds[array_rand($materiaIds)],
                'nota' => rand(1, 10),
            ]);
        }
    }
}
