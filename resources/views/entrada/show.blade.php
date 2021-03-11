@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <!------ Mostrar titulo   ---->
                <div class="card-header">{{$myitem->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!------ Mostrar contenido   ---->
                    <p>Editorial: {{$myitem->edito}}</p>
                    {{$myitem->content}}
                     <!------ VALIDAR BOTON EDITAR PO ID SESSION   ---->
                    @if ($myitem->user_id === auth()->id())
                    <hr>

                        <a href="{{ url('/entrada/N°').$myitem->id.'/editar'}}" class="btn btn-primary">Editar entrada </a>

                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteEntra">Borrar entrada</button>
                    @endif
                     <!------ Validar mensaje de editado  ---->
                    <hr>
                    @if(Request::isMethod('put'))
                        <!------ aqui faltaria un if para validar tipo de mensaje ---->
                        <div class="alert alert-success">{{$status}}</div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-danger fade" id="deleteEntra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">¡Atención!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Esta seguro de Borrar la Entrada con Titulo: {{$myitem->title}}</p>
        <form action="{{url('/entrada/borrar'.$myitem->id)}}" method="POST">
        @csrf @method('DELETE')
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Borrar Entrada</button>
            </div>
        </form>
      </div>
    </div>
</div>

@endsection
