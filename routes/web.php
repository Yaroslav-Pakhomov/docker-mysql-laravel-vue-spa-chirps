<?php

declare(strict_types=1);

use App\Http\Controllers\MessageBoardController;
use App\Http\Controllers\ProfileController;
use App\Models\MessageBoard;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', static function () {
    return inertia('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
})->name('index');

Route::get('/dashboard', static function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Роутинг для "Доски объявлений"
Route::resource('message-board', MessageBoardController::class)->only(['index', 'create', 'store', 'edit']);

Route::controller(MessageBoardController::class)->group(function () {
    Route::prefix('/message-board')->group(function () {
        Route::name('message-board.')->group(function () {

            // Страница объявления
            Route::get('/{messageBoard:slug}', 'show')->where('message-board:slug', '[a-z0-9_-]+')->name('show');
        });
    });
});


// Авторизация
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
