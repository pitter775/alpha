<?php

namespace App\Http\Controllers;

use App\Models\Aditivo;
use Illuminate\Http\Request;
use PDOException;

class AditivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all($id)
    {
        $aditivo = Aditivo::where('contratos_prestacao_servicos_id',$id)->get();
        return json_encode($aditivo);
    }
    public function cadastro(Request $request)
    {
        $id_pj = $request->input('id_pj');
        $mensagem = array();

        $dados = new Aditivo();
        $dados->valor_aditivo = $request->input('valor_aditivo');
        $dt_aditivo = $request->input('dt_aditivo');
        if (isset($dt_aditivo)) {
            $dt_aditivo = $this->dateEmMysql($dt_aditivo);
            $dados->dt_aditivo = $dt_aditivo;
        }
        $dados->contratos_prestacao_servicos_id = $id_pj;
        $dados->save();
        $mensagem['id-aditivo'] = $dados->id;

        return $mensagem;
    }
    public function delete($id)
    {
        $deletar = Aditivo::find($id);
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
