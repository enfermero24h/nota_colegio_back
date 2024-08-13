<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'curso_estudiante');
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'materia_curso');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
