<?php

use Illuminate\Support\Facades\Route;
use App\Models\KhuyenMai;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\SachController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\ChartController;


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

Route::get('/', function () {
    return view('admin.index');
});
Route::get('/tables', function () {
    return view('admin.tables');
});
Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/register', function () {
    return view('admin.register');
});
Route::get('/password', function () {
    return view('admin.password');
});
Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/401', function () {
    return view('admin.401');
});
Route::get('/404', function () {
    return view('admin.401');
});
Route::get('/500', function () {
    return view('admin.500');
});
Route::get('/layout-static', function () {
    return view('admin.layout-static');
});
Route::get('/layout-sidenav-light', function () {
    return view('admin.layout-sidenav-light');
});
//Route::get("khuyenmai/{khuyenmai}/{sach}/add", 'App\Http\Controllers\KhuyenMaiController@add')->name('khuyenmai.add');
Route::get("khuyenmai/add",'App\Http\Controllers\KhuyenMaiController@add')->name('khuyenmai.add');
Route::post("khuyenmai/add/{khuyenmai}/{sach}",'App\Http\Controllers\KhuyenMaiController@add');
Route::resource("admin/khuyenmai", KhuyenMaiController::class);
Route::resource("admin/danhmuc", DanhMucController::class);
Route::resource("admin/donhang", DonHangController::class);
Route::resource("admin/sach", SachController::class);
Route::resource("admin/charts", ChartController::class);

