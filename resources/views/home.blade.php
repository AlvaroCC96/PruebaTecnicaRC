@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header bg-secondary text-white border-dark text-center d-flex justify-content-center">
                    <nav class="navbar navbar-expand-sm navbar-light bg-secondary text-center text-white">
                        

                        <ul class="navbar-nav mr-auto text-center">
                            <div class="">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
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

                <div class="card-body text-center ">
                    
                    <div class="row">
                        <div class="col justify-content-center">
                            <p class="card-text ">
                                Existen 2 tipos de usuario, Admin y Basic.
                            </p>
                            <p>Actualmente te encuentras en: <strong>Usuario: {{Auth::user()->roles[0]->name }} </strong> </p>
                        </div>
                        <div class="col">
                            <p> <strong>Funciones Permitidas</strong></p>
                            @if (Auth::user()->roles[0]->name =="Admin")
                                <p>Un usuario Admin puede ver <strong>todos</strong> los archivos del sistema y descargarlos</p>
                                <p>
                                    Un usuario Admin puede subir <strong> 1 </strong> archivo y asignarle el usuario a cargo de dicho archivo.
                                    (Subir Archivo Admin)
                                </p>
                                <p>Un usuario Admin subir varios archivos al sistema , estos quedan asignados a el mismo. (Subir Archivos Basic)</p>
                                <p>Un usuario Admin puede ver sus propios archivos del sistema y descargarlos </p>
                                <p>Un usuario Admin puede eliminar y editar archivos del sistema</p>
                            @elseif(Auth::user()->roles[0]->name =="Basic") 
                                <p>Un usuario Basic subir varios archivos al sistema , estos quedan asignados a el mismo. (Subir Archivos Basic)</p>
                                <p>Un usuario Basic puede ver sus propios archivos del sistema y descargarlos </p>   
                            @endif
                        </div>

                    </div>

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