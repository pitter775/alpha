<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDOException;
use Dirape\Token\Token;

class EscolaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $professores  = DB::table('professores AS u')
            ->select('*', 'u.id AS id')
            ->leftjoin('series', 'u.prof_series_id', 'series.id')
            ->get();

        $alunos  = DB::table('users AS u')
            ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
            ->select(
                '*',
                'u.id AS id'
            )
            ->where('u.use_perfil', 11)
            ->where('u.use_status', 1)
            ->get();



        return view('pages.escola.index', compact('professores', 'alunos'));
    }
}
