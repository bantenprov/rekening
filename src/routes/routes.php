<?php

Route::group(['prefix' => '/', 'middleware' => ['web']], function() {
    Route::resource('rekening', 'Bantenprov\Rekening\Http\Controllers\RekeningController');
});
