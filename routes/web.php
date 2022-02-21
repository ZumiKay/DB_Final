<?php

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
Route::get('/home' , [\App\Http\Controllers\teacherController::class , 'getTeacher']);
Route::get('/teacherID' , [\App\Http\Controllers\teacherController::class , 'getTeacherID']);
Route::get('/subjects' , [\App\Http\Controllers\Controller::class,'getSubject']);
Route::get('/subjects-edit/{id}' , [\App\Http\Controllers\Controller::class , 'findsubject']);
Route::get('/teacher-edit/{id}' , [\App\Http\Controllers\teacherController::class, 'findTeacher']);
Route::get('/deletesubject/{id}' , [\App\Http\Controllers\Controller::class, 'deleteSubjects']);
Route::get('/deleteTeacherID/{id}' , [\App\Http\Controllers\teacherController::class , 'deleteTeacherID']);
Route::get('/deleteTeacher/{id}' , [\App\Http\Controllers\teacherController::class , 'deleteTeacher']);

Route::post('/create-teacher' , [\App\Http\Controllers\teacherController::class , 'postteacher']);
Route::post('/create-subject' , [\App\Http\Controllers\Controller::class , 'createSubject']);
Route::post('/create-teacherId' , [\App\Http\Controllers\teacherController::class, 'createTeacherID'] );
Route::post('/update-teacher/{id}' , [\App\Http\Controllers\teacherController::class , 'updateTeacher']);
Route::post('/update-subject/{id}' , [\App\Http\Controllers\Controller::class , 'updateSubjects']);
