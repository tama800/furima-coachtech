<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;


/*Route::get('/', [ItemController::class, 'index']);/*index画面編集終えたら消す。その代わり下のを復活*/
/*Route::get('/mypage/profile', [ProfileController::class, 'editProfile']);/*プロフィール編集終えたら消す。その代わり下のを復活*/
/*Route::get('/sell', [ItemController::class, 'create']);商品出品画面編集終えたら消す。その代わり下のを復活*/
Route::get('/', [ItemController::class, 'index']);/*トップページ画面完了後復活*/

Route::get('/items/{item}', [ItemController::class, 'show']);
Route::middleware('auth')->group(function () {
    Route::get('/sell', [ItemController::class, 'create']);/*商品出品画面*/
    Route::post('/sell', [ItemController::class, 'store']);
    Route::get('/mypage/profile', [ProfileController::class, 'editProfile']);
    Route::post('/mypage/profile', [ProfileController::class, 'updateProfile']);
    Route::get('/purchase/{item}', [PurchaseController::class, 'purchase']);
    Route::get('/purchase/address/{item}', [AddressController::class, 'edit'])->whereNumber('item');
});
