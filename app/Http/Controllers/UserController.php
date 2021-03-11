<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Entry;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //METODO MOSTRAR USUARIOS
    public function mostrarUsuario(User $user)
    {
        $entries = Entry::where('user_id', $user->id)->get();
        return view('usuarios/show', compact('user', 'entries'));
    }
}
