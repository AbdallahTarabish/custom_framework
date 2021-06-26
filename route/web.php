<?php

use \core\Router\Route;

Route::prefix("admin", function () {
    Route::middleware("admin|auth" , function (){
        Route::get("index", "index");
        Route::get("index", function () {
            return 1;
        });

    });
    Route::prefix("admin", function () {
        Route::get("index", "index");
        Route::get("index", function () {
            return 1;
        });

    });

});
