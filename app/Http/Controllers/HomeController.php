<?php

namespace App\Http\Controllers;

use App\User;
use App\FormDana as FormDana;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        $data = FormDana::all();
        return view('admin.home')->with('data',$data);
    }

    public function addForm(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        return view('addForm');
    }

    public function saveForm(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'user']);
        return redirect('/')->with('message', 'Success Insert Data !');
    
    }

    public function show(){
        return view('welcome');
    }
}
