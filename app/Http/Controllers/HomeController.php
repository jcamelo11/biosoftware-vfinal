<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Ave;

use Illuminate\Http\Request;

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
    public function index()
    {
        $userCount = User::count();
        $aveCount = Ave::count();
        return view('home', ['userCount' => $userCount], ['aveCount' => $aveCount]);
       
    }
}
