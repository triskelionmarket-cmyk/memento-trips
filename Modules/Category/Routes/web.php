<?php

use Modules\Category\App\Http\Controllers\CategoryController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    Route::resource('category', CategoryController::class);

});