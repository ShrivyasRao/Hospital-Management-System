<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicines;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=0)
    {
        if($id==3)
        {
            $res = Medicines::orderBy('medicine_name')->get();
            //dd($res);
            return view('home',compact('res'));
        }
        $res = Medicines::all();
        return view('home',compact('res'));
    }
}
