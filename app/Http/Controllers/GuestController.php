<?php

namespace App\Http\Controllers;
use App\Models\Entry;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $entrada = Entry::with('user')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(5);
        return view('welcome', compact('entrada'));
    }


    public function vermyEntrada(Entry $myitem)
    {
        return view('entrada.show', compact('myitem'));
    }



}
