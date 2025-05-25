@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile_edit.css') }}">
@endsection

@section('content')
<div class="profile-form__content">
  <div class="profile-form__heading">
    <h2>プロフィール設定</h2>
  </div>
  <form class="form" action="/mypage/profile" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- プロフィール画像 -->
    <div class="form__icon">
      <img class="form__icon-image" src="{{ asset('images/default_icon.png') }}" alt="プロフィール画像">
      <label class="form__image-label">
        <input type="file" name="profile_image" hidden>
        画像を選択する
      </label>
    </div>

    <!-- 入力フォーム -->
    <div class="form__group">
      <span class="form__label--item">ユーザー名</span>
      <div class="form__input--text">
        <input type="text" name="name" value="{{ old('name') }}">
      </div>
    </div>

    <div class="form__group">
      <span class="form__label--item">郵便番号</span>
      <div class="form__input--text">
        <input type="text" name="postal_code" value="{{ old('postal_code') }}">
      </div>
    </div>

    <div class="form__group">
      <span class="form__label--item">住所</span>
      <div class="form__input--text">
        <input type="text" name="address" value="{{ old('address') }}">
      </div>
    </div>

    <div class="form__group">
      <span class="form__label--item">建物名</span>
      <div class="form__input--text">
        <input type="text" name="building" value="{{ old('building') }}">
      </div>
    </div>

    <!-- 更新ボタン -->
    <div class="form__button">
      <button class="form__button-submit" type="submit">更新する</button>
    </div>
  </form>
</div>
@endsection
