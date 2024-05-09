<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profiles/{user:id}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');
Route::get('/profiles/{user:id}/generate-pdf', [App\Http\Controllers\ProfilesController::class, 'generatePdf']);

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/search/vacancies', [App\Http\Controllers\SearchController::class, 'search']);

Route::get('/vacancies', [App\Http\Controllers\VacanciesController::class, 'index']);
Route::get('/vacancies/search', [App\Http\Controllers\VacanciesController::class, 'search']);
Route::get('/vacancies/{vacancy:id}/view', [App\Http\Controllers\VacanciesController::class, 'show']);


Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/candidates', [App\Http\Controllers\CandidatesController::class, 'index']);
    Route::get('/candidates/search', [App\Http\Controllers\CandidatesController::class, 'search']);
    Route::get('/candidates/{user:id}/view', [App\Http\Controllers\CandidatesController::class, 'show']);

    Route::post('/vacancies/create', [App\Http\Controllers\VacanciesController::class, 'store']);
    Route::get('/vacancies/create', [App\Http\Controllers\VacanciesController::class, 'create']);
    Route::get('/vacancies/{vacancy:id}/edit', [App\Http\Controllers\VacanciesController::class, 'edit']);
    Route::patch('/vacancies/{vacancy:id}/edit', [App\Http\Controllers\VacanciesController::class, 'update']);
    Route::delete('/vacancies/{vacancy:id}', [App\Http\Controllers\VacanciesController::class, 'destroy']);

    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index']);
    Route::patch('/users/{user:id}', [App\Http\Controllers\UsersController::class, 'toggleAdmin']);
    Route::delete('/users/{user:id}', [App\Http\Controllers\UsersController::class, 'destroy']);
    Route::get('/users/search', [App\Http\Controllers\UsersController::class, 'search']);
});

Route::get('/profiles/{user:id}/personal-information', [App\Http\Controllers\PersonalInformationsController::class, 'create']);
Route::post('/profiles/{user:id}/personal-information', [App\Http\Controllers\PersonalInformationsController::class, 'store']);
Route::get('/profiles/{personal_information:user_id}/personal-information/edit', [App\Http\Controllers\PersonalInformationsController::class, 'edit']);
Route::patch('/profiles/{personal_information:user_id}/personal-information/edit', [App\Http\Controllers\PersonalInformationsController::class, 'update']);

Route::get('/profiles/{user:id}/work-experience', [App\Http\Controllers\WorkExperiencesController::class, 'create']);
Route::post('/profiles/{user:id}/work-experience', [App\Http\Controllers\WorkExperiencesController::class, 'store']);
Route::get('/profiles/work-experience/{work_experience:id}/edit', [App\Http\Controllers\WorkExperiencesController::class, 'edit']);
Route::patch('/profiles/work-experience/{work_experience:id}/edit', [App\Http\Controllers\WorkExperiencesController::class, 'update']);
Route::delete('/profiles/work-experience/{work_experience:id}', [App\Http\Controllers\WorkExperiencesController::class, 'destroy']);

Route::get('/profiles/{user:id}/education', [App\Http\Controllers\EducationsController::class, 'create']);
Route::post('/profiles/{user:id}/education', [App\Http\Controllers\EducationsController::class, 'store']);
Route::get('/profiles/education/{education:id}/edit', [App\Http\Controllers\EducationsController::class, 'edit']);
Route::patch('/profiles/education/{education:id}/edit', [App\Http\Controllers\EducationsController::class, 'update']);
Route::delete('/profiles/education/{education:id}', [App\Http\Controllers\EducationsController::class, 'destroy']);

Route::get('/profiles/{user:id}/certification', [App\Http\Controllers\CertificationsController::class, 'create']);
Route::post('/profiles/{user:id}/certification', [App\Http\Controllers\CertificationsController::class, 'store']);
Route::get('/profiles/certification/{certification:id}/edit', [App\Http\Controllers\CertificationsController::class, 'edit']);
Route::patch('/profiles/certification/{certification:id}/edit', [App\Http\Controllers\CertificationsController::class, 'update']);
Route::delete('/profiles/certification/{certification:id}', [App\Http\Controllers\CertificationsController::class, 'destroy']);

Route::get('/profiles/{user:id}/skill', [App\Http\Controllers\SkillsController::class, 'create']);
Route::post('/profiles/{user:id}/skill', [App\Http\Controllers\SkillsController::class, 'store']);
Route::get('/profiles/skill/{skill:id}/edit', [App\Http\Controllers\SkillsController::class, 'edit']);
Route::patch('/profiles/skill/{skill:id}/edit', [App\Http\Controllers\SkillsController::class, 'update']);
Route::delete('/profiles/skill/{skill:id}', [App\Http\Controllers\SkillsController::class, 'destroy']);
