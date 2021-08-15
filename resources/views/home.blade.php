@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <ul class="navbar-nav mr-auto">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Administrar Archivos
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      
                                        @if(auth()->user()->can('file-assing'))
                                        <a class="dropdown-item" href="{{route('listAdmin')}}">Listar Todos los Archivos</a>
                                        <a class="dropdown-item" href="{{route('uploadAdmin')}}">Subir Archivo (Admin)</a>
                                        
                                        @endif
                                        <a class="dropdown-item" href="{{route('uploadBasic')}}">Subir Archivo (Basic)</a>
                                        <a class="dropdown-item" href="{{route('listBasic')}}">Listar Mis Archivos</a>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </nav>
                </div>

                <div class="card-body text-center">
                    <strong>MENU DE OPCIONES</strong>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session("status") }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection