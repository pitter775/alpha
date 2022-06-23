<?php

namespace App\Http\Controllers;
use App\Models\Presenca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

use Illuminate\Http\Request;

class PresencaController extends Controller
{
    public function index()
    {
        // return view('pages.presenca.index', compact('professores', 'alunos'));
        $series = DB::table('series as s')
        ->join('presencas as p', 'p.pres_serie', 's.id')  
        ->groupBy('s.ser_apelido')
        ->get(['s.ser_nome','s.id as id', 's.ser_apelido', 's.ser_periodo']);

    

        return view('pages.presenca.index', compact('series'));
    }
    public function cadastro_presenca(Request $request)
    {       
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
        $series  = DB::table('users AS u')
        ->select('*', 'u.id AS id', 'u.name as name',(DB::raw("(SELECT p.pres_tipo FROM presencas as p  WHERE u.id = p.users_id AND p.pres_datanaw = '$data' ) AS presenca")))
        ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
        ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
        ->where('series.id', $idserie)
        ->get(); 

        return view('pages.serie.listaChamada', compact('series'));
    }

    public function _totais(Request $request){

        $colunas = 'p.id AS id, p.pres_datanaw, ua.name as aluno, up.name as professor';
        $groupBy = ''; 
        $orderBy = 'ORDER BY  p.pres_datanaw ASC, aluno ASC'; 
        $filtro_ext = ''; 
        $totais = $this->filtros($request, $colunas, $groupBy, $orderBy, $filtro_ext);  

        return $totais;

    }
    public function totais(Request $request){

        $colunas = 'COUNT(*) as total';
        $colunas_alunos = 'p.users_id';

        $groupBy = ''; 
        $groupBy_alunos = 'GROUP BY p.users_id'; 

        $orderBy = ''; 

        $filtro_presente = 'p.pres_tipo = 1'; 
        $filtro_falta = 'p.pres_tipo = 2'; 
        $filtro_total = ''; 
        $filtro_alunos = ''; 

        $presentes = $this->filtros($request, $colunas, $groupBy, $orderBy, $filtro_presente);  
        $faltas = $this->filtros($request, $colunas, $groupBy, $orderBy, $filtro_falta);  
        $total = $this->filtros($request, $colunas, $groupBy, $orderBy, $filtro_total);  

        $alunos = $this->filtros($request, $colunas_alunos, $groupBy_alunos, $orderBy, $filtro_alunos);  

        $mensagem['presentes'] = $presentes;
        $mensagem['faltas'] = $faltas;
        $mensagem['total'] = $total;
        $mensagem['alunos'] = count($alunos);      

        return $mensagem;





    }
    public function series(Request $request){

        $colunas ='p.id as id, 
        series.ser_apelido as serie, 
        p.pres_serie as idserie,
        up.name as professora, 
        COUNT(*) as total, 
        SUM(CASE WHEN p.pres_tipo =  1 THEN 1 ELSE 0 END) AS presente,
        SUM(CASE WHEN p.pres_tipo =  2 THEN 1 ELSE 0 END) AS falta';
        $groupBy = 'GROUP BY series.ser_apelido'; 
        $orderBy = ''; 
        $filtro = ''; 

        $tabela = $this->filtros($request, $colunas, $groupBy, $orderBy, $filtro);  
        return $tabela;
    }
    public function seriesid(Request $request){

        $colunas ='p.id as id, 
        series.ser_apelido as serie, ua.name as aluno,
        SUM(CASE WHEN p.pres_tipo =  1 THEN 1 ELSE 0 END) AS presente,
        SUM(CASE WHEN p.pres_tipo =  2 THEN 1 ELSE 0 END) AS falta';
        $groupBy = 'GROUP BY ua.name'; 
        $orderBy = ''; 
        $filtro = 'p.pres_serie = ' . $request->idserie;


        $tabela = $this->filtros($request, $colunas, $groupBy, $orderBy, $filtro);  
        return $tabela;
    }
    public function getDataGrafico(Request $request){
        $serie = '';
        $mes = intval($request->mes);
        $database = '2022-'.$mes.'-05';
        $serieint = intval($request->serie);


      
        // $serie = "AND p.pres_serie = 21";
        // $serie = "AND p.pres_serie = $serieint";
        
        if($request->serie !== 'Todos'){
            $serie = "AND p.pres_serie = $serieint";
        }

        $datainicio = date("Y-m-01",strtotime( $database));
        $datafim = date("Y-m-t",strtotime( $database));

        $presenca = DB::select(DB::raw(
            "SELECT p.pres_serie as id, DATE_FORMAT(p.pres_datanaw, '%d/%m/%Y') as pres_datanaw,
                SUM(CASE WHEN p.pres_tipo =  1 THEN 1 ELSE 0 END) AS presente,
                SUM(CASE WHEN p.pres_tipo =  2 THEN 1 ELSE 0 END) AS falta
                FROM presencas As p                
                WHERE p.pres_datanaw BETWEEN '$datainicio' AND '$datafim' $serie
                
                GROUP BY p.pres_datanaw ORDER BY p.pres_datanaw ASC "
        ));

      

        return $presenca;
    }

    public function filtros($request, $colunas, $groupBy, $orderBy = '', $filtro_ext = '')
    {
        
        if($request->dt_inicial !== ''){
            $dt_inicial = $this->dateEmMysql($request->dt_inicial);
        }else{
            $dt_inicial = '';
        }
        $dt_final = $this->dateEmMysql($request->dt_final);

        $filtro = '';
        $and = '';
        $and_or = 'AND';

        if ($dt_inicial != null) {
            if ($filtro != null) {
                $and = ' AND';
            }
            if ($filtro == null) {
                $where = 'WHERE';
            } else {
                $where = '';
            }
            $filtro .= " $and $where p.pres_datanaw BETWEEN '$dt_inicial' AND '$dt_final'";
        }else{
            if ($filtro != null) {
                $and = ' AND';
            }
            if ($filtro == null) {
                $where = 'WHERE';
            } else {
                $where = '';
            }
            $filtro .= " $and $where p.pres_datanaw = '$dt_final'";
        }
        if ($filtro_ext != '') {
            if ($filtro != null) {
                $and = ' AND';
            }
            if ($filtro == null) {
                $where = 'WHERE';
            } else {
                $where = '';
            }
            $filtro .= " $and $where $filtro_ext ";
        }

        $presenca = DB::select(DB::raw(
            "SELECT $colunas
             FROM presencas As p
               LEFT JOIN users as ua ON ua.id = p.users_id
               LEFT JOIN users as up ON up.id = p.pres_professor
               LEFT JOIN series ON series.id = p.pres_serie
               $filtro
               $groupBy
               $orderBy"
        ));
        return $presenca;
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
    public function separa_datas($dateStart, $dateEnd)
    {
        $dateRange = array();
        $mes = 0;
        $dateStart     = new DateTime($dateStart);
        $dateEnd     = new DateTime($dateEnd);

        while ($dateStart <= $dateEnd) {
            $mes = $dateStart->format('m');
            $dateRange[] = $dateStart->format('Y-m-d');
            // if($dateStart->format('N') > 5 ){
            //   return 5;
            // }

            $dateStart = $dateStart->modify('+1day');
            //  if($dateEnd->format('m') !== $mes ){
            //   return 5;
            //  }            
        }
        return $dateRange;
    }
}
