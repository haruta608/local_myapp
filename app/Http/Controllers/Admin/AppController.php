<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\App;
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
    public function edit()
    {
      return view('admin.app.edit');
    }
    public function update()
    {
      return redirect('admin/app/edit');
    }
}
