{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', 'バンド登録画面')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>バンド登録</h2>
        <form action="{{ action('Admin\AppController@register') }}" method="post" enctype="multipart/form-data">
          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2" for="band_name">おすすめバンド</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="band_name" value="{{ old('band_name') }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="description">紹介文</label>
            <div class="col-md-10">
              <textarea class="form-control" name="description" rows="10">{{ old('description') }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="recommend_music">おすすめ曲</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="recommend_music" value="{{ old('recommend_music') }}">
            </div>
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="更新">
        </form>
      </div>
    </div>
  </div>
@endsection
