<?php

use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

 //Route::get('/questionnaires/create','QuestionnaireController@create');
 Route::get('/questionnaires/create', [\App\Http\Controllers\QuestionnaireController::class, 'create'])->name('questionnaires/create');

 Route::post('/questionnaires', [\App\Http\Controllers\QuestionnaireController::class, 'store'])->name('questionnaires/create');
 Route::get('/questionnaires/{questionnaire}', [\App\Http\Controllers\QuestionnaireController::class, 'show'])->name('show');
 Route::get('/questionnaires/{questionnaire}/questions/create', [\App\Http\Controllers\QuestionController::class, 'create'])->name('questions/create');
 Route::post('/questionnaires/{questionnaire}/questions', [\App\Http\Controllers\QuestionController::class, 'store'])->name('questions/create');
 Route::delete('/questionnaires/{questionnaire}/questions/{question}', [\App\Http\Controllers\QuestionController::class, 'destroy'])->name('destroy');

 Route::get('/surveys/{questionnaire}-{slug}', [\App\Http\Controllers\SurveyController::class, 'show'])->name('show');
 Route::post('/surveys/{questionnaire}-{slug}', [\App\Http\Controllers\SurveyController::class, 'store'])->name('store');
