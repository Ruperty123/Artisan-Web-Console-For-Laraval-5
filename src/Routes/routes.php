<?php

    Route::group(['prefix' => config('artisan-web-console.routes_prefix')],function (){
        Route::get('interface','Tzepifan\ArtisanWebConsole\Http\Controllers\BaseController@index');
        Route::post('run','Tzepifan\ArtisanWebConsole\Http\Controllers\AjaxRunner@postRun');
    });
