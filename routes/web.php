<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', ContactController::class);
Route::get('/test', function () {
    dd(\App\Enums\OrganizationStatus::values());
});
