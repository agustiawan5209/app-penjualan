<?php

use App\Http\Controllers\StatusBarangController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Laporan;
use App\Http\Livewire\Admin\PageBarang;
use App\Http\Livewire\Admin\PageDiskon;
use App\Http\Livewire\Admin\PagePenjualan;
use App\Http\Livewire\Admin\PagePromo;
use App\Http\Livewire\Admin\PageVOucher;
use App\Http\Livewire\Page\HalamanUtama;
use App\Http\Livewire\Page\ShoppingCart;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HalamanUtama::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'Index'])->name('dashboard');


    // Akses Admin
    Route::group(['middleware' => 'role:Admin', 'prefix' => 'Admin', 'as'=> 'Admin.'], function () {
        Route::get('Dashboard', Dashboard::class)->name('Dashboard-Admin');
        Route::get('Laporan', Laporan::class)->name('Laporan');
        Route::get('Page-Barang', PageBarang::class)->name('Page-Barang');
        Route::get('Page-Diskon', PageDiskon::class)->name('Page-Diskon');
        Route::get('Page-Penjualan', PagePenjualan::class)->name('Page-Penjualan');
        Route::get('Page-Promo', PagePromo::class)->name('Page-Promo');
        Route::get('Page-Voucher', PageVOucher::class)->name('Page-Voucher');
    });
    // Akses User
    Route::group(['middleware' => 'role:Customer', 'prefix' => 'Customer', 'as' => 'Customer.'], function () {
        Route::get('Dashboard', UserDashboard::class)->name('Dashboard-User');
    });


});
Route::get('stock/chart',[StatusBarangController::class, 'chart']);
Route::get('Keranjang', ShoppingCart::class)->name('Keranjang');
