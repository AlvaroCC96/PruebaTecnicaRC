@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tittle text-center">
                        Prueba Tecnica RC - Alvaro Castillo Calabacero
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">
                                Existen 2 tipos de usuario, Admin y Basic.
                            </p>
                            <p>Usuario Admin: admin@gmail.com password: admin</p>
                            <p>Usuario Basic: basic@gmail.com password: basic</p>
                        </div>
                        <div class="col">
                            <p class="card-text">
                                Un usuario Admin puede subir 1 archivo y asignarle el usuario a cargo de dicho archivo.
                            </p>
                            <p>Un usuario Admin puede ver todos los archivos del sistema y descargarlos</p>
                            <p>Un usuario Admin ó Basic puede ver sus propios archivos del sistema y descargarlos</p>
                            <p>Un usuario Admin ó Basic subir varios archivos al sistema , estos quedan asignados a el mismo.</p>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('home')}}" class="btn btn-primary">Inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
