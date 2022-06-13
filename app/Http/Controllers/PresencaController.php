<?php

namespace App\Http\Controllers;
use App\Models\Presenca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PresencaController extends Controller
{
    public function cadastro_presenca(Request $request)
    {
        $datanaw = $this->dateEmMysql($request->input('datanaw')); 

        
        $car_data = $this->dateEmMysql($request->input('car_data'));


        $iduser = $request->input('iduser');
        $tipo = $request->input('tipo');
        $serie = $request->input('idserie');

        $mensagem['cadastro'] = 'cadastrando';

        $tem = Presenca::where([['pres_datanaw', $car_data], ['users_id',  $iduser]])->get();
        if (count($tem) == 0) {
            $dados = new Presenca();
            $mensagem['cadastro-1'] = 'novo cadastro';
        }else{
            $dados = Presenca::where([['pres_datanaw', $car_data], ['users_id', $iduser]])->first();
            $mensagem['cadastro-1'] = 'editando';
        }
        $dados->users_id = $iduser;
        $dados->pres_tipo = $tipo;
        $dados->pres_professor = Auth::user()->id; ;
        $dados->pres_serie = $serie;
        $dados->pres_datanaw = $car_data;
        $dados->save();


        return $mensagem;
        
    }

    public function listaAlunos(Request $request){

        $idserie = $request->input('idserie');
        $data = $this->dateEmMysql($request->input('car_data'));

        // DD( $data);

         


        $series  = DB::table('users AS u')
        ->select('*', 'u.id AS id', 'u.name as name',(DB::raw("(SELECT p.pres_tipo FROM presencas as p  WHERE u.id = p.users_id AND p.pres_datanaw = '$data' ) AS presenca")))
        ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
        ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
        ->where('series.id', $idserie)
        ->get();        

        //  dd($series);

        // (DB::raw("(SELECT u1.name FROM users u1 WHERE u1.id = friends.id_friend) AS name")))
  

    return view('pages.serie.listaChamada', compact('series'));
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
