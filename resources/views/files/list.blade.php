@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header bg-secondary text-white d-flex justify-content-around border-dark">
                    <br>        
                    <h5>Archivos</h5>
                    <a href="{{route('home')}}" class="btn btn-primary"> Volver</a>  
                </div>
                <div class="card-body">
                    <div class="table-responsive rounded">
                        <table class="table rounded table-bordered table-hover text-center">
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
                                    @if (Auth::user()->roles[0]->name=='Admin') 
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
</div>
@endsection