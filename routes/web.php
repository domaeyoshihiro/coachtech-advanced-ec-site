<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RepresentativeController;

Route::get('/', [ShopController::class, 'index']);
Route::get('/thanks', function () {
        return view('/thanks');
    })->middleware(['verified']);
Route::group(['middleware' => ['auth', 'can:general']], function () {
    Route::get('/search', [ShopController::class, 'search'])->name('search');
    Route::get('/detail/{id}', [ShopController::class, 'show']);
    Route::post('/reservation/add', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/edit/{id}', [ReservationController::class, 'update']);
    Route::post('/reservation/delete/{id}', [ReservationController::class, 'delete']);
    Route::get('/done', function () {
        return view('/done');
    });
    Route::post('/like/add/{id}', [LikeController::class, 'create']);
    Route::post('/like/delete/{id}', [LikeController::class, 'delete']);
    Route::get('/mypage/{id}', [UserController::class, 'mypage'])->middleware(['verified']);
    Route::get('/review/list/{id}', [ReviewController::class, 'index']);
    Route::get('/review/{id}', [ReviewController::class, 'show'])->middleware(['verified']);
    Route::post('/review/add', [ReviewController::class, 'create'])->name('review.create');
    Route::get('/complete', function () {
        return view('/complete');
    });
    Route::get('/reservation/detail/{id}', [ReservationController::class, 'show']);
    Route::get('/reservation/qrcode', [ReservationController::class, 'qrcode'])->name('qrcode');
    Route::post('/reservation/settlement',[ReservationController::class, 'settlement'])->name('settlement');
    Route::post('/payment',[ReservationController::class, 'pay']);
});


Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/admin/management', function () {
        return view('admin/admin_management');
    });
    Route::post('/admin/representative/add', [UserController::class, 'store'])->name('admin.create');
    Route::get('/admin/representative/add/complete', function () {
        return view('admin/complete_representative_add');
    });
    Route::post('/admin/logout', [UserController::class, 'destroy'])->name('admin.logout');
});

Route::group(['middleware' => ['auth', 'can:representative']], function () {
    Route::get('/representative/management', [RepresentativeController::class, 'index']);
    Route::get('/shop/add', function () {
        return view('representative/shop_add');
    });
    Route::post('/shop/add', [RepresentativeController::class, 'create'])->name('shop.create');
    Route::get('/shop/course/{id}', [RepresentativeController::class, 'course']);
    Route::post('/shop/course/add', [RepresentativeController::class, 'courseCreate'])->name('course.create');
    Route::post('/representative/logout', [RepresentativeController::class, 'destroy'])->name('representative.logout');
    Route::post('/representative/edit', [RepresentativeController::class, 'update'])->name('shop.update');
    Route::get('/representative/reservation/confirmation/{id}', [RepresentativeController::class, 'reservationConfirmation']);
});


require __DIR__.'/auth.php';
