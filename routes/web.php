<?php

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::delete('/supports/{id},',[SupportController::class,'destroy']) -> name('supports.destroy');
//Atualizar o comentário
Route::put('/supports/{id}',[SupportController::class, 'update']) ->name('supports.update');
//Editar o comentário
Route::get('/supports/{id}/edit',[SupportController::class, 'edit']) -> name('supports.edit');
//Criar nova dúvida
Route::get('/supports/create',[SupportController::class,'create']) -> name('supports.create');
//Detalhes da dúvida
Route::get('/supports/{id}', [SupportController::class,'show'])->name('supports.show');
//Página principal
Route::post('/supports', [SupportController::class,'store'])->name('supports.store');
//Após a dúvida voltará a página principal
Route::get("/supports", [SupportController::class,'index'])->name("supports.index");
//página contato
Route::get('/contato', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});
