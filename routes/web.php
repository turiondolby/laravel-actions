<?php

use App\Actions\CreatePost;
use App\Actions\CreateOrder;
use App\Actions\DoSomething;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostStoreController;

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
    return view('welcome');
});

Route::post('posts', CreatePost::class)->name('posts.store');

Route::post('users/{user}/orders', CreateOrder::class)->name('orders.store');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('inside', function () {
    var_dump(DoSomething::run());
});

require __DIR__.'/auth.php';
