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
    public function index(Request $request)
    {
        $users = User::all();

        return view('index', ['users' => $users]);
    }

    public function serch(Request $request)
    {
      $serch_name = $request->serch_name;
      if ($serch_name != '') {
        $posts = App::where('band_name', $serch_name)->get();
      } else {
        $posts = App::all();
      }
      return view('index', ['posts' => $posts, 'serch_name' => $serch_name]);
    }
}
