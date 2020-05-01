<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function (){

    Route::group(['prefix' => 'student'], function (){
        Route::get('lessons', 'StudentController@lessons')->name('student.lessons');
        Route::get('marks', 'StudentController@marks')->name('student.marks');
    });

    Route::group(['prefix' => 'teacher'], function (){
        Route::resource('lessons', 'Resource\LessonController');
        Route::get('lessons/{id}/test/create', 'Resource\LessonController@testCreate')->name('test.create');
        Route::post('lessons/{id}/test/create', 'Resource\LessonController@testStore')->name('test.store');
        Route::delete('test/{id}', 'Resource\LessonController@testDestroy')->name('test.destroy');
        Route::resource('home-task', 'Resource\LessonController');
        Route::get('tasks', 'TeacherController@tasks')->name('teacher.tasks');
    });

    Route::group(['prefix' => 'admin'], function (){
       Route::resource('users', 'Resource\UserController');
    });

});
