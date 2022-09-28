<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\User;
use App\Models\Atendimento;
use App\Models\Comentario;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $all  = DB::table('atendimentos AS c')
        ->leftjoin('users', 'c.ate_users_id', 'users.id')
        ->select('*', 'c.id AS id', 'c.created_at as created_at')
        ->get();

        return $all;
    }
    public function novo()
    {
        $usuarios = User::where('use_perfil', 11)->orderBy('name', 'asc')->get();
        return view('pages.atendimento.modalAtendimento', compact('usuarios'));
    }
    public function ver($id)
    {
        $ver  = DB::table('atendimentos AS c')
        ->leftjoin('users', 'c.ate_users_id', 'users.id')
        ->select('*', 'c.id AS id', 'c.created_at as created_at')
        ->where('c.id', $id)
        ->first();

        // $coment  = DB::table('comentarios AS c')
        // ->leftjoin('users', 'c.com_users_id', 'users.id')
        // ->select('*', 'c.id AS id', 'c.created_at as created_at')
        // ->where('c.id', $id)
        // ->get();


        return view('pages.atendimento.modalAtendimentoVer', compact('ver'));
    }
    public function editar($id)
    {
        $atendimento  = DB::table('atendimentos AS c')
        ->leftjoin('users', 'c.ate_users_id', 'users.id')
        ->select('*', 'c.id AS id', 'c.created_at as created_at')
        ->where('c.id', $id)
        ->first();

       

        $usuarios = User::where('use_perfil', 11)->orderBy('name', 'asc')->get();

        // $coment  = DB::table('comentarios AS c')
        // ->leftjoin('users', 'c.com_users_id', 'users.id')
        // ->select('*', 'c.id AS id', 'c.created_at as created_at')
        // ->where('c.id', $id)
        // ->get();


        return view('pages.atendimento.modalAtendimento', compact('atendimento', 'usuarios'));
    }


    public function cadastro(Request $request)
    {
        $mensagem = 'erro';
        $com_ate_id = $request->input('com_ate_id');
        if ($com_ate_id == '') {
            $dados = new Atendimento();
        }else{
            $dados = Atendimento::find($com_ate_id);
        }
        $dados->ate_nome = $request->input('ate_nome');
        $dados->ate_email = $request->input('ate_email');
        $dados->ate_telefone = $request->input('ate_telefone');
        $dados->ate_tipo = $request->input('ate_tipo');
        $dados->ate_users_id  = $request->input('ate_users_id');
        $dados->ate_autor  = Auth::user()->id; 
        $dados->ate_titulo = $request->input('ate_titulo');
        $dados->ate_mensagem = $request->input('ate_mensagem');
        $dados->ate_status = $request->input('ate_status');
        $dados->save();
        $mensagem = 'ok';
        return $mensagem; 

    }
    public function cadastro_coment(Request $request)
    {
        $mensagem = 'erro';
        $dados = new Comentario();
        $dados->com_ate_id = $request->input('com_ate_id');
        $dados->com_texto = $request->input('com_texto');
        $dados->com_users_id = Auth::user()->id;
        $dados->save();
        $mensagem = 'ok';
        return $mensagem; 
    }

    public function altstatus(Request $request)
    {
        $mensagem = 'erro';
        $ate_status = $request->input('com_ate_id');

        $dados = Atendimento::find($request->input('com_ate_id'));
        $dados->ate_status = $request->input('ate_status');
        $dados->save();
        $mensagem = 'ok';
        return $mensagem; 
    }

    public function coment_list($id)
    {
        $coment  = DB::table('comentarios AS c')
        ->leftjoin('users', 'c.com_users_id', 'users.id')
        ->select('*', 'c.id AS id', 'c.created_at as created_at')
        ->where('c.com_ate_id', $id)
        ->get();

        return view('pages.atendimento.modaComent', compact('coment'));
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
