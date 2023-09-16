<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Index as AuthIndex;
use App\Http\Livewire\Task\Base as TaskIndex;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Cart\Index as CartIndex;

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
    return view('index');
})->name('home')->middleware('auth');


Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('home');

})->name('logout')->middleware('auth');


Route::get('/login',AuthIndex::class)->name('login');
Route::get('/task',TaskIndex::class)->name('task');
Route::get('/product/create',ProductCreate::class)->name('product.create');
Route::get('/product',ProductIndex::class)->name('product.index');
Route::get('/cart',CartIndex::class)->name('cart.index');

Route::get('/chat',[ChatController::class,'index'])->name('chat.index')->middleware('auth');
Route::get('/chat/{room:slug}',[ChatController::class,'show'])->name('chat.show')->middleware('auth');

// Route::get('/test',function()
// {
//    dd(auth()->check());
// });

