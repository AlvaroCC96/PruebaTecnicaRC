<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
     * this method is validated with middleware aut
     *
     * @return view
     */
    public function listAdmin()
    {
        $hasPermission = Auth::user()->hasPermissionTo('file-assing');
        if ($hasPermission) {
            $files = File::all();
            return view('files.list', compact('files'));
        } else {
            abort(404);
        }
    }

    /**
     * Generate a view with the files of a user X
     * this method is validated with middleware auth
     *
     * @return view
     */
    public function listBasic(){
        $id =Auth::id();
        $files = File::where('user_id',$id)->get();
        return view('files.list', compact('files'));   
    }

    /**
     * get basic view for upload file
     *
     * @return view
     */
    public function uploadBasic(){
        return view('files.uploadBasic');
    }
        
    /**
     * get admin view for upload file
     *
     * @return view
     */
    public function uploadAdmin(){
        $users = User::all();
        return view('files.uploadAdmin', compact('users'));
    }
    
    /**
     * Save files to database , generla method for admin/basic user
     *
     * @param  mixed $request
     * @return void
     */
    public function saveDataByTag(Request $request) {
        // Validation for sizes files
        $validator = Validator::make($request->all(), [
            'files.*' => 'max:2048',
        ]);

        if($validator->fails()){
            Alert::error('Error','Hay archivos que sobrepasan el limite de tamaño(2MB)');
            return back();
            
        }

        isset($request->names)? $user_id = $request->names[0]: $user_id = Auth::id(); 
        
        $files = $request->file('files');
        if ($files != null) {
            foreach($files as $file){
                $this->saveFile($file,$user_id) == true? $isError = false:  $isError = true;
                if($isError){
                    Alert::error('Error', 'Ha ocurrido un error');
                    return back();
                }
            }
            Alert::success('Completado', 'Carga de archivos exitosa');
            return back();
        }
        Alert::error('Error','No hay archivos para subir');
        return back();
    }
        
    /**
     * Save file in storage and database
     *
     * @param  mixed $file
     * @param  mixed $user_id
     * @return boolean
     */
    public function saveFile($file,$user_id){
        $route = '/'.'public/'.$user_id.'/';
        $data = $this->getDataFromFile($file);
        if(Storage::putFileAs($route,$file,$data[0])){
            File::create([
                'file_name' => $data[2],
                'extension'=> $data[1],
                'route' => $route.$data[0], 
                'user_id'=> $user_id, 
            ]);
            return true;
        } 
        return false;
    }
        
    /**
     * Return array with path parts from file
     *
     * @param  mixed $file
     * @return array
     */
    public function getDataFromFile($file){
        $full_name = $file->getClientOriginalName();
        return array($full_name,
            pathinfo($full_name, PATHINFO_EXTENSION),
            pathinfo($full_name,PATHINFO_FILENAME)
        );
    }
        
    /**
     * Download a file from database and storage
     *
     * @param  mixed $id
     * @return void
     */
    public function download($id){
        $isAdmin= Auth::user()->hasRole('Admin');
        try{
            $file = File::select()->where('id',$id)->get()[0];
            if ($isAdmin || $file['user_id'] == Auth::id()) {
                return Storage::download($file['route']); 
            }
            Alert::error('Error', 'No tiene permisos para descargar este archivo');
            return back();
        } catch(Exception $e) {
            Alert::error('Error', 'ha ocurrido un error');
            return back();
        } 
    }
}
