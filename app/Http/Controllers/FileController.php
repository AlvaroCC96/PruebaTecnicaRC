<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
Use Alert;
use DB;
use Response;


class FileController extends Controller
{
    /**
     * Display a listing of the file.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:file-upload|file-view|file-download', ['only' => ['index', 'show']]);
        $this->middleware('permission:file-upload', ['only' => ['create', 'store']]);
        $this->middleware('permission:file-assing', ['only' => ['edit', 'update']]);
    }

    /**
     * Generate a view with all files on the system
     */
    public function listAdmin()
    {
        try {
            $hasPermission = Auth::user()->hasPermissionTo('file-assing');
            if ($hasPermission) {
                $files = File::all();
                return view('files.list', compact('files'));
            } else {
                abort(404);
            }

        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Generate a view with the files of a user X
     */
    public function listBasic(){
        try{
            $id =Auth::id();
            $files = File::where('user_id',$id)->get();
            return view('files.list', compact('files'));
        } catch (Exception $e) {
            abort(505);
        }
    }
    /**
     * Get a view for upload file
     */
    public function uploadBasic(){
        return view('files.uploadBasic');
    }

    public function fileSaveBasic(Request $request){
        /** 
         * Asumo cualquier tamaño para los archivos, de lo contrario se debe modificar
        */
        // $max_size = (int)ini_get('upload_max_size') * 10240;
        $files = $request->file('files');
        if ($files == null) {
            Alert::error('Error','No hay archivos para subir');
            return back();
        }
        $user_id = Auth::id();
        foreach ($files as $file) {
                
            $full_name = $file->getClientOriginalName();
            $extension = pathinfo($fullName, PATHINFO_EXTENSION);
            $file_name = pathinfo($fullName,PATHINFO_FILENAME);
            $route = '/'.'public/'.$user_id.'/';

            if(Storage::putFileAs($route,$file,$fullName)){
                File::create([
                    'file_name' => $file_name,
                    'extension'=> $extension,
                    'route' => $route.$full_name, 
                    'user_id'=> $user_id, 
                ]);
            } else {
                Alert::error('Error', 'Ha ocurrido un error');
                return back();
            } 
        }
        Alert::success('Completado', 'Archivos subidos con exito');
        return back();
    }

    /**
     * Download file by id
     */
    public function download($id){
        $file = File::select('route')->where('id',$id)->get()[0];
        return Storage::download($file['route']);  
    }
}
