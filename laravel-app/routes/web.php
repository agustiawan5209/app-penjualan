<?php

use Illuminate\Http\Request;
use App\Http\Livewire\Pesanan;
use App\Http\Livewire\Admin\Laporan;
use App\Http\Livewire\Page\PageShop;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\PageJenis;
use App\Http\Livewire\Admin\PagePromo;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\Admin\PageBarang;
use App\Http\Livewire\Admin\PageDiskon;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\PageVOucher;
use App\Http\Livewire\Page\HalamanUtama;
use App\Http\Livewire\Page\ShoppingCart;
use App\Http\Livewire\PageSearchkatalog;
use App\Http\Livewire\Admin\PagePenjualan;
use App\Http\Livewire\Item\DetailItemPage;
use App\Http\Livewire\Item\PagePengiriman;
use App\Http\Livewire\Page\PageDetailShop;
use App\Http\Livewire\Page\PagePembayaran;
use App\Http\Livewire\Setting\MetodeBayar;
use App\Http\Livewire\Setting\SlideSetting;
use App\Http\Livewire\Admin\PageBarangMasuk;
use App\Http\Controllers\TransaksiController;
use App\Http\Livewire\Admin\PageBarangKeluar;
use App\Http\Livewire\User\PageKirimanBarang;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\StatusBarangController;
use App\Http\Controllers\UsesUserPromoController;
use App\View\Components\User\PagePesananCustomer;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use App\Http\Livewire\Admin\DetailItemPage as AdminDetailItemPage;
use App\Http\Livewire\Admin\Laporan\BarangKeluar;
use App\Http\Livewire\Admin\Laporan\BarangMasuk;

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
Route::post('Kode/Promo', [UsesUserPromoController::class, 'CekPromoUser'])->name('masukan-kode-promo');

    Route::get('/dashboard', [UserController::class, 'Index'])->name('dashboard');
    Route::get('Detail-Item/{idItem}', DetailItemPage::class)->name('detail-item-transaksi');
    Route::get('Pengiriman-Barang', PagePengiriman::class)->name('Page-Pengiriman');

    // Akses Admin
    Route::group(['middleware' => 'role:Admin', 'prefix' => 'Admin', 'as'=> 'Admin.'], function () {
        Route::get('Dashboard', Dashboard::class)->name('Dashboard-Admin');

        //
        Route::get('Page-Barang', PageBarang::class)->name('Page-Barang');
        Route::get('Page-Diskon', PageDiskon::class)->name('Page-Diskon');
        Route::get('Page-Penjualan', PagePenjualan::class)->name('Page-Penjualan');
        Route::get('Page-Promo', PagePromo::class)->name('Page-Promo');
        Route::get('Page-Voucher', PageVOucher::class)->name('Page-Voucher');
        Route::get('Page/Barang-Masuk', PageBarangMasuk::class)->name('Stok-Barang-Masuk');
        Route::get('Page/Barang-Keluar', PageBarangKeluar::class)->name('Stok-Barang-Keluar');

        // Laporan
        Route::get('Laporan/BarangMasuk', BarangMasuk::class)->name('Laporan-barang-masuk');
        Route::get('Laporan/Barangkeluar', BarangKeluar::class)->name('Laporan-barang-keluar');
        // Laporan Penjualan
        Route::get('Laporan', Laporan::class)->name('Laporan');

        //
        Route::get('Metode-bayar', MetodeBayar::class)->name('Metode-Bayar');
        Route::get('Slide-Setting', SlideSetting::class)->name('Slide-setting');
        Route::get('Page-Jenis', PageJenis::class)->name('Page-Jenis');
        Route::get('Detail/{idItem}', AdminDetailItemPage::class)->name('Shop-detail');


    });
    // Akses User
    Route::group(['middleware' => 'role:Customer', 'prefix' => 'Customer', 'as' => 'Customer.'], function () {
        Route::get('Dashboard', UserDashboard::class)->name('Dashboard-User');
        Route::post('receive', [PembayaranController::class, 'receive'])->name('Pembayaran-Selesai');
        // Route::get('Send', [PembayaranController::class, 'receive'])->name('Pembayaran-send');
        Route::get('invoice/Data-Pembayaran', [PDFController::class, 'invoice'])->name('Invoice');
        Route::get("Pembayaran", PagePembayaran::class)->name('Page-Pembayaran');

        // Dashboard Admin
        Route::get('Data-Pesanan', Pesanan::class)->name("Pesanan");
        Route::get('Data-Kiriman Barang', PageKirimanBarang::class)->name('Kiriman-Barang');
    });

    // Laporan
    Route::get('Laporan/', [PDFController::class, 'LaporanPenjualan'])->name("Laporan");
    Route::get('Laporan/BarangMasuk', [PDFController::class, 'LaporanBarangMasuk'])->name("Laporan-BarangMasuk");
    Route::get('Laporan/Barangkeluar', [PDFController::class, 'LaporanBarangkeluar'])->name("Laporan-Barangkeluar");

});
Route::get('stock/chart',[StatusBarangController::class, 'chart']);
Route::get('Keranjang', ShoppingCart::class)->name('Keranjang');
Route::get('shop' , function(Request $request){
    $jenis = $request->jenis;
    return view('shop', compact('jenis'));
})->name('shop');
Route::get('katalog/{id}/{nama_jenis}' , PageSearchkatalog::class)->name('katalog');
Route::get('Detail/{itemID}', PageDetailShop::class)->name('Shop-detail');



Route::get('about' , function(){
    return view('about');
})->name('about');
Route::get('contact' , function(){
    return view('contact');
})->name('contact');
Route::get('shop-single' , function(){
    return view('shop-single');
})->name('shop-single');
Route::get("Promo-Diskon", function(){
    return view('page.promo.index');
})->name('Promo-Diskon');


Route::get('/send-notification', [UserController::class, 'sendOfferNotification']);
