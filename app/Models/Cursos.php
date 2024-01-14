<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        // Otros campos
    ];

    // Otras relaciones, métodos, etc.

    public function alumnos()
    {
        return $this->hasMany(Alumnos::class);
    }

}
