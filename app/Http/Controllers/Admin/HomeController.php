<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {        
        $userCount = 0;         

        //Contagem de usuarios
        $userCount = User::count();        
        
        return view('admin.home', [

            'userCount' => $userCount           
        ]);
    }
}