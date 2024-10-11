<?php

use App\Http\Register\Controllers\CategoryController;
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

Route::group(['middleware' => []], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::prefix('livros')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('livros');
        Route::get('new', [CategoryController::class, 'new'])->name('livros.new');
        Route::get('edit/{code}', [CategoryController::class, 'edit'])->name('livros.edit');
        Route::post('insert', [CategoryController::class, 'insert'])->name('livros.insert');
        Route::post('update/{code}', [CategoryController::class, 'update'])->name('livros.update');
        Route::post('delete/{code}', [CategoryController::class, 'delete'])->name('livros.delete');
    });

    Route::prefix('autores')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('autores');
        Route::get('new', [CategoryController::class, 'new'])->name('autores.new');
        Route::get('edit/{code}', [CategoryController::class, 'edit'])->name('autores.edit');
        Route::post('insert', [CategoryController::class, 'insert'])->name('autores.insert');
        Route::post('update/{code}', [CategoryController::class, 'update'])->name('autores.update');
        Route::post('delete/{code}', [CategoryController::class, 'delete'])->name('autores.delete');
    });

    Route::prefix('assuntos')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('assuntos');
        Route::get('new', [CategoryController::class, 'new'])->name('assuntos.new');
        Route::get('edit/{code}', [CategoryController::class, 'edit'])->name('assuntos.edit');
        Route::post('insert', [CategoryController::class, 'insert'])->name('assuntos.insert');
        Route::post('update/{code}', [CategoryController::class, 'update'])->name('assuntos.update');
        Route::post('delete/{code}', [CategoryController::class, 'delete'])->name('assuntos.delete');
    });

    Route::prefix('relatorio')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('relatorio');
        Route::post('generate', [CategoryController::class, 'generate'])->name('relatorio.generate');
    });
});