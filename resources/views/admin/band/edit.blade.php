@extends('layouts.admin')
@section('band_name', 'バンドの編集')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>バンドの編集</h2>
        <form action="{{ action('Admin\AppController@update') }}" method="post" enctype="multipart/form-data">
          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          <div class="form-group row">
            <label class="col-md-2" for="band_name">バンド名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="band_name" value="{{ $band_form->band_name }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2" for="description">紹介文</label>
            <div class="col-md-10">
              <textarea class="form-control" name="description" rows="20">{{ $band_form->description }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-10">
              <input type="hidden" name="id" value="{{ $band_form->id }}">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">
            </div>
          </div>
        </form>
        <div class="row mt-5">
          <div class="col-md-4 mx-auto">
            <h2>編集履歴</h2>
            <ul class="list-group">
              @if ($band_form->histories != NULL)
                @foreach ($band_form->histories as $history)
                  <li class="list-group-item">{{ $history->edited_at }}</li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
