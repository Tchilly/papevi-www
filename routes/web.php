<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('about');

Route::get('/docs', function () {
    return Inertia::render('Docs/GettingStarted');
})->name('docs');

Route::redirect('/docs/getting-started', '/docs')->name('docs.getting-started');

Route::get('/docs/api/json-api', function () {
    return Inertia::render('Docs/Api/JsonApi');
})->name('docs.api.json-api');

Route::get('/docs/api/authentication', function () {
    return Inertia::render('Docs/Api/Authentication');
})->name('docs.api.authentication');

Route::get('/docs/api/pages', function () {
    return Inertia::render('Docs/Api/Pages');
})->name('docs.api.pages');

Route::get('/docs/api/menus', function () {
    return Inertia::render('Docs/Api/Menus');
})->name('docs.api.menus');

Route::get('/docs/api/taxonomies', function () {
    return Inertia::render('Docs/Api/Taxonomies');
})->name('docs.api.taxonomies');

Route::get('/docs/api/media', function () {
    return Inertia::render('Docs/Api/Media');
})->name('docs.api.media');

Route::get('/docs/api/site', function () {
    return Inertia::render('Docs/Api/Site');
})->name('docs.api.site');

Route::get('/docs/features/workflow', function () {
    return Inertia::render('Docs/Features/Workflow');
})->name('docs.features.workflow');

Route::get('/docs/features/versioning', function () {
    return Inertia::render('Docs/Features/Versioning');
})->name('docs.features.versioning');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
