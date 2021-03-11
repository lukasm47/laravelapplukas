<?php

namespace App\Http\Controllers;
use App\Models\Entry;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    //CONSTRUCTOR
    public function __construct()
    {
       $this->Middleware('auth');
    }
    //Abrir vista Crear Entrada
    public function mostrarEntrada(){
        return view('entrada.crear');
    }

    //Agregar Entrada a la base de Datos (C)
    public function agregarEntrada(Request $request){
        //dd($request->all());
        $validateData = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries','edito' => 'required|min:7|max:255','content' =>'required|min:25|max:3000'
        ]);

        $entry = new Entry();
        $entry->title = $validateData['title'];
        $entry->edito = $validateData['edito'];
        $entry->content = $validateData['content'];
        $entry->user_id = auth()->id();
        $entry->save(); //ESTO ES EL INSERT

        $status = 'Se ha Guardado tu Entrada Correctamente';
        return back()->with(compact('status'));

    }

    //Abrir vista Editar Entrada
    public function showeditarEntrada(Entry $myitem)
    {
        return view('entrada.editar', compact('myitem'));
    }


    //METODO EDITAR ENTRADA

    public function updateEntrada(Request $request, Entry $myitem){

        $validateData = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries,id,'.$myitem->id,'edito' => 'required|min:7|max:255','content' =>'required|min:25|max:3000'
        ]);

        //falta validar que solo sea el user id
        //auth()->id() === $myitem->user_id
        $myitem->title = $validateData['title'];
        $myitem->edito = $validateData['edito'];
        $myitem->content = $validateData['content'];

        $myitem->save(); //ESTO ES EL INSERT

        $status = 'Se ha Actualizado tu Entrada Correctamente';
        //return back()->with(compact('status'));
        return view('entrada.show')->with(compact('status','myitem'));


    }


    //METODO ELIMINAR ENTRADA
    public function eliminarEntrada($myitem)
    {
        Entry::destroy($myitem);
        $myentradas = Entry::where('user_id', auth()->id())->get();
        $stats = "Se ha Eliminado la entrada Correctamente";

        return view('/home')->with(compact('stats', 'myentradas'));
    }
}
