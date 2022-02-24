<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Presenca;
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
    public function chamada($id)
    {
        $series  = DB::table('users AS u')
            ->select('*', 'u.id AS id', 'u.name as name')
            ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
            ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
            ->where('series.id', $id)
            ->get();        
      

        return view('pages.serie.chamada', compact('series'));
    }
    public function cadastro_presenca(Request $request)
    {
        $datanaw = $this->dateEmMysql($request->input('datanaw')); 
        $iduser = $request->input('iduser');
        $tipo = $request->input('tipo');

        $mensagem['cadastro'] = 'cadastrando';

        $tem = Presenca::where([['pres_datanaw', $datanaw], ['users_id',  $iduser]])->get();
        if (count($tem) == 0) {
            $dados = new Presenca();
            $mensagem['cadastro-1'] = 'novo cadastro';
        }else{
            $dados = Presenca::where([['pres_datanaw', $datanaw], ['users_id', $iduser]])->first();
            $mensagem['cadastro-1'] = 'editando';
        }
        $dados->users_id = $iduser;
        $dados->pres_tipo = $tipo;
        $dados->users_id = $iduser;
        $dados->pres_datanaw = $datanaw;
        $dados->save();


        return $mensagem;
        
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
