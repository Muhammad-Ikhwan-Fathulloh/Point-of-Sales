<?php

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

// Route::get('test',function(){
// 	dd(bcrypt('123'));
// });

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/keluar',function(){
	\Auth::logout();

	return redirect('/login');
});

Route::group(['middleware'=>'auth'],function(){

	Route::get('/supplier','Supplier_controller@index');

	Route::get('/supplier/add','Supplier_controller@add');
	Route::post('/supplier/add','Supplier_controller@store');

	Route::get('/supplier/{id}','Supplier_controller@edit');
	Route::put('/supplier/{id}','Supplier_controller@update');

	Route::delete('/supplier/{id}','Supplier_controller@delete');

	// manage produk
	Route::get('/produk','Produk_controller@index');
	Route::get('/produk/user','Produk_controller@indexuser');
	Route::get('/produk/yajra','Produk_controller@yajra');

	Route::get('/produk/detail/{id}','Produk_controller@detail');
	Route::get('/produk/barcode/cetak/{id}','Produk_controller@cetak_barcode');

	Route::post('produk/import','Produk_controller@import');

	Route::get('/produk/add','Produk_controller@add');
	Route::post('/produk/add','Produk_controller@store');

	Route::get('/produk/{id}','Produk_controller@edit');
	Route::put('/produk/{id}','Produk_controller@update');

	Route::delete('/produk/{id}','Produk_controller@delete');

	// Manage PO
	Route::get('/po','Po_controller@index');
	Route::get('/po/yajra','Po_controller@yajra');

	Route::get('/po/add','Po_controller@add');
	Route::get('/po/produk/{supplier}','Po_controller@get_produk');

	Route::post('/po/add','Po_controller@store');

	Route::get('po/approved/{id}','Po_controller@approved');

	Route::get('/po/return','Po_return_controller@index');
	Route::get('/po/return/yajra','Po_return_controller@yajra');
	Route::get('po/return/add','Po_return_controller@add');

	Route::get('po/return/approved/{id}','Po_return_controller@approved');

	Route::get('po/{id}','Po_controller@detail');
	Route::put('po/{id}','Po_controller@update');

	Route::get('po/pdf/{id}','Po_controller@pdf');

	Route::delete('po/line/{id}','Po_controller@hapus_line');

	// manage po return

	Route::post('po/return/add/{id}','Po_return_controller@store');

	Route::get('po/return/get-po','Po_return_controller@get_po_ajax');
	Route::get('po/return/add/{id_po}','Po_return_controller@add_detail');

	

	Route::get('/po/return/{id}','Po_return_controller@detail');
	Route::put('/po/return/{id}','Po_return_controller@detail_update');

	// manage GR
	Route::get('gr','Gr_controller@index');
	Route::get('gr/yajra','Gr_controller@yajra');

	Route::get('gr/{id}','Gr_controller@detail');
	Route::post('gr/{id}','Gr_controller@approved');

	// pos
	Route::get('pos','Pos_controller@index');
	Route::get('pos/get-produk/ajax','Pos_controller@get_produk_ajax');
	Route::get('pos/cek-total','Pos_controller@cek_total');

	Route::get('pos/get-customer','Pos_controller@get_customer');
	Route::get('pos/struck/terakhir','Pos_controller@cetak_struck_terakhir');
	Route::get('pos/struck/{id}','Pos_controller@cetak_struck');

	Route::post('pos','Pos_controller@store');
	Route::post('pos/deposit','Pos_controller@store_deposit');
	Route::get('produk/ajax/{kode}','Pos_controller@get_produk');

	// laporan pendapatan harian
	Route::get('laporan-harian','Laporan_harian_controller@index');
	Route::get('laporan-harian/yajra','Laporan_harian_controller@yajra');

	// sales
	Route::get('sales','Sales_controller@index');
	Route::get('sales/yajra','Sales_controller@yajra');

	Route::get('sales/filter','Sales_controller@filter');
	Route::get('sales/filter/yajra/{awal}/{akhir}','Sales_controller@yajra_filter');

	Route::get('sales/{id}','Sales_controller@detail');
	Route::post('sales/pelunasan/{id}','Sales_controller@pelunasan');
	

	// update perusahaan
	Route::get('update-perusahaan','Perusahaan_controller@index');
	Route::post('update-perusahaan','Perusahaan_controller@update');

	// master kategori
	Route::get('kategori','Kategori_controller@index');

	Route::get('kategori/add','Kategori_controller@add');
	Route::post('kategori/add','Kategori_controller@store');

	Route::get('kategori/{id}','Kategori_controller@edit');
	Route::put('kategori/{id}','Kategori_controller@update');

	Route::delete('kategori/{id}','Kategori_controller@delete');

	// master customer
	Route::get('customer','Customer_controller@index');
	Route::get('customer/yajra','Customer_controller@yajra');

	Route::get('customer/add','Customer_controller@add');
	Route::post('customer/add','Customer_controller@store');

	Route::get('customer/{id}','Customer_controller@edit');
	Route::put('customer/{id}','Customer_controller@update');

	Route::delete('customer/{id}','Customer_controller@delete');

	// pengeluaran
	Route::get('pengeluaran','Pengeluaran_controller@index');
	Route::get('pengeluaran/yajra','Pengeluaran_controller@yajra');

	Route::get('pengeluaran/add','Pengeluaran_controller@add');
	Route::post('pengeluaran/add','Pengeluaran_controller@store');

	// update profile
	Route::get('update-profile','Profile_controller@index');
	Route::put('update-profile','Profile_controller@update');
	//Route::get('/landing','HomeController@index')->name('home');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
