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

        $likes=array();
        $likes[0]='dummy';
        foreach($outfit)
        {
          $like=Like::where('user_id', $id)->where('outfit_id', $outfit['id'])->first();
          if(!empty($like))
          {
            $like=1;
          }else {
            $like=0;
          }
          array_push($likes,$like);
        }

        foreach($outfit)
        {
          $like_count=0;
          $like_count=Like::where('outfit_id',$outfit['id'])->count();
          $outfit['like']=$like_count;
        }
    }
}
