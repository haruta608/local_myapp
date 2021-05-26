<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function exeOther_outfitLike($id)
    {
      $like = new Like;
      $like->user_id=Auth::id();
      $like->outfit_id=$id;
      $like->save();

      return redirect(route('home'));
    }

    public function exeOther_outfitNoLike($id)
    {
      $user_id=Auth::id();
      $like=Like::where('user_id', $user_id)->where('outfit_id', $id)->first();
      $like->delete();

      return redirect(route('home'));
    }

}
