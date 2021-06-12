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

    public function search(Request $request)
    {
      $users = User::all();
      $band_name = $request->band_name;
      if ($band_name != '') {
        $posts = App::where('band_name', $band_name)->get();
      } else {
        $posts = App::where('user_id', Auth::id())->get();
      }
      return view('index', ['users' => $users, 'posts' => $posts, 'band_name' => $band_name]);
    }
}
