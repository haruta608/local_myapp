@extends('layouts.app')
@section('band_name', 'オススメバンド一覧')
@section('content')
<div class="container">
  <h1 class="font_test">Recommnd Bands</h1>
  @if ($users != NULL)
    @foreach ($users as $user)
      <h4>{{ $user->name }}</h4>
        <ul class="list-group">
            @if ($user->bands != NULL)
                @foreach ($user->bands as $band)
                    <li class="list-group-item flex_wrap">
                        <div class="band_info">
                            <h5 class="band_name">{{ $band->band_name }}</h5>
                            <p class="band_description">{{ $band->description }}</p>
                            <hr>
                            <h6 class="band_recommend">おすすめ曲：{{ $band->recommend_music }}</h6>
                        </div>
                        <div class="like_info">
                            @if( Auth::check() )
                                <form class="like_form" action="{{ action('LikeController@update') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="band_id" value="{{ $band->id }}">
                                    <button type="submit">
                                        @if (count($band->likes->where('user_id', Auth::id())) == 0)
                                          <div class="img_wrap">
                                            <img src="https://frame-illust.com/fi/wp-content/uploads/2016/04/7560c.png" width="25px" height="25px" alt="ノーマルな顔">
                                          </div>
                                        @else
                                          <div class="img_wrap">
                                            <img src="https://frame-illust.com/fi/wp-content/uploads/2018/02/smile-wink.png" width="25px" height="25px" alt="ニコニコな顔">
                                          </div>
                                        @endif
                                    </button>
                                </form>
                            @endif
                            {{ count($band->likes) }}
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    @endforeach
  @endif
</div>
@endsection
