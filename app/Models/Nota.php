<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';

    protected $fillable = [
        'estudiante_id',
        'curso_id',
        'materia_id',
        'nota',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
