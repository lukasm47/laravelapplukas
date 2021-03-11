@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Listado de Autores del Sitio</h3>
            <div class="card">
                 <!------ Mostrar titulo   ---->
                <div class="card-header">{{$user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Entradas publicadas: <p>
                    <ul>
                        @foreach ($entries as $myitem)
                            <li>
                                <a href="{{ url('entrada/N°').$myitem->id}}">{{$myitem->title}}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
