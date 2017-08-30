<?php
use Illuminate\Http\Request;

Route::prefix("v2")->namespace("v2")->group(function() {
    Route::middleware("public-api")->group(function() {
        Route::get("/facility/{all?}", "FacilityController@getIndex")->where("all", "all");
    });
});

/* Allow version 1 to also prefix v1 */
Route::prefix('v1')->namespace("v1")->group(function() {
    require("api-v1.php");
});

/* Assume no version prefix is v1 */
Route::namespace("v1")->group(function() {
    require("api-v1.php");
});

Route::post('/deploy', 'DeployController@getDeploy');
