<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
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

Route::middleware(['web'])->group(
    function () {
        Route::get('/', function () {
            return view('login');
        });
        // Rute untuk halaman depan
        Route::get('/login', function () {
            return view('login');
        })->name('login');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');


        // Route::get('/register', function () {
        //     return view('register');
        // })->name('register');

        Route::post('/ProsesLogin', [LoginController::class, 'authenticate'])->name('login.process');
        // Route::post('/ProsesLogin', [Testing::class, 'login'])->name('login.process');
        Route::post('/ProsesSimpan', [RegisterController::class, 'register'])->name('register.process');

        Route::middleware(['auth','ceklevel:1,2'])->group(function () {
            Route::get('/dashboard', [PostingController::class, 'index'])->name('dashboard.index');


            Route::get('/posting/', [PostingController::class, 'posting'])->name('posting.index');
            Route::get('/posting/add', [PostingController::class, 'add'])->name('posting.add');
            Route::post('/posting/create', [PostingController::class, 'create'])->name('posting.create');
            // Route::post('/posting/like/{postingId}/{userId}', [PostingController::class, 'like'])->name('posting.like');
            // Route::post('/posting/{id}/like', [PostingController::class, 'likePost'])->name('posting.like');
            Route::post('/posting/comment/{postingId}', [PostingController::class, 'comment'])->name('posting.comment');
            Route::post('/posting/{posting}/like', [PostingController::class, 'likePost'])->name('posting.like');

            Route::get('/posting/{id}/edit', [PostingController::class, 'edit'])->name('posting.edit');
            Route::put('/posting/{id}', [PostingController::class, 'update'])->name('posting.update');
            Route::delete('/posting/{posting}', [PostingController::class, 'destroy'])->name('posting.delete');
            // Rute untuk menampilkan daftar buku
            Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

            // Rute untuk menampilkan form pembuatan buku
            Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

            // Rute untuk menyimpan buku baru
            Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

            // // Rute untuk menampilkan detail buku
            // Route::get('/buku/{buku}', [BukuController::class, 'show'])->name('buku.show');

            // Rute untuk menampilkan form edit buku
            Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
            // Route::post('/buku/{id}/edit', [BukuController::class, 'update'])->name('buku.edit');

            // Rute untuk memperbarui buku
            Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');

            // Rute untuk menghapus buku
            Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

            // Rute untuk menampilkan daftar kategori
            Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

            // Rute untuk menampilkan form pembuatan kategori
            Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');

            // Rute untuk menyimpan kategori baru
            Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');

            Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');

            // Route untuk memperbarui kategori
            Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
            Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

            // Rute untuk menampilkan daftar kategori
            Route::get('/role', [RoleController::class, 'index'])->name('role.index');

            // Rute untuk menampilkan form pembuatan kategori
            Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');

            // Rute untuk menyimpan kategori baru
            Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');

            // Rute untuk menghapus kategori
            Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::put('/role/{role}', [RoleController::class, 'update'])->name('role.update');
            Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

            // // Rute untuk menampilkan form pembuatan kategori
            // Route::get('/setting/create', [SettingController::class, 'create'])->name('settingmenu.create');

            // Rute untuk menampilkan daftar kategori
            Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

            // Rute untuk menampilkan form pembuatan kategori
            Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
            Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
            Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
            // Rute untuk menyimpan kategori baru
            Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');

            // Rute untuk menghapus kategori
            Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

            // Rute untuk menampilkan daftar buku
            Route::get('/user', [UserController::class, 'index'])->name('user.index');

            // Rute untuk menampilkan form pembuatan buku
            Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

            // Rute untuk menyimpan buku baru
            Route::post('/user', [UserController::class, 'store'])->name('user.store');

            // Rute untuk menghapus kategori
            Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

            // Rute untuk menampilkan form edit buku
            // Route untuk menampilkan form edit
            Route::get('/user/{id_user}/edit', [UserController::class, 'edit'])->name('user.edit');

            // Route untuk menyimpan update
            Route::put('/user/{id_user}', [UserController::class, 'update'])->name('user.update');

            // Rute untuk menampilkan form edit kategori
            Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');

            // Rute untuk memperbarui kategori
            Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');

            // Rute untuk menghapus kategori
            Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

            Route::get('/komen', [KomenController::class, 'index'])->name('komentar.index');

            // Rute untuk menampilkan form pembuatan buku
            Route::get('/komen/create', [KomenController::class, 'create'])->name('komentar.create');

            // Rute untuk menyimpan buku baru
            Route::post('/komen', [KomenController::class, 'store'])->name('komentar.store');

            // Rute untuk menghapus kategori
            Route::delete('/komen/{komen}', [KomenController::class, 'destroy'])->name('komentar.destroy');

            // Rute untuk menampilkan form edit buku
            // Route untuk menampilkan form edit
            Route::get('/komen/{komen}/edit', [KomenController::class, 'edit'])->name('komentar.edit');

            // Route untuk menyimpan update
            Route::put('/komen/{komen}', [KomenController::class, 'update'])->name('komentar.update');

            Route::get('/like', [LikeController::class, 'index'])->name('like.index');

            // Rute untuk menampilkan form pembuatan buku
            Route::get('/like/create', [LikeController::class, 'create'])->name('like.create');

            // Rute untuk menyimpan buku baru
            Route::post('/like', [LikeController::class, 'store'])->name('like.store');

            // Rute untuk menghapus kategori
            Route::delete('/like/{like}', [LikeController::class, 'destroy'])->name('like.destroy');

            // Rute untuk menampilkan form edit buku
            // Route untuk menampilkan form edit
            Route::get('/like/{like}/edit', [LikeController::class, 'edit'])->name('like.edit');

            // Route untuk menyimpan update
            Route::put('/like/{like}', [LikeController::class, 'update'])->name('like.update');

        });


        Route::get('/menu/{slug}', [MenuController::class, 'show'])->name('menu.show');
    }
);

// Route untuk halaman unauthorized
Route::get('/unauthorized', function () {
    return view('unauthorized'); // Buat view unauthorized.blade.php
})->name('unauthorized');
