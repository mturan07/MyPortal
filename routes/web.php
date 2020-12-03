<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware('isLogin')->group(function(){
    Route::get('/giris', 'AuthController@login')->name('login');
    Route::post('/giris', 'AuthController@loginPost')->name('login.post');
});

Route::middleware('isUser')->group(function(){
    Route::get('/', 'PortalController@index')->name('portal');
    
    Route::resource('loglar', 'UserlogController');
    Route::resource('kayitlar', 'KayitController');
    Route::resource('birimler', 'BirimController');
    Route::resource('urunler', 'UrunController');
    Route::resource('gruplar', 'GrupController');
    Route::resource('kullanicilar', 'UserController');

    Route::get('/kayit/delete/{id}', 'KayitController@delete')->name('kayitlar.delete');
    Route::get('/birim/delete/{id}', 'BirimController@delete')->name('birimler.delete');
    Route::get('/urun/delete/{id}', 'UrunController@delete')->name('urunler.delete');
    Route::get('/grup/delete/{id}', 'GrupController@delete')->name('gruplar.delete');
    Route::get('/kullanici/delete/{id}', 'UserController@delete')->name('kullanicilar.delete');

    Route::get('/cikis', 'AuthController@logout')->name('logout');
});