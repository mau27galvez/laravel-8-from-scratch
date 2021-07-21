<?php

use Exception;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentController;

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

Route::post('/newsletter', function (Request $request, Newsletter $newsletter) {
    $request->validate(['email' => 'required|email']);

    try {
        $newsletter->suscribe($request->get('email'));
    } catch (Exception $e) {
        throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }

    return back()->with(['success' => 'You have been subscribed to our newsletter.']);
})->name('newsletter.suscribe');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.create');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest')
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.create');

Route::post('/login', [SessionsController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

Route::post('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/', [PostController::class, 'index'])->name('posts');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::post('/posts/{post:slug}/comments', [PostCommentController::class, 'store'])
    ->middleware('auth')
    ->name('comment.create');
