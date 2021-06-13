<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Models\KhuyenMai;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\SachController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\ChartController;


Route::get('login', [AdminLoginController::class, 'getLoginForm'])->name('admins.getlogin');
Route::post('login', [AdminLoginController::class, 'login'])->name('admins.login');
Route::post('logout', [AdminLoginController::class, 'logout'])->name('admins.logout');

Route::get('/administrator', function () {
    return view('admins.auth.login');
})->name('admins.administrator')->middleware('admins.auth');

// Route::resource("admins/danhmuc", DanhMucController::class)->middleware('admins.auth');
// Route::resource("admins/donhang", DonHangController::class)->middleware('admins.auth');
// Route::resource("admins/khuyenmai", KhuyenMaiController::class)->middleware('admins.auth');
// Route::resource("admins/sach", SachController::class)->middleware('admins.auth');
// Route::resource("admins/charts", ChartController::class)->middleware('admins.auth');