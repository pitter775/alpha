<?php

namespace App\Http\Controllers;

use App\Models\cardapio;
use App\Models\Presenca;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;


class CardapioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $series = Serie::all();
        return view('pages.cardapio.index', compact('series'));
    }
    public function all()
    {
        $cardapio  = DB::table('cardapios AS c')
        ->leftjoin('series', 'c.series_id', 'series.id') 
        ->select('*', 'c.id AS id')
        ->get();

        return $cardapio;
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
