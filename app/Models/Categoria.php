<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $timestamps = false; //Ignora las dos columnas por defecto de más de actualizado y creado
    use HasFactory;
}
