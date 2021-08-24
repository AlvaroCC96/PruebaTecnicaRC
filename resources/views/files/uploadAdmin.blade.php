@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-around">
                    Subir Archivos - Admin
                    <a href="{{route('home')}}" class="btn btn-primary"> Volver</a>  
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('saveDataByTag')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input id ="arrayFiles"type="file" name="files[]" class="form-control" required onChange="Filevalidation()"><br>
                            <label for="names[]">Nombre: </label>
                            <select name="names[]" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary float-right mt-4">Subir Archivos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

