<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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
// URL::forceScheme('https');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('site');
Route::get('/carlosdrummondandrade', [App\Http\Controllers\HomeController::class, 'escola'])->name('escola');
Route::get('/publi/{id}', [App\Http\Controllers\HomeController::class, 'publi']);
Route::get('/teste01', [App\Http\Controllers\HomeController::class, 'teste01']);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/dashboard/tiporesidencia', [App\Http\Controllers\DashboardController::class, 'tiporesidencia']);

Route::get('/matriculas', [App\Http\Controllers\HomeController::class, 'matricula']);
Route::post('/matriculas/link', [App\Http\Controllers\SitematriculaController::class, 'link']);
Route::post('/matriculas/telacadastro', [App\Http\Controllers\SitematriculaController::class, 'telacadastro']);
Route::get('/matriculas/tela/{id}', [App\Http\Controllers\SitematriculaController::class, 'telamatricula'])->name('telamatricula');
Route::get('/matriculas/getuser/{id}', [App\Http\Controllers\SitematriculaController::class, 'getuser']);
Route::post('/matriculas/cadastro', [App\Http\Controllers\SitematriculaController::class, 'cadastro']);


Route::get('/matriculas/responsavel', [App\Http\Controllers\SitematriculaController::class, 'responsavel']);



Route::get('/enviolink', [App\Http\Controllers\EmailsController::class, 'enviarlink']);


Auth::routes();


