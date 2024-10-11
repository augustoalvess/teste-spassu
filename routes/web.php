<?php

use App\Http\Register\Controllers\AssuntoController;
use App\Http\Register\Controllers\AutorController;
use App\Http\Register\Controllers\LivroController;
use App\Http\Register\Controllers\RelatorioController;
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
        Route::get('', [LivroController::class, 'index'])->name('livros');
        Route::get('new', [LivroController::class, 'new'])->name('livros.new');
        Route::get('edit/{code}', [LivroController::class, 'edit'])->name('livros.edit');
        Route::post('insert', [LivroController::class, 'insert'])->name('livros.insert');
        Route::post('update/{code}', [LivroController::class, 'update'])->name('livros.update');
        Route::post('delete/{code}', [LivroController::class, 'delete'])->name('livros.delete');
    });

    Route::prefix('autores')->group(function () {
        Route::get('', [AutorController::class, 'index'])->name('autores');
        Route::get('new', [AutorController::class, 'new'])->name('autores.new');
        Route::get('edit/{code}', [AutorController::class, 'edit'])->name('autores.edit');
        Route::post('insert', [AutorController::class, 'insert'])->name('autores.insert');
        Route::post('update/{code}', [AutorController::class, 'update'])->name('autores.update');
        Route::post('delete/{code}', [AutorController::class, 'delete'])->name('autores.delete');
    });

    Route::prefix('assuntos')->group(function () {
        Route::get('', [AssuntoController::class, 'index'])->name('assuntos');
        Route::get('new', [AssuntoController::class, 'new'])->name('assuntos.new');
        Route::get('edit/{code}', [AssuntoController::class, 'edit'])->name('assuntos.edit');
        Route::post('insert', [AssuntoController::class, 'insert'])->name('assuntos.insert');
        Route::post('update/{code}', [AssuntoController::class, 'update'])->name('assuntos.update');
        Route::post('delete/{code}', [AssuntoController::class, 'delete'])->name('assuntos.delete');
    });

    Route::prefix('relatorio')->group(function () {
        Route::get('', [RelatorioController::class, 'index'])->name('relatorio');
        Route::post('generate', [RelatorioController::class, 'generate'])->name('relatorio.generate');
    });
});