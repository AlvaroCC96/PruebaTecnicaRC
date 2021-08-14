@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-around">        
                        <label for="">Archivos </label>
                        <a href="{{route('home')}}" class="btn btn-primary"> Volver</a>  
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombre Archivo</th>
                                <th width="280px">Acción</th>
                            </tr>
                        </thead>
                    
                        @foreach ($files as $file)
                        <tr>
                            <td>{{ $file->id }}</td>
                            <td>{{ $file->file_name.".".$file->extension }}</td>
                            <td>
                                <a href="{{route('download',$file->id)}}" class="btn btn-primary" type="button"> Descargar</a>
                            </td>   
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection