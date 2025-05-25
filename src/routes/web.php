<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;


/*Route::get('/', [ItemController::class, 'index']);/*index画面編集終えたら消す。その代わり下のを復活*/
/*Route::get('/mypage/profile', [ProfileController::class, 'editProfile']);/*プロフィール編集終えたら消す。その代わり下のを復活*/
/*Route::get('/sell', [ItemController::class, 'create']);商品出品画面編集終えたら消す。その代わり下のを復活*/
Route::get('/', [ItemController::class, 'index']);/*トップページ画面完了後復活*/
Route::get('/show', [ItemController::class, 'debugShow']);/*仮データ後で消す*/
Route::middleware('auth')->group(function () {
    Route::get('/sell', [ItemController::class, 'create']);/*商品出品画面できたら復活*/
    Route::get('/mypage/profile', [ProfileController::class, 'editProfile']);/*プロフィール設定画面が完了後復活
    */
    Route::post('/mypage/profile', [ProfileController::class, 'updateProfile']);
});
