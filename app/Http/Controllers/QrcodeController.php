<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\User;
use App\Models\Social;
use App\Models\Endereco;
use App\Models\Matricula;
use App\Models\Professore;
use App\Models\Responsavei;
use App\Models\Resp_autorizado;
use App\Models\Serie;
use App\Models\Presenca;
use App\Models\Saude_user;
use App\Models\Habitos_alimentare;
use App\Models\Observacao;
use App\Models\Alteracao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDOException;
use Dirape\Token\Token;

use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    public function index()
    {
        $users  = DB::table('users AS u')
        ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
        ->leftjoin('enderecos', 'enderecos.end_users_id', 'u.id')  
        ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')  
        ->leftjoin('series', 'matriculas.mat_series_id', 'series.id')  
        ->leftjoin('responsaveis', 'responsaveis.res_users_id', 'u.id') 
        ->leftjoin('saude_users', 'saude_users.sau_users_id', 'u.id')   
        ->leftjoin('habitos_alimentares', 'habitos_alimentares.hab_users_id', 'u.id')   
        
            ->select(
                '*',
                'u.id AS id'
            )
            ->orderBy('u.name', 'asc')
            ->where('u.use_perfil', 11)
            ->get();

        return view('pages.qrcode.index', compact('users'));
    }
    public function imprimirQrcode($id){
        $user  = DB::table('users AS u')
        ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
        ->leftjoin('enderecos', 'enderecos.end_users_id', 'u.id')  
        ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')  
        ->leftjoin('series', 'matriculas.mat_series_id', 'series.id')  
        ->leftjoin('responsaveis', 'responsaveis.res_users_id', 'u.id') 
        ->leftjoin('saude_users', 'saude_users.sau_users_id', 'u.id')   
        ->leftjoin('habitos_alimentares', 'habitos_alimentares.hab_users_id', 'u.id')   
        
            ->select(
                '*',
                'u.id AS id'
            )
            ->orderBy('u.name', 'asc')
            ->where('u.use_perfil', 11)
            ->where('u.id', $id)
            ->first();

        return view('pages.qrcode.imprimirqrcode', compact('user'));

    }
    public function imprimirTodosQrcode(){
        $users  = DB::table('users AS u')
        ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
        ->leftjoin('enderecos', 'enderecos.end_users_id', 'u.id')  
        ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')  
        ->leftjoin('series', 'matriculas.mat_series_id', 'series.id')  
        ->leftjoin('responsaveis', 'responsaveis.res_users_id', 'u.id') 
        ->leftjoin('saude_users', 'saude_users.sau_users_id', 'u.id')   
        ->leftjoin('habitos_alimentares', 'habitos_alimentares.hab_users_id', 'u.id')   
        
            ->select(
                '*',
                'u.id AS id'
            )
            ->orderBy('u.name', 'asc')
            ->where('u.use_perfil', 11)
            ->get();

        return view('pages.qrcode.imprimirTodosqrcode', compact('users'));

    }
}
