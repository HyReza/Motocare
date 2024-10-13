<?php

use App\Models\Motorcycles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorcyclesController;

Route::get('/', function () {
    return view('index');
});

Route::resource('motorcycle', MotorcyclesController::class);
