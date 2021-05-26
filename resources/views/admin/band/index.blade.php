@extends('layouts.admin')
@section('band_name', '登録済みのバンド一覧')

@section('content')
  <div class="container">
    <div class="row">
      <h2>バンド一覧</h2>
    </div>
    <div class="row">
      <div class="col-md-4">
        <a href="{{ action('Admin\AppController@add') }}" role="button" class="btn btn-primary">新規作成</a>
      </div>
      <div class="col-md-8">
        <form action="{{ action('Admin\AppController@index') }}" method="get">
          <div class="form-group row">
            <label class="col-md-2">バンド</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="cond_band_name" value="{{ $cond_band_name }}">
            </div>
            <div class="col-md-2">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="検索">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="list-app col-md-12 mx-auto">
        <div class="row">
          <table class="table table-dark">
            <thead>
              <tr>
                <th width="10%">ID</th>
                <th width="20%">バンド</th>
                <th width="50%">紹介文</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $key)
                <tr>
                  <td>{{ str_limit($key->id, 10) }}</td>
                  <td>{{ str_limit($key->band_name, 50) }}</td>
                  <td>{{ str_limit($key->description, 500) }}</td>
                  <td>
                    <div>
                      <a href="{{ action('Admin\AppController@edit', ['id' => $key->id])}}">編集</a>
                    </div>
                    <div>
                      <a href="{{ action('Admin\AppController@delete', ['id' => $key->id])}}">削除</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
