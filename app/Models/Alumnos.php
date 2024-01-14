<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    public function curso(){
        return $this->belongsTo(Cursos::class, 'cursos_id', 'id');
    }
}
