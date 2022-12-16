<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;

Route::get('/', function () {
    return view('shop');
});
Route::get('/', [ShopController::class, 'index']);
Route::get('/thanks', function () {
    return view('/thanks');
});
Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/detail/{id}', [ShopController::class, 'show']);
Route::post('/add', [ReservationController::class, 'create'])->name('create');
Route::get('/done', function () {
    return view('/done');
});
Route::post('/like/add/{id}', [LikeController::class, 'create']);
Route::post('/like/delete/{id}', [LikeController::class, 'delete']);
Route::get('/mypage', function () {
    return view('/mypage');
})->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
