<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\User;
use App\Models\Atendimento;
use Illuminate\Support\Facades\DB;
use PDOException;

class AtentimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $atendimento = Atendimento::all();
        return view('pages.atendimento.index', compact('atendimento'));
    }
    public function all()
    {
        $cardapio  = DB::table('cardapios AS c')
        ->leftjoin('series', 'c.series_id', 'series.id') 
        ->select('*', 'c.id AS id')
        ->get();

        return $cardapio;
    }
    public function novo()
    {
        $usuarios = User::where('use_perfil', 11)->orderBy('name', 'asc')->get();
        return view('pages.atendimento.modalAtendimento', compact('usuarios'));
    }


    public function cadastro(Request $request)
    {
        

        foreach($request->input('series_id') as  $value){ 
            $dados = new cardapio();
            $car_data = $request->input('car_data');
            if (isset($car_data)) {
                $car_data = $this->dateEmMysql($car_data);
                $dados->car_data = $car_data;
            } else {
                $dados->car_data = null;
            }
            $dados->car_cardapio =  $request->input('car_cardapio');;
            $dados->series_id = $value;
            $dados->save();
        }

        
            
        

        return 'ok';

    }
    public function delete($id)
    {
        $deletar = Cardapio::find($id);
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
