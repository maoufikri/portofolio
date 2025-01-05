<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\DashboardPortofoliosController;
use App\Http\Controllers\DashboardSocialMediaController;

// Homepage dengan semua data
Route::get('/', [HomeController::class, 'index'])->name('home');

// Portofolio, Blog, dan Social Media tetap
Route::resource('/profile', Profile::class)->only(['index']);
Route::resource('profiles', ProfileController::class);
Route::get('/portofolios', [PortofolioController::class, 'allPortofolios'])->name('portofolios.index');
Route::get('/blogs', [BlogController::class, 'allBlogs'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::resource('/socialmedias', SocialMediaController::class)->only(['index', 'store', 'update']);

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Dashboard (protected route)
Route::get('/dashboard', function() {
    return view('dashboard.index'); // View untuk dashboard
})->name('dashboard.index')->middleware('auth');


// profile
Route::resource('/dashboard/profile', DashboardProfileController::class)->middleware('auth');
Route::get('/dashboard/profile/{profile}/edit', [DashboardProfileController::class, 'edit'])
    ->name('dashboard.profile.edit')
    ->middleware('auth');
Route::put('/dashboard/profile/{profile}', [DashboardProfileController::class, 'update'])
    ->name('dashboard.profile.update')
    ->middleware('auth');
Route::get('/dashboard/profile', [DashboardProfileController::class, 'index'])
    ->name('dashboard.profile.index')
    ->middleware('auth');


// portofolio
Route::resource('/dashboard/portofolios', DashboardPortofoliosController::class)->middleware('auth');
// Menampilkan halaman untuk membuat portofolio baru
Route::get('/dashboard/portofolios/create', [DashboardPortofoliosController::class, 'create'])->name('dashboard.portofolios.create');
// Menyimpan portofolio baru
Route::post('/dashboard/portofolios', [DashboardPortofoliosController::class, 'store'])->name('dashboard.portofolios.store');
// Menampilkan halaman untuk mengedit portofolio
Route::get('/dashboard/portofolios/{portofolio}/edit', [DashboardPortofoliosController::class, 'edit'])->name('dashboard.portofolios.edit');
// Memperbarui portofolio
Route::put('/dashboard/portofolios/{portofolio}', [DashboardPortofoliosController::class, 'update'])->name('dashboard.portofolios.update');
// Menghapus portofolio
Route::delete('/dashboard/portofolios/{portofolio}', [DashboardPortofoliosController::class, 'destroy'])->name('dashboard.portofolios.destroy');
Route::get('/dashboard/portofolios', [DashboardPortofoliosController::class, 'index'])
    ->name('dashboard.portofolios.index')
    ->middleware('auth');


// blog
Route::resource('/dashboard/blogs', DashboardBlogController::class)->middleware('auth');
// Menampilkan halaman untuk membuat blog baru
Route::get('/dashboard/blogs/create', [DashboardBlogController::class, 'create'])->name('dashboard.blogs.create');
// Menyimpan blog baru
Route::post('/dashboard/blogs', [DashboardBlogController::class, 'store'])->name('dashboard.blogs.store');
// Menampilkan halaman untuk mengedit blog
Route::get('/dashboard/blogs/{blog}/edit', [DashboardBlogController::class, 'edit'])->name('dashboard.blogs.edit');
// show
Route::prefix('dashboard')->group(function () {
    Route::get('blogs/{blog}', [DashboardBlogController::class, 'show'])->name('dashboard.blogs.show');
});
// update
Route::put('/dashboard/blogs/{blog}', [DashboardBlogController::class, 'update'])->name('dashboard.blogs.update');
// Menghapus blog
Route::delete('/dashboard/blogs/{blog}', [DashboardBlogController::class, 'destroy'])->name('dashboard.blogs.destroy');
Route::get('/dashboard/blogs', [DashboardBlogController::class, 'index'])
    ->name('dashboard.blogs.index')
    ->middleware('auth');


// social media
Route::resource('dashboard/socialmedias', DashboardSocialMediaController::class)
    ->names('dashboard.socialmedias')
    ->parameters(['socialmedias' => 'socialMedia']);
// Menampilkan halaman untuk membuat social media baru
Route::get('/dashboard/socialmedias/create', [DashboardSocialMediaController::class, 'create'])->name('dashboard.socialmedias.create');
// Menyimpan social media baru
Route::post('/dashboard/socialmedias', [DashboardSocialMediaController::class, 'store'])->name('dashboard.socialmedias.store');
// Menampilkan halaman untuk mengedit social media
Route::get('/dashboard/socialmedias/{socialMedia}/edit', [DashboardSocialMediaController::class, 'edit'])->name('dashboard.socialmedias.edit');
// update
Route::put('/dashboard/socialmedias/{socialMedia}', [DashboardSocialMediaController::class, 'update'])->name('dashboard.socialmedias.update');
// Menghapus social media
Route::delete('/dashboard/socialmedias/{socialMedia}', [DashboardSocialMediaController::class, 'destroy'])->name('dashboard.socialmedias.destroy');
Route::get('/dashboard/socialmedias', [DashboardSocialMediaController::class, 'index'])
    ->name('dashboard.socialmedias.index')
    ->middleware('auth');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


