<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/chart', [StatisticController::class, 'index'])->name('estatistic.index');
    //route product
    Route::get(
        '/product',
        [ProductController::class, 'index']
    )->name('product.index');

    Route::get(
        '/product/create',
        [ProductController::class, 'create']
    )->name('product.create');

    Route::post(
        '/product',
        [ProductController::class, 'store']
    )->name('product.store');

    Route::get(
        '/product/edit/{id}',
        [ProductController::class, 'edit']
    )->name('product.edit');

    Route::put(
        '/product/update/{id}',
        [ProductController::class, 'update']
    )->name('product.update');

    Route::get(
        '/product/destroy/{id}',
        [ProductController::class, 'destroy']
    )->name('product.destroy');


    Route::post(
        '/product/search',
        [ProductController::class, 'search']
    )->name('product.search');


    //order routes

    Route::get(
        '/order',
        [OrderController::class, 'index']
    )->name('order.index');

    Route::get(
        '/order/create',
        [OrderController::class, 'create']
    )->name('order.create');

    Route::post(
        '/order',
        [OrderController::class, 'store']
    )->name('order.store');

    Route::get(
        '/order/edit/{id}',
        [OrderController::class, 'edit']
    )->name('order.edit');

    Route::put(
        '/order/update/{id}',
        [OrderController::class, 'update']
    )->name('order.update');

    Route::get(
        '/order/destroy/{id}',
        [OrderController::class, 'destroy']
    )->name('order.destroy');


    Route::post(
        '/order/search',
        [OrderController::class, 'search']
    )->name('order.search');

    //rota company
    Route::resource('/company', CompanyController::class);

    Route::post(
        '/company/search',
        [CompanyController::class, 'search']
    )->name('company.search');

    //rota client
    Route::resource('/client', ClientController::class);

    Route::post(
        '/client/search',
        [ClientController::class, 'search']
    )->name('client.search');


    //route productOrder
    Route::get(
        '/productOrder',
        [ProductOrderController::class, 'index']
    )->name('productOrder.index');

    Route::get(
        '/productOrder/create',
        [ProductOrderController::class, 'create']
    )->name('productOrder.create');

    Route::post(
        '/productOrder',
        [ProductOrderController::class, 'store']
    )->name('productOrder.store');

    Route::get(
        '/productOrder/edit/{id}',
        [ProductOrderController::class, 'edit']
    )->name('productOrder.edit');

    Route::put(
        '/productOrder/update/{id}',
        [ProductOrderController::class, 'update']
    )->name('productOrder.update');

    Route::get(
        '/productOrder/destroy/{id}',
        [ProductOrderController::class, 'destroy']
    )->name('productOrder.destroy');


    Route::post(
        '/productOrder/search',
        [ProductOrderController::class, 'search']
    )->name('productOrder.search');


});

require __DIR__ . '/auth.php';
