<?php

use App\Http\Controllers\ProductCategoryController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::apiResource("product-category", ProductCategoryController::class);

    // THERE IS A SINGLE METHOD ROUTE AS AN EXAMPLE BELOW
    // Route::get("example", ProductCategoryController::class);
    //Route::post("example", ProductCategoryController::class);
    // Route::put("example", ProductCategoryController::class);
    // Route::delete("example", ProductCategoryController::class);
});