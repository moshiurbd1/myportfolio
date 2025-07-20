<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PortfolioPagesController;
use App\Http\Controllers\AboutPagesController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[PageController::class,'index'])->name('home');

Route::prefix('admin')->group(function(){
Route::get('/dashboard',[PageController::class,'dashboard'])->name('admin.dashboard');
Route::get('/main',[MainPagesController::class,'index'])->name('admin.main');
Route::put('/main',[MainPagesController::class,'update'])->name('admin.main.update');

Route::get('/service/create',[ServicePagesController::class,'create'])->name('admin.service.create');
Route::post('/service/create',[ServicePagesController::class,'store'])->name('admin.service.store');
Route::get('/service/show',[ServicePagesController::class,'show'])->name('admin.service.show');
Route::get('/service/edit/{id}',[ServicePagesController::class,'edit'])->name('admin.service.edit');
Route::post('/service/update/{id}',[ServicePagesController::class,'update'])->name('admin.service.update');
Route::delete('/service/update/{id}',[ServicePagesController::class,'destroy'])->name('admin.service.destroy');

Route::get('/portfolio/show',[PortfolioPagesController::class,'index'])->name('admin.portfolio.show');
Route::get('/portfolio/create',[PortfolioPagesController::class,'create'])->name('admin.portfolio.create');
Route::post('/portfolio/create',[PortfolioPagesController::class,'store'])->name('admin.portfolio.update');
Route::get('/portfolio/edit/{id}',[PortfolioPagesController::class,'edit'])->name('admin.portfolio.edit');
Route::put('/portfolio/update/{id}',[PortfolioPagesController::class,'update'])->name('admin.portfolio.update');
Route::delete('/portfolio/show/{id}',[PortfolioPagesController::class,'destroy'])->name('admin.portfolio.destroy');

Route::get('/about/create',[AboutPagesController::class,'create'])->name('admin.about.create');
Route::post('/about/create',[AboutPagesController::class,'store'])->name('admin.about.store');
Route::get('/about/show',[AboutPagesController::class,'index'])->name('admin.about.show');
Route::get('/about/edit/{id}',[AboutPagesController::class,'edit'])->name('admin.about.edit');
Route::put('/about/update/{id}',[AboutPagesController::class,'update'])->name('admin.about.update');
Route::delete('/about/show/{id}',[AboutPagesController::class,'destroy'])->name('admin.about.destroy');

});



