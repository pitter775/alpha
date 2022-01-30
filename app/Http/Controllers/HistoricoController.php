<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use App\Models\Alocacao;
use App\Models\Cargo;
use App\Models\Empresa;
use App\Models\Frente;
use App\Models\Setor;
use App\Models\Supervisao;
use App\Models\Tarifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class HistoricoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view("pages.historico.index");
    }
    public function user($id)
    {
        $historico =  DB::table('historicos AS u')
            ->leftjoin('historico_tipos', 'historico_tipos.id', '=', 'u.historico_tipos_id')
            ->select('*', 'u.id AS id', 'historico_tipos.name as tiponame')
            ->where('users_id', $id)
            ->get();
        return json_encode($historico);
    }

    public function gravar_dados($id_user, $tipo, $valor, $alteracao)
    {
        $add = true;
        $dadosHistory = new Historico();
        $dadosHistory->users_id =  $id_user;
        $dadosHistory->historico_tipos_id = $tipo;
        $dadosHistory->valor = $valor;
        $dadosHistory->data = $this->dateEmMysql($alteracao);
        $verificar = Historico::where('users_id', $id_user)->get();
        foreach ($verificar as $val) {
            if (
                $dadosHistory->valor == $val->valor &&
                $dadosHistory->historico_tipos_id == $val->historico_tipos_id &&
                $dadosHistory->data == $val->data
            ) {
                $add = false;
            }
        }
        if ($add) {
            $dadosHistory->save();
            return ['tipo' => $dadosHistory->historico_tipos_id, 'data' => $dadosHistory->data];
        }else{
            return null;
        }
    }

    public function cadastro($novo, $antigo)
    {
        //verificar dados diferentes e guardar
        //1-Nome 2-Email 3-Perfil 4-Status 5-Salario 6-Admissão 7-Tarifa 8-Supervisão 9-Setor 10-Alocação 11-Frente 12-Cargo 13-Regime 14-Empresa
        //devolver os valores cadastrados com a data da alteração
        $dados_gravados = [];

        if (isset($novo->all()['fullname'])) {
            $gravar = $this->gravar_dados($antigo->id, 1, $novo->all()['fullname'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }

        if (isset($novo->all()['status'])) {
            $valorstatus = '';
            if ($novo->all()['status'] == '1') {
                $valorstatus = 'Ativo';
            } else {
                $valorstatus = 'Inativo';
            }
            $gravar = $this->gravar_dados($antigo->id, 4, $valorstatus, $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['perfil'])) {
            $valorperfil = '';
            if ($novo->all()['perfil'] == '1') {
                $valorperfil = 'Usuario';
            }
            if ($novo->all()['perfil'] == '10') {
                $valorperfil = 'ADM';
            }
            $gravar = $this->gravar_dados($antigo->id, 3, $valorperfil, $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['empresa'])) {
            $valorDado = Empresa::where('id', $novo->all()['empresa'])->first()->name;
            $gravar = $this->gravar_dados($antigo->id, 14, $valorDado, $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['tarifa'])) {
            $valorDado = Tarifa::where('id', $novo->all()['tarifa'])->first()->name;
            $gravar = $this->gravar_dados($antigo->id, 7, $valorDado, $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['salario'])) {
            $gravar = $this->gravar_dados($antigo->id, 5, $novo->all()['salario'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        
        if (isset($novo->all()['regime'])) {
            $gravar = $this->gravar_dados($antigo->id, 13, $novo->all()['regime'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['cargo'])) {
            $gravar = $this->gravar_dados($antigo->id, 12, $novo->all()['cargo'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['frente'])) {
            $gravar = $this->gravar_dados($antigo->id, 11, $novo->all()['frente'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['alocacao'])) {
            $gravar = $this->gravar_dados($antigo->id, 10, $novo->all()['alocacao'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['setor'])) {
            $gravar = $this->gravar_dados($antigo->id, 9, $novo->all()['setor'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['supervisao'])) {
            $gravar = $this->gravar_dados($antigo->id, 8, $novo->all()['supervisao'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        if (isset($novo->all()['email'])) {
            $gravar = $this->gravar_dados($antigo->id, 2, $novo->all()['email'], $novo->all()['alteracao']);
            if($gravar){
                $dados_gravados[] =  $gravar;
            }
        }
        return  $dados_gravados;
    }
    public function delete($id)
    {
        $deletar = Historico::find($id);
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
        $ano = substr($dateSql, 6);
        $mes = substr($dateSql, 3, -5);
        $dia = substr($dateSql, 0, -8);
        return $ano . "-" . $mes . "-" . $dia;
    }
}
