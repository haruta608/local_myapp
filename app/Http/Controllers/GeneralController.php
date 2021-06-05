<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App;
use App\User;
use App\Like;

class GeneralController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        return view('index', ['users' => $users]);

    }
}
