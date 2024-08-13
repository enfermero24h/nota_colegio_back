<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Cursos::class, 'curso_estudiante');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
