<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Ceklevel;
use App\Http\Controllers\Testing;

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
// Routes untuk Admin


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// // Route untuk menampilkan halaman login (GET)
// // Route::get('/login', [LoginController::class, 'index'])->name('login');
// // Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
// // Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// // Route::post('/register', [RegisterController::class, 'register'])->name('register.store');


// Route::get('/logout', [Testing::class, 'logout']);



// Route::group(['middleware' => ['auth', 'cekrole:admin']], function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::post('/posting/create', [PostingController::class, 'create'])->name('posting.create');
//     Route::post('/posting/like/{postingId}/{userId}', [PostingController::class, 'like'])->name('posting.like');
//     Route::post('/posting/comment/{postingId}', [PostingController::class, 'comment'])->name('posting.comment');


//     Route::get('/user', [Testing::class, 'index'])->name('user.index');
//     Route::get('/user/create', [Testing::class, 'create'])->name('user.create');
//     Route::post('/user', [Testing::class, 'store'])->name('user.store');
//     Route::delete('/user/{user}', [Testing::class, 'destroy'])->name('user.destroy');
//     Route::get('/user/{user}/edit', [BukuController::class, 'edit'])->name('user.edit');
//     Route::post('/user/{id}/edit', [BukuController::class, 'update'])->name('user.edit');

//     Route::get('/role', [RoleController::class, 'index'])->name('role.index');
//     Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
//     Route::post('/role', [RoleController::class, 'store'])->name('role.store');
//     Route::delete('/role/{role}', [KategoriController::class, 'destroy'])->name('role.destroy');

//     Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
//     Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
//     Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
//     Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
// });

// // Routes untuk User Biasa
// Route::group(['middleware' => ['auth', 'cekrole:user']], function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::post('/posting/create', [PostingController::class, 'create'])->name('posting.create');
//     Route::post('/posting/like/{postingId}/{userId}', [PostingController::class, 'like'])->name('posting.like');
//     Route::post('/posting/comment/{postingId}', [PostingController::class, 'comment'])->name('posting.comment');

//     Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
//     Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
//     Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
//     Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
//     Route::post('/buku/{id}/edit', [BukuController::class, 'update'])->name('buku.edit');
//     Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
//     Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

//     Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
//     Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
//     Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
//     Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
//     Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
//     Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
// });
Route::middleware(['web'])->group(
    function () {
        Route::get('/', function () {
            return view('register');
        });
        // Rute untuk halaman depan
        Route::get('/login', function () {
            return view('login');
        })->name('login');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


        Route::get('/register', function () {
            return view('register');
        })->name('register');

        Route::post('/ProsesLogin', [LoginController::class, 'authenticate'])->name('login.process');
        // Route::post('/ProsesLogin', [Testing::class, 'login'])->name('login.process');
        Route::post('/ProsesSimpan', [Testing::class, 'register'])->name('register');

        Route::middleware(['ceklevel:1'])->group(function () {
            Route::get('/dashboard', [PostingController::class, 'index'])->name('dashboard.index');
            Route::post('/posting/create', [PostingController::class, 'create'])->name('posting.create');
            Route::post('/posting/like/{postingId}/{userId}', [PostingController::class, 'like'])->name('posting.like');
            Route::post('/posting/comment/{postingId}', [PostingController::class, 'comment'])->name('posting.comment');

            // Rute untuk menampilkan daftar buku
            Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

            // Rute untuk menampilkan form pembuatan buku
            Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

            // Rute untuk menyimpan buku baru
            Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

            // // Rute untuk menampilkan detail buku
            // Route::get('/buku/{buku}', [BukuController::class, 'show'])->name('buku.show');

            // Rute untuk menampilkan form edit buku
            Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
            Route::post('/buku/{id}/edit', [BukuController::class, 'update'])->name('buku.edit');

            // Rute untuk memperbarui buku
            Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');

            // Rute untuk menghapus buku
            Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

            // Rute untuk menampilkan daftar kategori
            Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

            // Rute untuk menampilkan form pembuatan kategori
            Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');

            // Rute untuk menyimpan kategori baru
            Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');

            // Rute untuk menampilkan daftar kategori
            Route::get('/role', [RoleController::class, 'index'])->name('role.index');

            // Rute untuk menampilkan form pembuatan kategori
            Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');

            // Rute untuk menyimpan kategori baru
            Route::post('/role', [RoleController::class, 'store'])->name('role.store');

            // Rute untuk menghapus kategori
            Route::delete('/role/{role}', [KategoriController::class, 'destroy'])->name('role.destroy');

            // // Rute untuk menampilkan form pembuatan kategori
            // Route::get('/setting/create', [SettingController::class, 'create'])->name('settingmenu.create');

            // Rute untuk menampilkan daftar kategori
            Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

            // Rute untuk menampilkan form pembuatan kategori
            Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');

            // Rute untuk menyimpan kategori baru
            Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');

            // Rute untuk menghapus kategori
            Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

            // Rute untuk menampilkan daftar buku
            Route::get('/user', [Testing::class, 'index'])->name('user.index');

            // Rute untuk menampilkan form pembuatan buku
            Route::get('/user/create', [Testing::class, 'create'])->name('user.create');

            // Rute untuk menyimpan buku baru
            Route::post('/user', [Testing::class, 'store'])->name('user.store');

            // Rute untuk menghapus kategori
            Route::delete('/user/{user}', [Testing::class, 'destroy'])->name('user.destroy');

            // Rute untuk menampilkan form edit buku
            Route::get('/user/{user}/edit', [BukuController::class, 'edit'])->name('user.edit');
            Route::post('/user/{id}/edit', [BukuController::class, 'update'])->name('user.edit');


            // // Rute untuk menampilkan detail kategori
            // Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');

            // Rute untuk menampilkan form edit kategori
            Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');

            // Rute untuk memperbarui kategori
            Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');

            // Rute untuk menghapus kategori
            Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        });
    }
);



// Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function () {
//     Route::get('/buku', function () {
//         return view('layouts.app');
//     });

//     Route::get('/buku/create', [App\Http\Controllers\BukuController::class, 'create'])->name('buku.create');
//     Route::post('/buku', [App\Http\Controllers\BukuController::class, 'store'])->name('buku.store');
// });



// Route untuk halaman unauthorized
Route::get('/unauthorized', function () {
    return view('unauthorized'); // Buat view unauthorized.blade.php
});
