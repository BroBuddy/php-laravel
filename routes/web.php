<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employer;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\TranslateJob;
use App\Models\Job;

Route::get('test', function () {
    $job = Job::first();

    TranslateJob::dispatch($job);

    return "Done";
});

Route::get('/', function () {
    $employers = Employer::with('jobs')
                    ->latest()
                    ->paginate(5);

    return view('home', [
        'employers' => $employers,
    ]);
})->name('home');

Route::prefix('jobs')->name('jobs.')
    ->controller(JobController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{job}', 'show')->name('show')->missing(function () {
        return Redirect::route('jobs.index');
    });
    Route::post('/', 'store')
        ->middleware('auth')
        ->name('store');
    Route::get('/{job}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'job')
        ->name('edit');
    Route::patch('/{job}', 'update')->name('update');
    Route::delete('/{job}', 'destroy')->name('destroy');
});

Route::get('/profile', function () {
    $user = Auth::user();

    return view('profile', [
        'user' => $user
    ]);
})->middleware('auth')->name('profile');

Route::view('/contact', 'contact')
    ->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['throttle:global']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->middleware(['throttle:global']);
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

// Route::singleton('thumbnail', JobController::class)->>destroyable();

// Route::resource('test', JobController::class)->names([
//     'show' => 'test.geil'
// ]);

// Route::resource('test', JobController::class, [
//     'only' => ['edit'],
//     'except' => ['edit']
// ]);
    
// php artisan route:list --except-vendor
