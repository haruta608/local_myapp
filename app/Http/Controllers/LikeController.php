<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Like;
use Auth;
class LikeController extends Controller
{
    // いいねをつける・消す機能
    public function update(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::id();
        $outfit_id = $data['band_id'];
        $like_data = Like::where('user_id', $user_id)->where('outfit_id', $outfit_id)->get();
        if (count($like_data) == 0) {
            $like = new Like;
            $like->user_id = Auth::id();
            $like->outfit_id = $data['band_id'];
            $like->save();
        } else {
            $like_data[0]->delete();
        }
        return redirect('/');
    }
}
