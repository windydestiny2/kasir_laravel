<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

// Ensure AdminUserController exists and is correctly imported


Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index' 
    ];
    return view('admin.layouts.wrapper', $data);
});


Route::prefix('/admin')->group(function () {
    Route::resource('/user', AdminUserController::class);
});




