<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //relacion entrada y usuarios
    //n entradas a 1 usuario
    //Eager loading, ser mas eficiente al cargar codigo
    public function user()
    {
        return $this->belongsto(User::class);
    }
}
