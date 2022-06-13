<?php

namespace App\Http\Controllers;

use App\Models\Serie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class SerieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.serie.index');
    }
    public function all()
    {
        $serie = Serie::all();
        return json_encode($serie);
    }
    // trazer na chamada alem do id a data para poder pegar na tabela de presença mais um campo (0,1 de falta ou pesença) 
    public function chamada($id)
    {
        $idserie = $id;
        $series  = DB::table('users AS u')
            ->select('*', 'u.id AS id', 'u.name as name',(DB::raw("(SELECT p.pres_tipo FROM presencas as p  WHERE u.id = p.users_id) AS presenca")))
            ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
            ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
            ->where('series.id', $id)
            ->get();        

           // dd($series);

            // (DB::raw("(SELECT u1.name FROM users u1 WHERE u1.id = friends.id_friend) AS name")))
      

        return view('pages.serie.chamada', compact('series', 'idserie'));
    }    
    public function cadastro(Request $request)
    {
        $id_geral = $request->input('id_geral');
        $mensagem = '';

        if ($id_geral == '') {
            $tem = Serie::where('ser_nome', $request->input('ser_nome'))->get();
            if (!count($tem) == 0) {
                return 'Erro, Já existe esse nome cadastrado no sistema.';
            }
            $dados = new serie();
            $mensagem = 'novo';
        } else {
            $dados = Serie::find($id_geral);
            $mensagem = 'editado';
        }
        $dados->ser_escolas_id =  $request->input('ser_escolas_id');
        $dados->ser_nome = $request->input('ser_nome');
        $dados->ser_periodo = $request->input('ser_periodo');
        $dados->ser_apelido = $request->input('ser_apelido');


        $dados->save();
        if ($mensagem == 'novo') {
            return $dados->id;
        } else {
            return $mensagem;
        }
    }
    public function delete($id)
    {
        $deletar = Serie::find($id);
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
