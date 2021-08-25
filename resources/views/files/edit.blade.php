@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-around">
                    Editar Archivo
                    <a href="{{route('home')}}" class="btn btn-primary"> Volver</a>  
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('files.update',$file->id)}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf  
                        <div class="form-group">
                            <label for="file">Nombre Archivo:</label>
                            <input id ="{{$file->id}}" type="text" name="file" class="form-control" required readonly value="{{$file->file_name}}"><br>
                            <label for="old_user">Propietario actual:</label>
                            <input id ="old_user" type="text" name="old_user" class="form-control" required readonly value="{{$file->user->name}}"><br>
                            <label for="new_user">Nombre nuevo propietario: </label>
                            <select name="new_user" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-warning float-right mt-4">Actualizar Datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection