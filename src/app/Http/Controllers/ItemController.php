<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function show(Item $item)
    {
    // すでに$itemには該当IDの商品情報が入ってる（自動バインディング）
        $item->load(['comments.user', 'categories']); // リレーションも一緒に取得

        return view('items.show', compact('item'));
    }

    public function debugShow()
{
    // 仮データで表示テスト
    $item = (object)[
        'id' => 1,
        'name' => 'テスト商品',
        'brand' => 'テストブランド',
        'price' => 47000,
        'description' => 'カラー：グレー<br>商品の状態は良好です。',
        'condition_label' => '良好',
        'image' => 'sample.jpg',
        'categories' => collect([
            (object)['name' => '洋服'],
            (object)['name' => 'メンズ'],
        ]),
        'comments' => collect([
            (object)[
                'user' => (object)['name' => 'admin'],
                'comment' => 'こちらにコメントが入ります。',
            ]
        ]),
    ];

    return view('items.show', compact('item'));
}
}