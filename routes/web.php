<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\NewsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categoria/listar', [CategoriaController::class, 'listar']);
    Route::get('/categoria/novo', [CategoriaController::class, 'novo']);
    Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar']);
    Route::get('/categoria/excluir/{id}', [CategoriaController::class, 'excluir']);
    Route::post('/categoria/salvar', [CategoriaController::class, 'salvar']);
    Route::get('/categoria/relatorio', [CategoriaController::class, 'relatorio']);

    Route::get('/fabricante/listar', [FabricanteController::class, 'listar']);
    Route::get('/fabricante/novo', [FabricanteController::class, 'novo']);
    Route::get('/fabricante/editar/{id}', [FabricanteController::class, 'editar']);
    Route::get('/fabricante/excluir/{id}', [FabricanteController::class, 'excluir']);
    //Route::get('/fabricante/mensagem/{id}', [FabricanteController::class, 'mensagem']);
    Route::post('/fabricante/salvar', [FabricanteController::class, 'salvar']);
    Route::get('/fabricante/relatorio', [FabricanteController::class, 'relatorio']);
    //Route::post('/fabricante/mensagem', [FabricanteController::class, 'enviarMensagem']);

    Route::get('/equipamento/listar', [EquipamentoController::class, 'listar']);
    Route::get('/equipamento/novo', [EquipamentoController::class, 'novo']);
    Route::get('/equipamento/editar/{id}', [EquipamentoController::class, 'editar']);
    Route::get('/equipamento/excluir/{id}', [EquipamentoController::class, 'excluir']);
    Route::post('/equipamento/salvar', [EquipamentoController::class, 'salvar']);
    Route::get('/equipamento/relatorio', [EquipamentoController::class, 'relatorio']);


    Route::get('/', function () {
        return view('index');
    });
});

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/equipamento/{id}', [NewsController::class, 'equipamento']);
Route::get('/news/categoria/{id}', [NewsController::class, 'categoria']);

require __DIR__.'/auth.php';
