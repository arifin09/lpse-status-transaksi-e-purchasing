<?php

Route::group(['prefix' => 'status-transaksi-e-purchasing', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\StatusTransaksiEpurchasing\Http\Controllers\StatusTransaksiEpurchasingController@index',
        'create'     => 'Bantenprov\StatusTransaksiEpurchasing\Http\Controllers\StatusTransaksiEpurchasingController@create',
        'store'     => 'Bantenprov\StatusTransaksiEpurchasing\Http\Controllers\StatusTransaksiEpurchasingController@store',
        'show'      => 'Bantenprov\StatusTransaksiEpurchasing\Http\Controllers\StatusTransaksiEpurchasingController@show',
        'update'    => 'Bantenprov\StatusTransaksiEpurchasing\Http\Controllers\StatusTransaksiEpurchasingController@update',
        'destroy'   => 'Bantenprov\StatusTransaksiEpurchasing\Http\Controllers\StatusTransaksiEpurchasingController@destroy',
    ];

    Route::get('/',$controllers->index)->name('status-transaksi-e-purchasing.index');
    Route::get('/create',$controllers->create)->name('status-transaksi-e-purchasing.create');
    Route::post('/store',$controllers->store)->name('status-transaksi-e-purchasing.store');
    Route::get('/{id}',$controllers->show)->name('status-transaksi-e-purchasing.show');
    Route::put('/{id}/update',$controllers->update)->name('status-transaksi-e-purchasing.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('status-transaksi-e-purchasing.destroy');

});

