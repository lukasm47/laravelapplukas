@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>BIENVENIDO A PUBLICACIONES |ONE| </h3>
            <div>Ultimas entradas publicadas</div>
                @foreach ($entrada as $publica)
                    <div class="card mt-4">
                        <div class="card-header">
                            {{$publica->id}}.  {{$publica->title}}
                        </div>

                        <div class="card-body">
                            <p>Editorial: {{$publica->edito}}</p>
                            <p class="bg-info">{{$publica->content}}</p>
                        </div>
                        <div class="card-footer">
                            Autor:
                            <a href="{{ url('usuarios/'.$publica->user_id) }}">
                                {{ $publica->user->name }}
                            </a>

                        </div>
                    </div>
                @endforeach
                <br>
                {{$entrada->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection
