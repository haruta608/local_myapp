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
      return view('admin.app.register');
    }

    public function register(Request $request)
    {
      $this->validate($request, App::$rules);

      $app = new App;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // ユーザーIDを追加
      $form['user_id'] = Auth::id();
      // データベースに保存する
      $app->fill($form);
      $app->save();

      return redirect('admin/app/register');
    }

    public function index(Request $request)
    {
      $cond_band = $request->cond_band;
      if ($cond_band != '') {
        // 検索されたら検索結果を取得する
        $posts = App::where('band', $cond_band)->get();
      }else {
        // それ以外は全てを表示する
        $posts = App::all();
      }
      return view('admin.app.index', ['posts' => $posts, 'cond_band' => $cond_band]);
    }

    public function edit(Request $request)
    {
      // App Modelからデータを取得する
      $app = App::find($request->id);
      if (empty($app)) {
        abort(404);
      }
      return view('admin.app.edit', ['app_form' => $app]);
    }

    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, App::$rules);
      // App Modelからデータを取得する
      $app = App::find($request->id);
      // 送信されてきたフォームデータを格納する
      $app_form = $request->all();
      unset($app_form['_token']);
      // 該当するデータを上書きして保存する
      $app->fill($app_form)->save();

      $history = new History;
      $history->user_id = $app->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/app');
    }

    public function delete(Request $request)
    {
      // 該当するApp Modelを取得
      $app = App::find($request->id);
      // 削除する
      $app->delete();
      return redirect('admin/app/');
    }
}
