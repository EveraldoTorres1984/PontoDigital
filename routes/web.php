<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site;
use App\Http\Controllers\Admin;
use App\Http\Controllers\TimeTable;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [Site\HomeController::class, 'index']);

Route::prefix('painel')->group(function () {
    Route::get('/', [Admin\HomeController::class, 'index'])->name('admin');
    Route::get('login', [Admin\Auth\LoginController::class, 'index'])->name('login');
    Route::post('login', [Admin\Auth\LoginController::class, 'authenticate']);

    Route::get('register', [Admin\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('register', [Admin\Auth\RegisterController::class, 'register']);

    Route::post('logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::resource('users', Admin\UserController::class);
    Route::resource('timetables', TimeTable\TimeTableController::class);

    Route::post('timetables', [TimeTable\TimeTableController::class, 'store'])->name('timetables.store');

    Route::put('timetables', [TimeTable\TimeTableController::class, 'update'])->name('timetables.update');

    Route::get('profile', [Admin\ProfileController::class, 'index'])->name('profile');

    Route::put('profilesave', [Admin\ProfileController::class, 'save'])->name('profile.save');
});
