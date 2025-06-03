@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/index.css') }}">
@endsection

@section('content')
<div class="mypage">
  <div class="mypage__tabs">
    {{-- タブリンクは全員に表示 --}}
    <a href="/?tab=recommend" class="mypage__tab {{ request('tab') !== 'mylist' ? 'mypage__tab--active' : '' }}">おすすめ</a>
    <a href="/?tab=mylist" class="mypage__tab {{ request('tab') === 'mylist' ? 'mypage__tab--active' : '' }}">マイリスト</a>
  </div>

  <div class="mypage__items">
    @if (request('tab') === 'mylist')
        @auth
          {{-- ログイン中：マイリスト表示 --}}
          @foreach ($items as $item)
          <a href="/items/{{ $item->id }}" class="mypage__item-link">
            <div class="mypage__item-card">
              <div class="mypage__item-image">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
              </div>
              <div class="mypage__item-name">{{ $item->name }}</div>
            </div>
          </a>
          @endforeach
        @else
          {{-- ログインしてない：マイリストタブを開いた時のみ表示 --}}
          <p>マイリストの利用にはログインが必要です。</p>
        @endauth

    @else
      {{-- おすすめ表示（誰でも見れる） --}}
      @foreach ($items as $item)
      <a href="/items/{{ $item->id }}" class="mypage__item-link">
        <div class="mypage__item-card">
          <div class="mypage__item-image">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
        </div>
          <div class="mypage__item-name">{{ $item->name }}</div>
        </div>
      </a>
      @endforeach
    @endif
  </div>
</div>
@endsection
