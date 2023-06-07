@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">Registro empresa</div>
                <div class="card-body">
                    @if (session('correcto'))
                    <div class="alert alert-success" role="alert">
                        {{ session('correcto') }}
                    </div>
                    @endif
                    <form action="{{ route('registro.tenant.post') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Coloca un nombre."
                                autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="dominio">Dominio</label>
                            <label class="sr-only" for="dominio">Dominio</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" name="dominio" id="dominio"
                                    placeholder="Escribe un dominio">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">localhost</div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Registra tu empresa
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 py-3">
            <div class="card">
                <div class="card-header bg-info">Lista de empresas</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE DE LA EMPRESA</th>
                            <th>DOMINIO</th>
                            <th>BASE DE DATOS</th>
                            <th>FECHA DE REGISTRO</th>
                            <th>FECHA DE ACTIVACIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                        <tr>
                            <td>{{ $tenant->id }}</td>
                            <td>{{ $tenant->name }}</td>
                            <td>
                                <a href="{{ $tenant->domain }}" target="_blank" rel="noopener noreferrer">
                                    {{ $tenant->domain }}
                                </a>
                            </td>
                            <td>{{ $tenant->database }}</td>
                            <td>{{ $tenant->created_at }}</td>
                            <td>{{ $tenant->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header bg-info">Publicar post</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('home') }}" method="get">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" name="titulo" placeholder="Coloca un titulo."
                                autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea class="form-control" name="mensaje" cols="30" rows="5" name="mensaje"
                                placeholder="Escribe tu mensaje" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Crear publicación
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-5">
            <div class="card">
                <div class="card-header bg-info">Mi ultima publicación</div>
                <div class="card-body">
                    <h4>{{ $titulo }}</h4>
                    <p>{{ $mensaje }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection