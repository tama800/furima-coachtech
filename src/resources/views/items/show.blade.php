@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/show.css') }}">
@endsection

@section('content')
<div class="item-detail">
  <div class="item-detail__image">
    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
  </div>

  <div class="item-detail__info">
    <h2 class="item-detail__name">{{ $item->name }}</h2>
    <p class="item-detail__brand">{{ $item->brand }}</p>
    <p class="item-detail__price">￥{{ number_format($item->price) }}（税込）</p>

    <div class="item-detail__actions">
      <div class="item-detail__icons">
        <span>☆ 3</span>
        <span>💬 1</span>
      </div>
      <a href="/purchase/{{ $item->id }}" class="item-detail__buy-btn">購入手続きへ</a>
    </div>

    <div class="item-detail__description">
      <h3>商品説明</h3>
      <p>{{ $item->description }}</p>
    </div>

    <div class="item-detail__extra">
      <h3>商品の情報</h3>
      <p>カテゴリー：
        @foreach ($item->categories as $category)
          <span class="item-detail__tag">{{ $category->name }}</span>
        @endforeach
      </p>
      <p>商品の状態：{{ $item->condition_label }}</p>
    </div>

    <div class="item-detail__comments">
      <h3>コメント({{ count($item->comments) }})</h3>
      @foreach ($item->comments as $comment)
        <div class="comment">
          <p class="comment__user">{{ $comment->user->name }}</p>
          <p class="comment__content">{{ $comment->comment }}</p>
        </div>
      @endforeach

      {{-- コメント送信フォーム（今はまだルートがないから一時的に止める） --}}
{{--
      <form action="{{ route('comments.store', $item->id) }}" method="POST">
        @csrf
        <div>
          <label for="comment">商品へのコメント</label>
          <textarea name="comment" id="comment" rows="4"></textarea>
        </div>
        @auth
          <button type="submit" class="item-detail__comment-btn">コメントを送信する</button>
        @else
          <p>※ コメントするにはログインが必要です。</p>
        @endauth
      </form>
      --}}
    </div>
  </div>
</div>
@endsection