<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Serie;
use PDOException;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index(){
    $totalalunos = $this->alunos();
    $meninos = $this->meninos();
    $meninas = $this->meninas();
    $socio1e2 = $this->socio1e2();
    $socio3e4 = $this->socio3e4();
    $socio5e10 = $this->socio5e10();
    $sociomaisde10 = $this->sociomaisde10();
    $allseries = $this->allseries();
    return view("pages.dashboard.index", compact('totalalunos','meninos','meninas','socio1e2','socio3e4','socio5e10','sociomaisde10','allseries'));
  }

  public function alunos()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->select('u.id AS id')
         ->where('u.use_perfil', 11)
         ->count();

          return $users;
  }
  public function meninos()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->select('u.id AS id')
         ->where('u.use_sexo', 'Masculino')
         ->count();

          return $users;
  }
  public function meninas()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->select('u.id AS id')
         ->where('u.use_sexo', 'Fenimino')
         ->count();

          return $users;
  }
  public function socio1e2()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', '1 a 2 salários')
         ->count();

          return $users;
  }
  public function socio3e4()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', '3 a 4 salários')
         ->count();

          return $users;
  }
  public function socio5e10()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', '5 a 10 salários')
         ->count();

          return $users;
  }
  public function sociomaisde10()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', 'mais de 10 salários')
         ->count();

          return $users;
  }
  public function allseries()
  {
   $series = Serie::all();

          return $series;
  }

  public function tiporesidencia(){
   $tipores = DB::table('useres AS u')
   ->join('periodos', 'periodos.id', 'u.periodos_id')
   ->join('contratos', 'contratos.id', 'u.contratos_id')
   ->join('produtos', 'produtos.id', 'u.produtos_id')
   ->join('atividades', 'atividades.id', 'u.atividades_id')
   ->select('*', DB::raw('sum( time_to_sec (u.horas)) as horas'), 'u.id As id','atividades.atdescricao','u.atividades_id' )
   ->whereYear('periodos.datainicio', '=', $data_ano)
   ->whereMonth('periodos.datainicio', '=', $data_mes)
   ->orderBy('atividades.atdescricao', 'asc')
   ->groupBy('u.atividades_id')
   ->where([['u.users_id', $user]])
   ->get();
   return $tipores;
  }
}
