@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nueva Entrada</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('entrada')}}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="title">Titulo</label>
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                 name="title" value="{{ old('title') }}" required autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="edito">Editorial</label>
                                <input id="edito" type="text" class="form-control @error('edito') is-invalid @enderror"
                                 name="edito" value="{{ old('edito') }}" required autocomplete="edito">

                                @error('edito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group row">
                            <label for="content">Contenido</label>
                                <textarea id="content" class="form-control @error('content') is-invalid @enderror"
                                 name="content" value="{{old('content')}}"></textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Entrada</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
