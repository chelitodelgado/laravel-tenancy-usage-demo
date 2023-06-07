<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landlord.index');
})->name('landing');