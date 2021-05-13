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

//Route::get('/', function () {
//    return redirect('/instr');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/start', [App\Http\Controllers\StartController::class, 'start'])->middleware(['auth'])->middleware(['teachercheck'])->name('start');

Route::post('/begin', [App\Http\Controllers\StartController::class, 'begin'])->middleware(['endtest'])->middleware(['teachercheck'])->middleware(['auth'])->name('begin');

Route::post('/continue', [App\Http\Controllers\StartController::class, 'continue'])->middleware(['endtest'])->middleware(['teachercheck'])->middleware(['auth'])->name('continue');

Route::get('/level/{currentlevel}', [App\Http\Controllers\StartController::class, 'continue'])->middleware(['endtest'])->middleware(['teachercheck'])->middleware(['levelcheck'])->middleware(['auth'])->name('level');

Route::post('/check', [App\Http\Controllers\LevelController::class, 'level'])->middleware(['endtest'])->middleware(['teachercheck'])->middleware(['levelcheck'])->middleware(['auth'])->name('check');

Route::get('/result', [App\Http\Controllers\ResultController::class, 'result'])->middleware(['auth'])->middleware(['teachercheck'])->name('result');

Route::get('/result_view', [App\Http\Controllers\ResultController::class, 'result_view'])->middleware(['auth'])->middleware(['teachercheck'])->name('result_view');

Route::any('/test_row', [App\Http\Controllers\RowCheckController::class, 'RowCheck'])->middleware(['auth'])->middleware(['teachercheck'])->name('RowCheck');

Route::post('/RowCheckAjax', [App\Http\Controllers\RowCheckController::class, 'RowCheckAjax'])->middleware(['auth'])->middleware(['teachercheck'])->name('RowCheckAjax');

Route::get('/raiting', [App\Http\Controllers\RaitingController::class, 'raiting'])->middleware(['auth'])->name('raiting');

Route::get('/teacher_raiting', [App\Http\Controllers\TeacherRaitingController::class, 'teacher_raiting'])->middleware(['auth'])->middleware(['rolescheck'])->name('teacher_raiting');

Route::post('/enter_user', [App\Http\Controllers\TeacherRaitingController::class, 'enter_user'])->middleware(['auth'])->middleware(['rolescheck'])->name('enter_user');

Route::post('/ResultUser', [App\Http\Controllers\TeacherRaitingController::class, 'ResultUser'])->middleware(['auth'])->middleware(['rolescheck'])->name('ResultUser');

Route::get('/instr', [App\Http\Controllers\InstrController::class, 'instr'])->middleware(['auth'])->name('instr');
