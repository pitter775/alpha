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
    $tiporesidencia = $this->tiporesidencia();
    $saude = $this->saude();
    $professores = $this->professores();
    $alergicos = $this->alergicos();
    $especiais = $this->especiais();
    $sau_fala = $this->sau_fala();
    $sau_escuta = $this->sau_escuta();
    $remanejado = $this->remanejamento();
    $transferido = $this->transferido();
    $abandono = $this->abandono();
    return view("pages.dashboard.index", compact( 'abandono','transferido','remanejado', 'sau_escuta', 'sau_fala', 'especiais','alergicos','totalalunos','meninos','meninas','socio1e2','socio3e4','socio5e10',
    'sociomaisde10','allseries','tiporesidencia','saude','professores'));
  }

  public function alunos()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->select('u.id AS id')
         ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->where('u.use_perfil', 11)
         ->where('u.use_status', 1)
         ->count();

          return $users;
  }
  public function meninos()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->select('u.id AS id')
         ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->where('u.use_sexo', 'Masculino')
         ->where('u.use_status', 1)
         ->count();

          return $users;
  }
  public function meninas()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->select('u.id AS id')
         ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->where('u.use_sexo', 'Feminino')
         ->where('u.use_status', 1)
         ->count();

          return $users;
  }
  public function socio1e2()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', '1 a 2 salários')
         ->where('u.use_status', 1)
         ->count();

          return $users;
  }
  public function socio3e4()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', '3 a 4 salários')
         ->where('u.use_status', 1)
         ->count();

          return $users;
  }
  public function socio5e10()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', '5 a 10 salários')
         ->where('u.use_status', 1)
         ->count();

          return $users;
  }
  public function sociomaisde10()
  {
      // $users = User::all();
      $users  = DB::table('users AS u')
         ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
         ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->select('u.id AS id')
         ->where('socials.soc_renda_familiar', 'mais de 10 salários')
         ->where('u.use_perfil', 11)
         ->where('u.use_status', 1)
         ->count();

          return $users;
  }
  public function allseries()
  {
   $series = Serie::all();

          return $series;
  }

   public function tiporesidencia(){
         $tipores  = DB::table('users AS u')
         ->join('socials', 'socials.id', 'u.use_social_id')  
         //   ->leftjoin('matriculas as m', 'u.id', 'm.mat_users_id')  
         ->groupBy('socials.soc_tipo_residencia')
         ->selectRaw('socials.soc_tipo_residencia, count(*) as sum')
         ->where('u.use_perfil', 11)
         ->where('u.use_status', 1)
         ->get();

      return $tipores;
   }
   public function saude(){
      $saude  = DB::table('users AS u')
      ->leftjoin('saude_users', 'u.id', 'saude_users.sau_users_id')  
      ->groupBy('saude_users.sau_alergia')
         ->selectRaw('saude_users.sau_alergia, count(*) as sum')
         ->where('u.use_perfil', 11)
         ->where('u.use_status', 1)
         ->get();
      // ->where('u.use_perfil', 11)
      // ->where('saude_users.sau_alergia', 'Sim')
      // ->count();
      // dd($saude);

      return $saude;
   }
   public function alergicos(){
      $saude  = DB::table('users AS u')
      ->leftjoin('saude_users', 'u.id', 'saude_users.sau_users_id')  
      ->groupBy('saude_users.sau_alergia')
        ->selectRaw('saude_users.sau_alergia, count(*) as sum')
        ->where('u.use_perfil', 11)
        ->where('u.use_status', 1)
        ->get();

      return $saude;
   }
   public function especiais(){
      $saude  = DB::table('users AS u')
      ->leftjoin('saude_users', 'u.id', 'saude_users.sau_users_id')  
      ->groupBy('saude_users.sau_necessidades_especial')
        ->selectRaw('saude_users.sau_necessidades_especial, count(*) as sum')
        ->where('u.use_perfil', 11)
        ->where('u.use_status', 1)
        ->get();

      return $saude;
   }
   public function sau_fala(){
      $saude  = DB::table('users AS u')
      ->leftjoin('saude_users', 'u.id', 'saude_users.sau_users_id')  
      ->groupBy('saude_users.sau_fala')
        ->selectRaw('saude_users.sau_fala, count(*) as sum')
        ->where('u.use_perfil', 11)
        ->where('u.use_status', 1)
        ->get();

      return $saude;
   }
   public function sau_escuta(){
      $saude  = DB::table('users AS u')
      ->leftjoin('saude_users', 'u.id', 'saude_users.sau_users_id')  
      ->groupBy('saude_users.sau_escuta')
        ->selectRaw('saude_users.sau_escuta, count(*) as sum')
        ->where('u.use_perfil', 11)
        ->where('u.use_status', 1)
        ->get();

      return $saude;
   }
   public function remanejamento(){
      $saude  = DB::table('users AS u')
      ->leftjoin('alteracaos', 'u.id', 'alteracaos.alt_user')  
      ->where('u.use_perfil', 11)
      ->where('alteracaos.alt_tipo', 'Remanejamento')
      ->count();
      return $saude;
   }
   public function transferido(){
      $saude  = DB::table('users AS u')
      ->leftjoin('alteracaos', 'u.id', 'alteracaos.alt_user')  
      ->where('u.use_perfil', 11)
      ->where('alteracaos.alt_tipo', 'Transferência')
      ->count();
      return $saude;
   }
   public function abandono(){
      $saude  = DB::table('users AS u')
      ->leftjoin('alteracaos', 'u.id', 'alteracaos.alt_user')  
      ->where('u.use_perfil', 11)
      ->where('alteracaos.alt_tipo', 'Abandono')
      ->count();
      return $saude;
   }


   public function professores(){
      $prof  = DB::table('users AS u')
         ->join('professores', 'professores.prof_users_id', 'u.id')  
         ->groupBy('u.id')
         ->select('*')
         ->where('u.use_status', 1)
         ->get();

         // dd($prof);

         return $prof;
   }
}
