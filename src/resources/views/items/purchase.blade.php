@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/purchase.css') }}">
@endsection

@section('content')
<div class="purchase-container">
  <div class="purchase-main">
    <div class="purchase-item">
      <div class="purchase-item__image">
        <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像">
      </div>
      <div class="purchase-item__info">
        <h2 class="purchase-item__name">{{ $item->name }}</h2>
        <p class="purchase-item__price">\{{ number_format($item->price) }}</p>
      </div>
    </div>

    <div class="purchase-section">
      <h3>支払い方法</h3>
      <select name="payment_method" class="purchase-select">
        <option value="">選択してください</option>
        <option value="credit">クレジットカード</option>
        <option value="convenience">コンビニ払い</option>
      </select>
    </div>

    <div class="purchase-section">
      <h3>配送先</h3>
      <p>〒{{ $profile->postal_code }}</p>
      <p>{{ $profile->address }}</p>
      @if (!empty($profile->building))
        <p>{{ $profile->building }}</p>
      @endif
      <a href="/purchase/address/{{ $item->id }}" class="purchase-change">変更する</a>
    </div>
  </div>

  <div class="purchase-summary">
    <table class="summary-table">
      <tr>
        <th>商品代金</th>
        <td>\{{ number_format($item->price) }}</td>
      </tr>
      <tr>
        <th>支払い方法</th>
        <td>コンビニ払い</td>
      </tr>
    </table>
    <button class="purchase-btn">購入する</button>
  </div>
</div>
@endsection
