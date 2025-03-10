<?php

use App\Http\Controllers\AcceptAnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;

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
    return view('welcome');
});

Route::resource('questions', QuestionsController::class)
    ->except('show');
Route::get('/questions/{slug}', [QuestionsController::class, 'show'])
    ->name('questions.show');

// Route::post('/questions/{question}/answers', [AnswersController::class, 'store'])
//     ->name('answers.store');
Route::resource('questions.answers', AnswersController::class)->except(['index', 'create', 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
