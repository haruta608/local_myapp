@extends('layouts.app')

@section('content')

<div class="container">
  <h1>オススメバンド一覧</h1>
  @if ($users != NULL)
    @foreach ($users as $user)
      <h4>{{ $user->name }}</h4>
        <ul class="list-group">
            @if ($user->bands != NULL)
                @foreach ($user->bands as $band)
                    <li class="list-group-item">{{ $band->band_name }}</li>
                @endforeach
            @endif
        </ul>
    @endforeach
  @endif

  @foreach($outfit)
    <div class="d-inline float-right">
    @if($likes[$loop->iteration]==1)
    <a href="{{route('nolike_home', $outfit->id)}}"><i class="fas fa-heart fa-2x my-pink"></i></a>
    @else
    <a href="{{route('like_home', $outfit->id)}}"><i class="fas fa-heart fa-2x my-gray"></i></a>
    @endif
    </div>
    <i class="fas fa-heart fa-2x my-pink float-right">{{$outfit->like}}</i>
  @endforeach
</div>
@endsection
