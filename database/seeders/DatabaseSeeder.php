<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Primero se ejecutan los seeders que no tienen claves foráneas
        $this->call([
            EstudianteSeeder::class,
            CursoSeeder::class,
            MateriaSeeder::class,
        ]);

        // Luego se ejecutan los seeders que dependen de otros datos
        $this->call([
            NotaSeeder::class,
        ]);
    }
}
