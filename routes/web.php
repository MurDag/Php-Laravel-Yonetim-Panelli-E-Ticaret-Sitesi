<?php

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

Route::get('/nedmin', function () {
    return view('backend.default.index');
});

Route::get('/nedmin/kullanici-ekle', function () {
    return view('backend.kullanici.create');
});
Route::get('/nedmin/kullanici-edit', function () {
    return view('backend.kullanici.edit');
});


Route::get('/nedmin/urun/img-add/{id}', function () {
    return view('backend.urun.images_add');
})->name('urun.img.add');

Route::namespace('App\Http\Controllers\Backend\SiteAyarlari')->group(function () {
    Route::prefix('nedmin')->group(function () {
        Route::resource('genelAyarlar', 'GenelAyarController');
        Route::resource('iletisimAyar', 'İletisimAyarController');
        Route::resource('apiAyar', 'ApiAyarController');
        Route::resource('sosyalAyarlar', 'SosyalAyarController');
        Route::resource('mailAyar', 'MailAyarController');
    });
});

Route::namespace('App\Http\Controllers\Backend')->group(function () {
    Route::prefix('nedmin')->group(function () {
        Route::resource('hakkimizda', 'HakkimizdaController');
        Route::resource('kullanici', 'KullaniciController');
        Route::resource('menuler', 'MenuController');
        Route::resource('kategori', 'KategoriController');
        Route::resource('slider', 'SliderController');
        Route::resource('yorum', 'YorumController');
        Route::resource('banka', 'BankaController');
        Route::resource('siparis', 'SiparisController');
    });
});

Route::namespace('App\Http\Controllers\Backend')->group(function () {
    Route::prefix('nedmin')->group(function () {
        Route::get('/urun', 'UrunController@index')->name('urun.index');
        Route::get('/urun/onecikar/{id}/{durum}', 'UrunController@onecikar');
        Route::get('/urun/durum/{id}/{durum}', 'UrunController@durumguncelle');
        Route::get('/urun/sil/{id}', 'UrunController@destroy');
        Route::get('/urun/create', 'UrunController@create')->name('urun.create');
        Route::get('/urun/edit/{id}', 'UrunController@edit')->name('urun.edit');
        Route::get('/urun/img-edit/{id}', 'UrunController@create_img')->name('urun.img.create');
        Route::post('/urun/ekle', 'UrunController@store')->name('urun.store');
        Route::post('/urun/img-add', 'UrunController@add_img')->name('urunfoto.add_img');
        Route::post('/urun/img-delete', 'UrunController@delete_img')->name('urunfoto.delete_img');
        Route::post('/urun/update/{id}', 'UrunController@update')->name('urun.update');
    });
});

//Route::get('/nedmin', function () {
//    return view('backend.kullanici.index');
//});

Route::get('nedmin/kullanici/destroy/{id}', 'App\Http\Controllers\Backend\KullaniciController@destroy');
Route::get('nedmin/menuler/durum/change/{id}/{durum}', 'App\Http\Controllers\Backend\MenuController@change_durum');
Route::get('nedmin/menuler/delete/{id}', 'App\Http\Controllers\Backend\MenuController@delete_menu');
Route::get('nedmin/kategori/delete/{id}', 'App\Http\Controllers\Backend\KategoriController@delete_kategori');
Route::get('nedmin/kategori/durum/change/{id}/{durum}', 'App\Http\Controllers\Backend\KategoriController@change_durum');
Route::get('nedmin/slider/durum/change/{id}/{durum}', 'App\Http\Controllers\Backend\SliderController@change_durum');
Route::get('nedmin/slider/delete/{id}', 'App\Http\Controllers\Backend\SliderController@delete_slider');
Route::post('nedmin/slider/sortable', 'App\Http\Controllers\Backend\SliderController@sortable')->name('slider.sortable');
Route::get('nedmin/yorum/durum/{id}/{durum}', 'App\Http\Controllers\Backend\YorumController@durumguncelle');
Route::get('nedmin/yorum/sil/{id}', 'App\Http\Controllers\Backend\YorumController@destroy');
Route::get('nedmin/slider/durum/change/{id}/{durum}', 'App\Http\Controllers\Backend\SliderController@change_durum');
Route::get('nedmin/banka/durum/change/{id}/{durum}', 'App\Http\Controllers\Backend\BankaController@change_durum');
Route::get('nedmin/banka/delete/{id}', 'App\Http\Controllers\Backend\BankaController@destroy');
Route::get('nedmin/index', 'App\Http\Controllers\Backend\DefaultController@index')->name('default.index');




//Route::get('create', 'App\Http\Controllers\Backend\KullaniciController@create')->name('kullanici.create');
