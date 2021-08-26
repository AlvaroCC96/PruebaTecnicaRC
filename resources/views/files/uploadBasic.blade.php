@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark">
                <div class="card-header bg-secondary text-white d-flex justify-content-around border-dark">
                    <h5>Subir Archivos - Basic</h5>
                    <a href="{{route('home')}}" class="btn btn-primary"> Volver</a>  
                </div>
                <div class="card-body">
                    <form method ="POST" action="{{route('saveDataByTag')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col"></div>
                            <div class="col-8 text-center justify-content-center">
                                <input id="arrayFiles" type="file" name="files[]" multiple class="form-control" required onChange="Filevalidation()"><br>
                                <button type="submit" class="btn btn-primary  mt-4">Subir Archivos</button>
                            </div>
                            <div class="col"></div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection