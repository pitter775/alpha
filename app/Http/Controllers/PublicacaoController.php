<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Publicacoe;
use DateTime;
use PDOException;

class PublicacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.publicacao.index');
    }
    public function all()
    {
        $publicacoes  = DB::table('publicacoes AS c')
        ->select('*')
        ->get();

        return $publicacoes;
    }
    public function cadastro(Request $request)
    {
        $mensagem = 'edição';
        $pub_codigo =  $request->pub_codigo;

        $dados = Publicacoe::where('pub_codigo', $pub_codigo)->first();

        if (!$dados) {
            $dados = new Publicacoe();
            $mensagem = 'novo';
        }

        $dados->pub_titulo =  $request->pub_titulo;
        $dados->pub_tipo =  $request->pub_tipo;

        $texto = $request->pub_texto;
        $novafrase = str_replace('src="arquivos/','src="/arquivos/' ,$texto);
        $dados->pub_texto =  $novafrase;
        $dados->pub_status =  $request->pub_status;
        $dados->pub_codigo =  $pub_codigo;
        $dados->pub_users_id =  Auth::user()->id; 
        $dados->save();

        return $mensagem;
    }
    public function editar($id = null)
    {

        
        if($id !== '0'){
            $dados = Publicacoe::where('id', $id)->first();
            return view('pages.publicacao.formpub', compact('dados'));
        }else{
            return view('pages.publicacao.formpub');
        } 
        
    }
    public function delete($id)
    {
        $deletar = Publicacoe::find($id);
        if (isset($deletar)) {
            try {
                $deletar->delete();
                return 'Ok';
            } catch (PDOException $e) {
                if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                    return 'Erro';
                }
            }
        }
    }
}
