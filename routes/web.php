<?php

use App\Http\Controllers\BetaSignupController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'betaSuccess' => session('beta_success'),
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('about');

Route::get('/use-cases', function () {
    return Inertia::render('UseCases', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('use-cases');

Route::get('/pricing', function () {
    return Inertia::render('Pricing', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('pricing');

Route::post('/beta-signup', [BetaSignupController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('beta-signup');

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
