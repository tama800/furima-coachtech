<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create',compact('categories'));
    }

    public function store(Request $request)
    {
        // 画像がアップされてなかったらエラーにする
        if (!$request->hasFile('image')) {
        return back()->withErrors(['image' => '画像は必須です'])->withInput();
        }

        $image = $request->file('image')->store('items', 'public');

        $item = Item::create([
            'user_id' => auth()->id(),
            'image' => $image,
            'condition' => $request->condition,
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'is_sold' => false,
        ]);

        if ($request->filled('category_ids')) {
        $now = now();
        $item->categories()->attach(
        $request->category_ids,
        ['created_at' => $now, 'updated_at' => $now]
        );
        }

        return redirect('/')->with('message', '商品を出品しました');
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