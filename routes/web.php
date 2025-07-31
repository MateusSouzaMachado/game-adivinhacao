<?php

use App\Http\Controllers\ClassicController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get("/", [IndexController::class, "index"]);

Route::get("/classic/play/{dificuldade}",
[ClassicController::class, "index"]);


route::get("/classic/image", [ClassicController::class, "image"])->name("classic.image");