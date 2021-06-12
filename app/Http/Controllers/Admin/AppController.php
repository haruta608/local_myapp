<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\App;
use App\History;
use Carbon\Carbon;
use Auth;

class AppController extends Controller
{
    //
    public function add()
    {
      return view('admin.band.register');
    }

    public function register(Request $request)
    {
      $this->validate($request, App::$rules);

      $band = new App;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // ユーザーIDを追加
      $form['user_id'] = Auth::id();
      // データベースに保存する
      $band->fill($form);
      $band->save();

      return redirect('admin/band/register');
    }

    public function index(Request $request)
    {
      $band_name = $request->band_name;
      if ($band_name != '') {
        // 検索されたら検索結果を取得する
        $posts = App::where('band_name', $band_name)->get();
      }else {
        // それ以外は全てを表示する
        $posts = App::where('user_id', Auth::id())->get();
      }
      return view('admin.band.index', ['posts' => $posts, 'band_name' => $band_name]);
    }

    public function edit(Request $request)
    {
      // App Modelからデータを取得する
      $band = App::find($request->id);
      if (empty($band)) {
        abort(404);
      }
      return view('admin.band.edit', ['band_form' => $band]);
    }

    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, App::$rules);
      // App Modelからデータを取得する
      $band = App::find($request->id);
      // 送信されてきたフォームデータを格納する
      $band_form = $request->all();
      unset($band_form['_token']);
      // 該当するデータを上書きして保存する
      $band->fill($band_form)->save();

      $history = new History;
      $history->user_id = $band->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/band');
    }

    public function delete(Request $request)
    {
      // 該当するApp Modelを取得
      $band = App::find($request->id);
      // 削除する
      $band->delete();
      return redirect('admin/band/');
    }
}
