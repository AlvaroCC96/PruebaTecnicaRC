@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-around">
                Subir Archivos - Basic
                <a href="{{route('home')}}" class="btn btn-primary"> Volver</a>  
                </div>
                <div class="card-body">
                    <form method ="POST" action="{{route('saveDataByTag')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="files[]" multiple class="form-control" required><br>
                        <button type="submit" class="btn btn-primary float-right mt-4">Subir Archivos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection