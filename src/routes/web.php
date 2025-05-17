<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


/*Route::get('/', [ItemController::class, 'index']);// index画面編集終えたら消す。その代わり下のを復活*/
Route::middleware('auth')->group(function () {
    Route::get('/', [ItemController::class, 'index']);
});