<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Cursos::class, 'materia_curso');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
