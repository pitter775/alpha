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
        $alimentares =  Schema::getColumnListing('habitos_alimentares');
        $alteracaos =  Schema::getColumnListing('alteracaos');
        $professores =  Schema::getColumnListing('professores');
        $responsaveis =  Schema::getColumnListing('resp_autorizados');
        $saude_users =  Schema::getColumnListing('saude_users');
        $series =  Schema::getColumnListing('series');
        $socials =  Schema::getColumnListing('socials');
        $users =  Schema::getColumnListing('users');
        $enderecos =  Schema::getColumnListing('enderecos');

        return view('pages.piloto.index', compact('alteracaos','alimentares', 'professores', 'responsaveis', 'saude_users', 'series', 'socials', 'users', 'enderecos'));
    }
    public function tabelaDash(Request $request)
    {

        $tabelas = array();
        $colunas = array();

        if(isset($request->users)){
            array_push($tabelas, "users");       
            foreach ($request->users as $a){                
                array_push($colunas, $a); 
            } 
             
        }
        if(isset($request->alteracaos)){
            array_push($tabelas, "alteracaos");       
            foreach ($request->alteracaos as $a){                
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
        if(isset($request->professores)){
            array_push($tabelas, "professores");       
            foreach ($request->professores as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->resp_autorizados)){
            array_push($tabelas, "resp_autorizados");       
            foreach ($request->resp_autorizados as  $a){
                array_push($colunas, $a); 
            }     
        }
        $titulo = $request->titulo;
        $condicao = $request->condicao;
        $condicaodetalhada = $request->condicaodetalhada;

        $tabArray = $this->filtros($tabelas, $colunas, $condicao, $condicaodetalhada);

        return view('pages.piloto.tab_piloto_dash', compact('tabArray','colunas','titulo'));
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
        if(isset($request->alteracaos)){
            array_push($tabelas, "alteracaos");       
            foreach ($request->alteracaos as $a){                
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
        if(isset($request->professores)){
            array_push($tabelas, "professores");       
            foreach ($request->professores as  $a){
                array_push($colunas, $a); 
            }     
        }
        if(isset($request->resp_autorizados)){
            array_push($tabelas, "resp_autorizados");       
            foreach ($request->resp_autorizados as  $a){
                array_push($colunas, $a); 
            }     
        }

        $tabArray = $this->filtros($tabelas, $colunas);

        return view('pages.piloto.tab_piloto', compact('tabArray','colunas'));
    }

    public function filtros($tabelas, $colunas, $condicao = null, $condicaodetalhada = null)
    {
        $join = '';
        $group = "GROUP BY u.id";
        $colunasTab = '';
        foreach ($colunas as $col){
            if($col != 'res_nome_pai'){
                $colunasTab .= ','.$col.' ';
            }
            
        }        
        $colunasTab = substr($colunasTab, 1);
        $join .= ' LEFT JOIN matriculas ON matriculas.mat_users_id = u.id';
        $join .= ' LEFT JOIN alteracaos ON alteracaos.alt_user = u.id';

        foreach($tabelas as $tab){
            
            if($tab == 'habitos_alimentares'){
                $join .= ' LEFT JOIN habitos_alimentares ON habitos_alimentares.hab_users_id = u.id';
            }
            if($tab == 'presencas'){
                $join .= ' LEFT JOIN presencas ON presencas.users_id = u.id';
            }
            if($tab == 'resp_autorizados'){
                $join .= ' LEFT JOIN resp_autorizados ON resp_autorizados.resp_users_id = u.id';
                $group = '';
            }
            if($tab == 'saude_users'){
                $join .= ' LEFT JOIN saude_users ON saude_users.sau_users_id = u.id';
            }
            if($tab == 'series'){
                // $join .= ' LEFT JOIN series ON series.id = alteracaos.alt_series';
                $join .= ' LEFT JOIN series ON series.id = matriculas.mat_series_id';
            }
            if($tab == 'socials'){
                $join .= ' LEFT JOIN socials ON socials.id = u.use_social_id';
            }
            if($tab == 'enderecos'){
                $join .= ' LEFT JOIN enderecos ON enderecos.end_users_id = u.id';
            }
            if($tab == 'professores'){
                $join .= ' LEFT JOIN professores ON professores.prof_users_id = u.id';
            }
            
          
           
        }      

        $filtro = 'where u.use_perfil = 11';

        //  dd($condicaodetalhada);
        

        switch ($condicao) {
            case 'sociomaisde10':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_renda_familiar = 'mais de 10 salários'";
                break;
            case 'socio5e10':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_renda_familiar = '5 a 10 salários'";
                break;
            case 'socio3e4':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_renda_familiar = '3 a 4 salários'";
                break;
            case 'socio1e2':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_renda_familiar = '1 a 2 salários'";
                break;
            case 'professores':
                $filtro = "where u.use_perfil = 12 and u.use_status = 1";
                break;
            case 'Sem definição':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_tipo_residencia is null";
                break;
            case 'Alugada':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_tipo_residencia = 'Alugada'";
                break;
            case 'Cedida':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_tipo_residencia = 'Cedida'";
                break;
            case 'Própria':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and socials.soc_tipo_residencia = 'Própria'";
                break;
            case 'naoalergico':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_alergia = 'Não'";
                break;
            case 'simalergico':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_alergia = 'Sim'";
                break;
            case 'nulllergico':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_alergia  is null";
                break;
            case 'condicaodetalhada':
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and series.ser_apelido = '$condicaodetalhada'";
                break;
            case 'especialnull':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_necessidades_especial is null";
                break;
            case 'especialsim':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_necessidades_especial = 'Sim'";
                break;
            case 'naofala':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_fala = 'Não'";
                break;
            case 'nullfala':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_fala  is null";
                break;
            case 'naoescuta':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_escuta  = 'Não'";
                break;
            case 'nullescuta':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and saude_users.sau_escuta  is null";
                break;
            case 'alunoremanejado':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 1 and alteracaos.alt_tipo  = 'Remanejamento'";
                break;
            case 'alunotransferido':                
                $filtro = "where u.use_perfil = 11 and alteracaos.alt_tipo  = 'Transferência'";
                break;
            case 'alunoabandono':                
                $filtro = "where u.use_perfil = 11 and alteracaos.alt_tipo  = 'Abandono'";
                break;
            case 'usertransport':                
                $filtro = "where u.use_perfil = 11 and u.use_transport_particular  = 'Sim'";
                break;
            case 'listaespera':                
                $filtro = "where u.use_perfil = 11 and u.use_status = 3 and resp_autorizados.resp_telefone is not null";
                $group = "GROUP BY u.id";
                break;
        }
       

        $tabela = DB::select(DB::raw(
            "SELECT u.id as userId, $colunasTab FROM users As u $join $filtro $group"
        ));

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
