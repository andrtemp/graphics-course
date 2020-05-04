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

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'student'], function () {
        Route::get('lessons', 'StudentController@lessons')->name('student.lessons');
        Route::get('tasks', 'StudentController@tasks')->name('student.tasks');
        Route::get('question', 'StudentController@question')->name('student.question');
        Route::get('question/form', 'StudentController@questionForm')->name('student.question.form');
        Route::get('tasks/{id}', 'StudentController@task')->name('student.task.form');
        Route::get('lessons/{id}', 'StudentController@lesson')->name('student.lesson.view');
        Route::get('test/{id}', 'StudentController@test')->name('student.test.form');
        Route::post('test/{id}', 'StudentController@saveTest')->name('student.test.store');
        Route::post('task/{id}', 'StudentController@saveTask')->name('student.task.store');
        Route::post('question/form', 'StudentController@questionStore')->name('student.question.store');

    });

    Route::group(['prefix' => 'teacher'], function () {
        Route::get('tasks', 'TeacherController@tasks')->name('teacher.tasks');
        Route::get('tasks/{id}', 'TeacherController@tasksShow')->name('teacher.tasks.show');
        Route::post('tasks/{id}', 'TeacherController@tasksMark')->name('teacher.tasks.mark');
        Route::get('attendance', 'TeacherController@attendance')->name('teacher.attendance');
        Route::get('questions', 'TeacherController@questions')->name('teacher.questions');
        Route::get('questions/{id}', 'TeacherController@questionsShow')->name('teacher.questions.show');
        Route::post('questions/{id}', 'TeacherController@answer')->name('teacher.questions.answer');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('users', 'Resource\UserController');
        Route::resource('lessons', 'Resource\LessonController');
        Route::get('lessons/{id}/test/create', 'Resource\LessonController@testCreate')->name('test.create');
        Route::post('lessons/{id}/test/create', 'Resource\LessonController@testStore')->name('test.store');
        Route::delete('test/{id}', 'Resource\LessonController@testDestroy')->name('test.destroy');
        Route::resource('home-tasks', 'Resource\HomeTaskController');
    });

});
