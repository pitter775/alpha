<?php

namespace App\Http\Controllers;
use App\Models\cardapio;
use App\Models\Presenca;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDOException;



class PilotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $matriculas =  Schema::getColumnListing('matriculas');
        $alimentares =  Schema::getColumnListing('habitos_alimentares');
        $professores =  Schema::getColumnListing('professores');
        $responsaveis =  Schema::getColumnListing('resp_autorizados');
        $saude_users =  Schema::getColumnListing('saude_users');
        $series =  Schema::getColumnListing('series');
        $socials =  Schema::getColumnListing('socials');
        $users =  Schema::getColumnListing('users');
        $enderecos =  Schema::getColumnListing('enderecos');

        return view('pages.piloto.index', compact('matriculas','alimentares', 'professores', 'responsaveis', 'saude_users', 'series', 'socials', 'users', 'enderecos'));
    }
    public function tabela(Request $request)
    {
        $tabelas = array();
        $colunas = array();

        if(isset($request->users)){
            array_push($tabelas, "users");       
            foreach ($request->users as $a){                
                array_push($colunas, $a); 
            } 
             
        }
        if(isset($request->matriculas)){
            array_push($tabelas, "matriculas");  
            foreach ($request->matriculas as $a){
                array_push($colunas, $a); 
            }          
        }
        if(isset($request->habitos_alimentares)){
            array_push($tabelas, "habitos_alimentares");       
            foreach ($request->habitos_alimentares as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->presencas)){
            array_push($tabelas, "presencas");       
            foreach ($request->presencas as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->responsaveis)){
            array_push($tabelas, "resp_autorizados");       
            foreach ($request->responsaveis as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->saude_users)){
            array_push($tabelas, "saude_users");       
            foreach ($request->saude_users as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->series)){
            array_push($tabelas, "series");       
            foreach ($request->series as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->socials)){
            array_push($tabelas, "socials");       
            foreach ($request->socials as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->enderecos)){
            array_push($tabelas, "enderecos");       
            foreach ($request->enderecos as  $a){
                array_push($colunas, $a); 
            }     
        }

        $tabArray = $this->filtros($tabelas, $colunas);

        return view('pages.piloto.tab_piloto', compact('tabArray','colunas'));
    }

    public function filtros($tabelas, $colunas)
    {
        $join = '';
        $colunasTab = '';
        foreach ($colunas as $col){
            if($col != 'res_nome_pai'){
                $colunasTab .= ','.$col.' ';
            }
            
        }        
        $colunasTab = substr($colunasTab, 1);
        $join .= ' LEFT JOIN matriculas ON matriculas.mat_users_id = u.id';

        foreach($tabelas as $tab){
            
            if($tab == 'habitos_alimentares'){
                $join .= ' LEFT JOIN habitos_alimentares ON habitos_alimentares.hab_users_id = u.id';
            }
            if($tab == 'presencas'){
                $join .= ' LEFT JOIN presencas ON presencas.users_id = u.id';
            }
            if($tab == 'resp_autorizados'){
                $join .= ' LEFT JOIN resp_autorizados ON resp_autorizados.resp_users_id = u.id';
            }
            if($tab == 'saude_users'){
                $join .= ' LEFT JOIN saude_users ON saude_users.sau_users_id = u.id';
            }
            if($tab == 'series'){
                $join .= ' LEFT JOIN series ON series.id = matriculas.mat_series_id';
            }
            if($tab == 'socials'){
                $join .= ' LEFT JOIN socials ON socials.id = u.use_social_id';
            }
            if($tab == 'enderecos'){
                $join .= ' LEFT JOIN enderecos ON enderecos.end_users_id = u.id';
            }
        }      

        $tabela = DB::select(DB::raw(
            "SELECT $colunasTab, (SELECT resp_autorizados.resp_nome from resp_autorizados limit 1) as res_nome_pai
            FROM users As u $join where u.use_perfil = 11"
        ));

        // dd($tabela);
        return $tabela;
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