Route::get('/upload-ui', [App\Http\Controllers\FileUploadController::class, 'dropzoneUi' ]);
Route::post('/file-upload', [App\Http\Controllers\FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');
Route::get('/file-upload/getfiles/{id}', [App\Http\Controllers\FileUploadController::class, 'getfiles' ]);
Route::get('/file-upload/getpublicacao/{id}', [App\Http\Controllers\FileUploadController::class, 'getpublicacao' ]);
Route::get('/file-upload/delete/{id}', [App\Http\Controllers\FileUploadController::class, 'delete' ]);

Route::get('/users/{user}', [App\Http\Controllers\TestesController::class, 'show']);

Route::get('/usuario/imprimirPront/{id}', [App\Http\Controllers\UsuarioController::class, 'imprimirPront']);




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
    Route::get('/usuario/alteracao/delete/{id}', [App\Http\Controllers\UsuarioController::class, 'deleteAlteracao']);
    Route::get('/usuario/detalhes/{id}', [App\Http\Controllers\UsuarioController::class, 'detalhe']);
    Route::get('/usuario/getuser/{id}', [App\Http\Controllers\UsuarioController::class, 'getuser']);
    Route::get('/usuario/seriesProfAll/{id}', [App\Http\Controllers\UsuarioController::class, 'seriesProfAll']);
    Route::get('/usuario/observacoes/{id}', [App\Http\Controllers\UsuarioController::class, 'observacoes']);
    Route::get('/usuario/alteracaos/{id}', [App\Http\Controllers\UsuarioController::class, 'alteracoesList']);
    Route::get('/usuario/observacao/delete/{id}', [App\Http\Controllers\UsuarioController::class, 'deleteObservacao']);
    Route::get('/usuario/atualizasituacao/{id}', [App\Http\Controllers\UsuarioController::class, 'atualizasituacao']);

    Route::get('/usuario/getDependente/{id}', [App\Http\Controllers\UsuarioController::class, 'getDependente']);
    Route::get('/usuario/deleteDependente/{id}', [App\Http\Controllers\UsuarioController::class, 'deleteDependente']);
    Route::get('/usuario/card/{id}', [App\Http\Controllers\UsuarioController::class, 'card']);

    Route::get('/usuario/card/entrada/bt/{id}', [App\Http\Controllers\UsuarioController::class, 'cardEntradabt']);
    Route::get('/usuario/card/saida/bt/{id}', [App\Http\Controllers\UsuarioController::class, 'cardSaidabt']);

    Route::post('/usuario/card/entrad', [App\Http\Controllers\UsuarioController::class, 'cardEntrada']);
    Route::post('/usuario/card/said', [App\Http\Controllers\UsuarioController::class, 'cardSaida']);

   

    Route::get('/serie', [App\Http\Controllers\SerieController::class, 'index']);
    Route::get('/serie/all', [App\Http\Controllers\SerieController::class, 'all']);
    Route::post('/serie/cadastro', [App\Http\Controllers\SerieController::class, 'cadastro']);
    Route::get('/serie/delete/{id}', [App\Http\Controllers\SerieController::class, 'delete']);
    Route::get('/serie/chamada/{id}', [App\Http\Controllers\SerieController::class, 'chamada']);

    Route::get('/presenca', [App\Http\Controllers\PresencaController::class, 'index']);
    Route::post('/presenca/cadastro', [App\Http\Controllers\PresencaController::class, 'cadastro_presenca']);
    Route::get('/presenca/lista', [App\Http\Controllers\PresencaController::class, 'listaAlunos']);
    Route::post('/presenca/totais', [App\Http\Controllers\PresencaController::class, 'totais']);
    Route::get('/presenca/series', [App\Http\Controllers\PresencaController::class, 'series']);
    Route::get('/presenca/seriesid', [App\Http\Controllers\PresencaController::class, 'seriesid']);
    Route::get('/presenca/getDataGrafico', [App\Http\Controllers\PresencaController::class, 'getDataGrafico']);


    Route::get('/cardapio', [App\Http\Controllers\CardapioController::class, 'index']);
    Route::get('/cardapio/all', [App\Http\Controllers\CardapioController::class, 'all']);
    Route::get('/cardapio/chamada/{id}', [App\Http\Controllers\CardapioController::class, 'chamada']);
    Route::post('/cardapio/cadastro', [App\Http\Controllers\CardapioController::class, 'cadastro']);
    Route::get('/cardapio/delete/{id}', [App\Http\Controllers\CardapioController::class, 'delete']);

    Route::get('/piloto', [App\Http\Controllers\PilotoController::class, 'index']);
    Route::post('/piloto/tabela', [App\Http\Controllers\PilotoController::class, 'tabela']);
    Route::post('/piloto/tabelaDash', [App\Http\Controllers\PilotoController::class, 'tabelaDash']);

    Route::get('/publicacao', [App\Http\Controllers\PublicacaoController::class, 'index']);
    Route::get('/publicacao/all', [App\Http\Controllers\PublicacaoController::class, 'all']);
    Route::post('/publicacao/cadastro', [App\Http\Controllers\PublicacaoController::class, 'cadastro']);
    Route::get('/publicacao/editar/{id}', [App\Http\Controllers\PublicacaoController::class, 'editar']);
    Route::get('/publicacao/delete/{id}', [App\Http\Controllers\PublicacaoController::class, 'delete']);

    Route::get('/qrcode', [App\Http\Controllers\QrcodeController::class, 'index']);
    Route::get('/qrcode/imprimirqrcode/{id}', [App\Http\Controllers\QrcodeController::class, 'imprimirQrcode']);
    Route::get('/qrcode/imprimirTodosQrcode', [App\Http\Controllers\QrcodeController::class, 'imprimirTodosQrcode']);

    Route::get('/atendimento', [App\Http\Controllers\AtentimentoController::class, 'index']);
    Route::get('/atendimento/novo', [App\Http\Controllers\AtentimentoController::class, 'novo']);
    Route::get('/atendimento/ver/{id}', [App\Http\Controllers\AtentimentoController::class, 'ver']);
    Route::post('/atendimento/cadastro', [App\Http\Controllers\AtentimentoController::class, 'cadastro']);
    Route::post('/atendimento/cadastro_coment', [App\Http\Controllers\AtentimentoController::class, 'cadastro_coment']);
    Route::get('/atendimento/all', [App\Http\Controllers\AtentimentoController::class, 'all']);
    Route::get('/atendimento/comentario/list/{id}', [App\Http\Controllers\AtentimentoController::class, 'coment_list']);

});







