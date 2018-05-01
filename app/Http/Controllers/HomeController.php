<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HomeController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        if($request->user()->hasAnyRole(['user'])){
            $data = DB::table('file')->get();
        }
        else{
            $data =  DB::table('file')->get();
        }
        return view('admin.home')->with('data',$data);
    }

    public function addFile(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        return view('addForm');
    }

    public function saveFile(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $user = $request->user();
        // var_dump($request->fileToUpload->getClientOriginalName());
        // exit();
        // Storage::put('document', $request->file('fileToUpload'));
    
        //Save to db    
        $id =  DB::table('file')->insertGetId(
            [   'name' => $request->fileToUpload->getClientOriginalName(),
                'created_at'=>Carbon::now()->toDateTimeString(),
                'updated_at'=>Carbon::now()->toDateTimeString()
            ]
        );
        $path = Storage::putFileAs(
            'document/'.$id, $request->fileToUpload, $request->fileToUpload->getClientOriginalName()
        );
    
        return redirect('/')->with('message', 'Success Insert Data !');
    
    }

    public function downloadFile($id,$name,Request $request)
    {   
        $request->user()->authorizeRoles(['admin','user']);
        $user = $request->user();   
        return Storage::download('document/'.$id.'/'.$name);   
    }

    public function deleteFile($id,$name,Request $request)
    {   
        
        $request->user()->authorizeRoles(['admin']);
        $user = $request->user();
        Storage::delete('document/'.$id.'/'.$name);
        DB::table('file')->where('id',$id)->delete();        
        return redirect('/')->with('message', 'Success Delete Data !');
    
    }

    public function show(){
        return view('welcome');
    }
}
