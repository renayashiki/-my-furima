<?php

use Illuminate\Support\Facades\Route;

// 認証系
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ProfileSetupController;

// 商品系
use App\Http\Controllers\Product\ListController;
use App\Http\Controllers\Product\DetailController;
use App\Http\Controllers\Product\CreateController;
use App\Http\Controllers\Product\PurchaseController;
use App\Http\Controllers\Product\AddressUpdateController;

// プロフィール系
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\EditController;

// ---------------------------------------------
// 🔓 未認証でも閲覧できるページ
// ---------------------------------------------
Route::get('/products', [ListController::class, 'index'])
    ->name('products.index');

Route::get('/products/{id}', [DetailController::class, 'show'])
    ->name('products.show');

// ---------------------------------------------
// 🔐 認証まわり（Fortifyオーバーライド）
// ---------------------------------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// --- メール確認 ---

// src/routes/web.php

// ★ view作成終わったら復活させる本ルートをミドルウェアなしで有効化
Route::get('/email/verify', [EmailVerificationController::class, 'notice'])
    ->name('verification.notice'); // ★ ミドルウェアは削除（一時的）

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->name('verification.verify'); // ★ ミドルウェアは削除（一時的）

Route::post('/email/resend', [EmailVerificationController::class, 'resend'])
    ->name('verification.resend'); // ★ ミドルウェアは削除（一時的）

// ---------------------------------------------
// 🌈 メール認証後だけ行ける 初回プロフィール設定
// ---------------------------------------------
// Route::middleware(['auth', 'verified'])->group(function () {

Route::get('/profile/setup', [ProfileSetupController::class, 'index'])
    ->name('profile.setup');

Route::post('/profile/setup', [ProfileSetupController::class, 'store'])
    ->name('profile.setup.store');
// });

// ---------------------------------------------
// 🔐 ログイン後（verified 必須）
// ---------------------------------------------
// Route::middleware(['auth', 'verified'])->group(function () {

// 検索フォームのエラー回避のため、ルートを仮定義★
// ListControllerを使用し、仮のindexメソッドを指すことで、既存のコントローラを利用します。
Route::get('/products/search', [ListController::class, 'index'])
    ->name('products.search');

// マイページ
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile.index');

Route::get('/profile/edit', [EditController::class, 'edit'])
    ->name('profile.edit');

Route::post('/profile/edit', [EditController::class, 'update'])
    ->name('profile.update');

// 出品
Route::get('/products/create', [CreateController::class, 'create'])
    ->name('products.create');

Route::post('/products', [CreateController::class, 'store'])
    ->name('products.store');

// 購入
Route::get('/purchase/{id}', [PurchaseController::class, 'index'])
    ->name('purchase.index');

Route::post('/purchase/pay', [PurchaseController::class, 'pay'])
    ->name('purchase.pay');

// 住所変更
Route::get('/address/edit', [AddressUpdateController::class, 'edit'])
    ->name('address.edit');

Route::post('/address/edit', [AddressUpdateController::class, 'update'])
    ->name('address.update');
// });
