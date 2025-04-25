<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminToppingController;
use App\Http\Controllers\AdminTransaksiController;

// Ensure AdminUserController exists and is correctly imported


Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'doLogin'])->middleware('guest');
Route::get('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');


Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index' 
    ];
    return view('admin.layouts.wrapper', $data);
});



Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin.dashboard.index' 
        ];
        return view('admin.layouts.wrapper', $data);

    });
    Route::resource('/transaksi', AdminTransaksiController::class);
    Route::resource('/produk', AdminProdukController::class);
    Route::resource('/topping', AdminToppingController::class);
    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/user', AdminUserController::class);

});




