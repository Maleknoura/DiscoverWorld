<?php

use App\Http\Controllers\recitcontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {


    $destinations = DB::table('destination')->get();
    $img = DB::table('images')->get();
    $recit = DB::table('recits')->orderBy('created_at')->get();

    return view('welcome', [
        'destinations' => $destinations,
        'img' => $img,
        'recit' => $recit,
        'recits' => $recit,

    ]);
});

Route::get('/create', [recitcontroller::class, 'create'])->name('create');
Route::post('/create', [recitcontroller::class, 'store'])->name('store');
Route::post('/', [recitcontroller::class, 'stati'])->name('stati');
Route::post('/filter', [recitcontroller::class, 'filterPosts'])->name('filterPosts');
Route::get('/filter/{id}', [recitcontroller::class, 'filterbydest'])->name('filter.destination');

