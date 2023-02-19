<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// お問い合わせ入力ページ
Route::get('/', [ContactController::class, 'index']);

// 確認ページ
Route::post('/confirm', [ContactController::class, 'confirm']);

// DB挿入
Route::post('/create', [ContactController::class, 'create']);

// 完了ページ
Route::get('/thanks',  [ContactController::class, 'thanks']);

// お問い合わせ管理トップ画面
Route::get('/maintenance', [ContactController::class, 'find']);

// 問い合わせ検索
Route::get('/search', [ContactController::class, 'search']);

// 問い合わせ削除
Route::post('/delete', [ContactController::class, 'delete']);
