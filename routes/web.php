<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('site');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/matriculas', [App\Http\Controllers\HomeController::class, 'matricula']);
Route::post('/matriculas/link', [App\Http\Controllers\SitematriculaController::class, 'link']);
Route::post('/matriculas/telacadastro', [App\Http\Controllers\SitematriculaController::class, 'telacadastro']);
Route::get('/matriculas/tela/{id}', [App\Http\Controllers\SitematriculaController::class, 'telamatricula'])->name('telamatricula');
Route::get('/matriculas/getuser/{id}', [App\Http\Controllers\SitematriculaController::class, 'getuser']);
Route::post('/matriculas/cadastro', [App\Http\Controllers\SitematriculaController::class, 'cadastro']);

Route::get('/enviolink', [App\Http\Controllers\EmailsController::class, 'enviarlink']);


Auth::routes();


Route::get('/upload-ui', [App\Http\Controllers\FileUploadController::class, 'dropzoneUi' ]);
Route::post('/file-upload', [App\Http\Controllers\FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');
Route::get('/file-upload/getfiles/{id}', [App\Http\Controllers\FileUploadController::class, 'getfiles' ]);
Route::get('/file-upload/delete/{id}', [App\Http\Controllers\FileUploadController::class, 'delete' ]);

Route::group(['middleware' => 'acesso'], function () {

    Route::get('/escolas', [App\Http\Controllers\EscolaController::class, 'index']);

    Route::get('/alocacao', [App\Http\Controllers\AlocacaoController::class, 'index']);
    Route::get('/alocacao/all', [App\Http\Controllers\AlocacaoController::class, 'all']);
    Route::post('/alocacao/cadastro', [App\Http\Controllers\AlocacaoController::class, 'cadastro']);
    Route::get('/alocacao/delete/{id}', [App\Http\Controllers\AlocacaoController::class, 'delete']);


    Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'index']);
    Route::get('/usuario/all', [App\Http\Controllers\UsuarioController::class, 'all']);
    Route::post('/usuario/cadastro', [App\Http\Controllers\UsuarioController::class, 'cadastro']);
    Route::post('/usuario/addAditivos', [App\Http\Controllers\UsuarioController::class, 'addAditivos']);
    Route::get('/usuario/delete/{id}', [App\Http\Controllers\UsuarioController::class, 'delete']);
    Route::get('/usuario/prof/delete/{id}', [App\Http\Controllers\UsuarioController::class, 'deleteProf']);
    Route::get('/usuario/detalhes/{id}', [App\Http\Controllers\UsuarioController::class, 'detalhe']);
    Route::get('/usuario/getuser/{id}', [App\Http\Controllers\UsuarioController::class, 'getuser']);
    Route::get('/usuario/seriesProfAll/{id}', [App\Http\Controllers\UsuarioController::class, 'seriesProfAll']);

    Route::get('/serie', [App\Http\Controllers\SerieController::class, 'index']);
    Route::get('/serie/all', [App\Http\Controllers\SerieController::class, 'all']);
    Route::get('/serie/chamada/{id}', [App\Http\Controllers\SerieController::class, 'chamada']);
    Route::post('/serie/cadastro', [App\Http\Controllers\SerieController::class, 'cadastro']);
    Route::get('/serie/delete/{id}', [App\Http\Controllers\SerieController::class, 'delete']);

    Route::post('/presenca/cadastro', [App\Http\Controllers\SerieController::class, 'cadastro_presenca']);



});







