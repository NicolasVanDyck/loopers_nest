<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\Playground;
use App\Http\Livewire\Admin\Genres;
use App\Http\Livewire\Admin\Movies;
use App\Http\Livewire\Store;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Home::class, 'index'])->name('home');
Route::get('store', Store::class)->name('store');
Route::get('playground', [Playground::class, 'index'])->name('playground');

Route::middleware(['auth', 'active', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/movies');
    Route::get('genres', Genres::class)->name('genres');
    Route::get('movies', Movies::class)->name('movies');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'active'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
