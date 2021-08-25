@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-around">        
                        Archivos
                        <a href="{{route('home')}}" class="btn btn-primary"> Volver</a>  
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombre Archivo</th>
                                <th>Propietario</th>
                                <th width="280px">Acción</th>
                            </tr>
                        </thead>
                    
                        @foreach ($files as $file)
                        <tr>
                            <td>{{ $file->id }}</td>
                            <td>{{ $file->file_name.".".$file->extension }}</td>
                            <td> {{$file->user->name}}</td>
                            <td>
                                <a href="{{route('download',$file->id)}}" class="btn btn-sm btn-success" type="button"> Descargar</a>
                                @if (Auth::user()->role('admin'))
                                    <a href="{{route('files.edit',$file->id)}}" class="btn btn-sm btn-warning" type="button"> Editar</a>
                                @endif
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$file->id}}">
                                    Eliminar
                                </button>                
                            </td>   
                        </tr>
                        @include('files.delete')
                        @endforeach
                    </table>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection