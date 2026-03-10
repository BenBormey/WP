<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\backend\PositionController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;



//  Dashboad
// Route::get('/home', function () {
//     return view('home');
// });


Route::controller(DashboardController::class)->group(function(){
    Route::get('/','index')->name('dashboard.index');
    Route::post('/','save')->name('dashboard.save');

});

Route::resource("/departments", DepartmentController::class);


Route::resource('positions', PositionController::class);
