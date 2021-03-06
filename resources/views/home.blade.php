@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Mis Entradas: <p>
                    <ul>
                        @foreach ($myentradas as $myitem)
                            <li>
                                <a href="{{ url('entrada/N°').$myitem->id}}">{{$myitem->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                    @if(Request::isMethod('delete'))
                    <!------ aqui faltaria un if para validar tipo de mensaje ---->
                    <div class="alert alert-success">{{$stats}}</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
