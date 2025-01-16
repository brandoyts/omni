<?php

use App\Http\Controllers\Api\CaseController;
use App\Http\Controllers\Api\SwitchboardCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1")->middleware("auth:sanctum")->group(function () {
    Route::prefix("cases")->group(function() {
         Route::get("/", [CaseController::class, "getCases"]);
         Route::get("/{id}", [CaseController::class, "getCase"]);
         Route::post("/createSelfCase", [CaseController::class, "createSelfCase"]);
         Route::post("/updateCase/{id}", [CaseController::class, "updateCase"]);
    });

    Route::prefix("switchboardCategories")->group(function() {
         Route::get("/", [SwitchboardCategoryController::class, "all"]);
         Route::get("/create", [SwitchboardCategoryController::class, "create"]);

    });
});
