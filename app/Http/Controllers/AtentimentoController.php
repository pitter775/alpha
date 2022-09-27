<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\User;
use App\Models\Atendimento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDOException;

class AtentimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $atendimento = Atendimento::all();
        
        //dd(Schema::getColumnListing('atendimentos'));
        return view('pages.atendimento.index', compact('atendimento'));
    }
    public function all()
    {
        $cardapio  = DB::table('cardapios AS c')
        ->leftjoin('series', 'c.series_id', 'series.id')
        ->select('*', 'c.id AS id')
        ->get();

        return $cardapio;
    }
    public function novo()
    {
        $usuarios = User::where('use_perfil', 11)->orderBy('name', 'asc')->get();
        return view('pages.atendimento.modalAtendimento', compact('usuarios'));
    }


    public function cadastro(Request $request)
    {
        $mensagem['cadastro'] = 'cadastrando';
        $dados = new Atendimento();
        $dados->ate_nome = $request->input('ate_nome');
        $dados->ate_email = $request->input('ate_email');
        $dados->ate_telefone = $request->input('ate_telefone');
        $dados->ate_tipo = $request->input('ate_tipo');
        $dados->ate_users_id  = Auth::user()->id; ;
        $dados->ate_titulo = $request->input('ate_titulo');
        $dados->ate_mensagem = $request->input('ate_mensagem');
        $dados->ate_status = $request->input('ate_status');
        $dados->save();
        return $mensagem; 

    }
    public function delete($id)
    {
        $deletar = Cardapio::find($id);
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
    public static function dateEmMysql($dateSql)
    {
        if ($dateSql) {
            $ano = substr($dateSql, 6);
            $mes = substr($dateSql, 3, -5);
            $dia = substr($dateSql, 0, -8);
            return $ano . "-" . $mes . "-" . $dia;
        } else {
            return null;
        }
    }
    
}
