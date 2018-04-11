<?php

namespace App\Http\Controllers\Home;

use App\User;
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
      return view('home');
    }

    public function show(){
        return view('welcome');
    }
}
