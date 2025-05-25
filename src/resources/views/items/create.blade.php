@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/create.css') }}">
@endsection

@section('content')
<div class="item-form__content">
  <div class="item-form__heading">
    <h2>商品の出品</h2>
  </div>
  <form class="form" action="/items" method="post" enctype="multipart/form-data">
    @csrf

    {{-- 商品画像 --}}
    <div class="form__group">
      <div class="form__group-title">商品画像</div>
      <div class="form__group-content">
        <input type="file" name="image">
      </div>
    </div>

    {{-- カテゴリー --}}
    {{--
    <div class="form__group">
      <div class="form__group-title">カテゴリー</div>
      <div class="form__group-content category-tags">
        @foreach ($categories as $category)
          <label class="tag">
            <input type="radio" name="category_id" value="{{ $category->id }}">
            {{ $category->name }}
          </label>
        @endforeach
      </div>
    </div>
    --}}
    {{-- 商品の状態 --}}
    <div class="form__group">
      <div class="form__group-title">商品の状態</div>
      <div class="form__group-content">
        <select name="condition">
          <option value="">選択してください</option>
          <option value="1">良好</option>
          <option value="2">目立った傷や汚れなし</option>
          <option value="3">やや傷や汚れあり</option>
          <option value="4">状態が悪い</option>
        </select>
      </div>
    </div>

    {{-- 商品名 --}}
    <div class="form__group">
      <div class="form__group-title">商品名</div>
      <div class="form__group-content">
        <input type="text" name="name" value="{{ old('name') }}">
      </div>
    </div>

    {{-- ブランド名 --}}
    <div class="form__group">
      <div class="form__group-title">ブランド名</div>
      <div class="form__group-content">
        <input type="text" name="brand" value="{{ old('brand') }}">
      </div>
    </div>

    {{-- 商品説明 --}}
    <div class="form__group">
      <div class="form__group-title">商品の説明</div>
      <div class="form__group-content">
        <textarea name="description" rows="5">{{ old('description') }}</textarea>
      </div>
    </div>

    {{-- 販売価格 --}}
    <div class="form__group">
      <div class="form__group-title">販売価格</div>
      <div class="form__group-content">
        <input type="number" name="price" value="{{ old('price') }}" placeholder="¥">
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">出品する</button>
    </div>
  </form>
</div>
@endsection
