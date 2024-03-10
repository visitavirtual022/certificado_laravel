<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;

class Profesor extends Model
{
    use HasFactory;
    protected $table="profesores";
    protected $fillable=["nombre","apellidos","dni","departamento","email"];
}
