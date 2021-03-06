<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StuffController;



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





Route::get('/',[StudentController::class, 'index'])->name('Home');
//store student information
Route::post('/store/student',[StudentController::class, 'storeStudent'])->name('store.student');
//edit student information
Route::get('/edit/student/{id}',[StudentController::class, 'editStudent'])->name('edit.student');
//Update student information
Route::post('/update/student',[StudentController::class, 'updateStudent'])->name('update.student');
//delete student information
Route::get('/delete/student/{id}',[StudentController::class, 'deleteStudent'])->name('delete.student');





//add teacher information
Route::get('/add/teacher',[TeacherController::class, 'addTeacher'])->name('add.teacher');
//store Teacher information
Route::post('/store/Teacher',[TeacherController::class, 'storeTeacher'])->name('store.teacher');
//Edit Teacher information
Route::get('/edit/Teacher/{id}',[TeacherController::class, 'editTeacher'])->name('edit.teacher');
//Update teacher information
Route::post('/update/Teacher',[TeacherController::class, 'updateTeacher'])->name('update.teacher');
//Delete teacher information
Route::get('/delete/Teacher/{id}',[TeacherController::class, 'deleteTeacher'])->name('delete.teacher');



Route::prefix('stuff')->group(function () {
    //Add stuff information
    Route::get('/add',[StuffController::class, 'addStuff'])->name('add.stuff');
    //store stuff information
    Route::post('/store',[StuffController::class, 'storeStuff'])->name('store.stuff');
    //Edit stuff information
    Route::get('/edit/{id}',[StuffController::class, 'editStuff'])->name('edit.stuff');
    //Update stuff information
    Route::post('/update',[StuffController::class, 'updateStuff'])->name('update.stuff');
    //delete stuff information
    Route::get('/delete/{id}',[StuffController::class, 'deleteStuff'])->name('delete.stuff');

});

