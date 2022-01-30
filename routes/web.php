<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;

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

Route::get('/', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\UsuarioController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/teste', [App\Http\Controllers\TesteController::class, 'index'])->name('teste');
Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produto');

Route::get('/upload-ui', [App\Http\Controllers\FileUploadController::class, 'dropzoneUi' ]);
Route::post('/file-upload', [App\Http\Controllers\FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');
Route::get('/file-upload/getfiles/{id}', [App\Http\Controllers\FileUploadController::class, 'getfiles' ]);
Route::get('/file-upload/delete/{id}', [App\Http\Controllers\FileUploadController::class, 'delete' ]);

Route::group(['middleware' => 'acesso'], function () {
    Route::get('/', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario');
    Route::get('/historico/user/{id}', [App\Http\Controllers\HistoricoController::class, 'user']);
    Route::get('/historico/delete/{id}', [App\Http\Controllers\HistoricoController::class, 'delete']);
    
    Route::get('/aditivo/user/{id}', [App\Http\Controllers\AditivoController::class, 'user']);
    
    Route::get('/supervisao', [App\Http\Controllers\SupervisaoController::class, 'index'])->name('index');
    Route::get('/supervisao/all', [App\Http\Controllers\SupervisaoController::class, 'all']);
    Route::post('/supervisao/cadastro', [App\Http\Controllers\SupervisaoController::class, 'cadastro']);
    Route::get('/supervisao/delete/{id}', [App\Http\Controllers\SupervisaoController::class, 'delete']);
    
    Route::get('/tarifa', [App\Http\Controllers\TarifaController::class, 'index'])->name('index');
    Route::get('/tarifa/all', [App\Http\Controllers\TarifaController::class, 'all']);
    Route::post('/tarifa/cadastro', [App\Http\Controllers\TarifaController::class, 'cadastro']);
    Route::get('/tarifa/delete/{id}', [App\Http\Controllers\TarifaController::class, 'delete']);

    Route::get('/cargo', [App\Http\Controllers\CargoController::class, 'index'])->name('index');
    Route::get('/cargo/all', [App\Http\Controllers\CargoController::class, 'all']);
    Route::post('/cargo/cadastro', [App\Http\Controllers\CargoController::class, 'cadastro']);
    Route::get('/cargo/delete/{id}', [App\Http\Controllers\CargoController::class, 'delete']);

    Route::get('/regime', [App\Http\Controllers\RegimeController::class, 'index'])->name('index');
    Route::get('/regime/all', [App\Http\Controllers\RegimeController::class, 'all']);
    Route::post('/regime/cadastro', [App\Http\Controllers\RegimeController::class, 'cadastro']);
    Route::get('/regime/delete/{id}', [App\Http\Controllers\RegimeController::class, 'delete']);

    Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('index');
    Route::get('/empresa/all', [App\Http\Controllers\EmpresaController::class, 'all']);
    Route::post('/empresa/cadastro', [App\Http\Controllers\EmpresaController::class, 'cadastro']);
    Route::get('/empresa/delete/{id}', [App\Http\Controllers\EmpresaController::class, 'delete']);

    Route::get('/frente', [App\Http\Controllers\FrenteController::class, 'index'])->name('index');
    Route::get('/frente/all', [App\Http\Controllers\FrenteController::class, 'all']);
    Route::post('/frente/cadastro', [App\Http\Controllers\FrenteController::class, 'cadastro']);
    Route::get('/frente/delete/{id}', [App\Http\Controllers\FrenteController::class, 'delete']);

    Route::get('/alocacao', [App\Http\Controllers\AlocacaoController::class, 'index'])->name('index');
    Route::get('/alocacao/all', [App\Http\Controllers\AlocacaoController::class, 'all']);
    Route::post('/alocacao/cadastro', [App\Http\Controllers\AlocacaoController::class, 'cadastro']);
    Route::get('/alocacao/delete/{id}', [App\Http\Controllers\AlocacaoController::class, 'delete']);

    Route::get('/setor', [App\Http\Controllers\SetorController::class, 'index'])->name('index');
    Route::get('/setor/all', [App\Http\Controllers\SetorController::class, 'all']);
    Route::post('/setor/cadastro', [App\Http\Controllers\SetorController::class, 'cadastro']);
    Route::get('/setor/delete/{id}', [App\Http\Controllers\SetorController::class, 'delete']);

    Route::get('/usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario');
    Route::get('/usuario/all', [App\Http\Controllers\UsuarioController::class, 'all']);
    Route::post('/usuario/cadastro', [App\Http\Controllers\UsuarioController::class, 'cadastro']);    
    Route::post('/usuario/addAditivos', [App\Http\Controllers\UsuarioController::class, 'addAditivos']);    
    Route::get('/usuario/delete/{id}', [App\Http\Controllers\UsuarioController::class, 'delete']);
    Route::get('/usuario/detalhes/{id}', [App\Http\Controllers\UsuarioController::class, 'detalhe']);
    Route::get('/usuario/getuser/{id}', [App\Http\Controllers\UsuarioController::class, 'getuser']);

    Route::get('/aditivo/{id}', [App\Http\Controllers\AditivoController::class, 'all']);
    Route::post('/aditivo/cadastro', [App\Http\Controllers\AditivoController::class, 'cadastro']);   
    Route::get('/aditivo/delete/{id}', [App\Http\Controllers\AditivoController::class, 'delete']);
    
});







