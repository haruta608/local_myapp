@extends('layouts.app')
@section('band_name', 'オススメバンド一覧')

@section('content')

<div class="container">
  <h1 class="font_test">オススメバンド一覧</h1>
  @if ($users != NULL)
    @foreach ($users as $user)
      <h4>{{ $user->name }}</h4>
        <ul class="list-group">
            @if ($user->bands != NULL)
                @foreach ($user->bands as $band)
                    <li class="list-group-item">
                      {{ $band->band_name }}
                      {{ $band->description }}
                      @if( Auth::check() )
                        <button>いいね</button>
                      @endif
                      {{ count($band->likes) }}
                    </li>
                @endforeach
            @endif
        </ul>
    @endforeach
  @endif

</div>
@endsection
