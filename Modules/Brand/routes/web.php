<?php

use Modules\Brand\App\Http\Controllers\BrandController;


Route::group(['as' => 'admin.', 'prefix' => 'admin/', 'middleware' => ['HtmlSpecialchars', 'MaintenanceMode', 'auth:admin']], function () {

    Route::resource('brand', BrandController::class);

});