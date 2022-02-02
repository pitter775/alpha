<?php

namespace App\Http\Controllers;

use App\Models\Aditivo;
use App\Models\User;
use App\Models\Alocacao;
use App\Models\Cargo;
use App\Models\Celetista;
use App\Models\Empresa;
use App\Models\Frente;
use App\Models\Historico;
use App\Models\Contratos_prestacao_servico;
use App\Models\Regime;
use App\Models\Setor;
use App\Models\Supervisao;
use App\Models\Tarifa;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDOException;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.usuario.index');
    }
    public function all()
    {
        // $users = User::all();
        $users  = DB::table('users AS u')
            ->select('*')
            ->get();

        //dd($users);
        return json_encode($users);
    }
    public function detalhe($id)
    {
        $user  = DB::table('users AS u')
            ->select('*', 'u.id AS id', 'u.name as name')
            ->where('u.id', $id)
            ->first();

        return view('pages.usuario.detalhe', compact('user'));
    }
    public function getuser($id)
    {
        $user  = DB::table('users AS u')
           
            ->select(
                '*',
                'u.id AS id',
                'u.name as name'
                
            )
            ->where('u.id', $id)
            ->first();
        return view('pages.usuario.getuser', compact('user'));
    }
    public function cadastro(Request $request)
    {

        $id_geral = $request->input('id_geral');
        $bt_salvar = $request->input("salvarDados");
        $mensagem = array();

        if ($id_geral == '') {
            $tem = User::where('email', $request->input('email'))->get();
            if (!count($tem) == 0) {
                return 'Erro, Já existe esse email cadastrado no sistema.';
            }
            $dados = new User();
            $mensagem['tipo-geral'] = 'novo';
            $dados->name = $request->input('fullname');
            $dados->email = $request->input('email');
        } else {
            $dados = User::find($id_geral);
            $mensagem['tipo-geral'] = 'editado';
            // $addHistorico = app('App\Http\Controllers\HistoricoController')->cadastro($request, $dados);

            if ($bt_salvar == 'conta') {
                // $dados->foto = $request->input('foto');
                $id_user = $id_geral;
                $image = $request->file('file');

                if (isset($image)) {
                    $tipo = $image->extension();
                    $nameRef =  rand(0, time()) . time();
                    $imageName = $nameRef . '.' . $tipo;
                    $image->move(public_path('arquivos/' . $id_user), $imageName);
                    $dados->use_foto = $id_user . '/' . $nameRef . '.' . $tipo;
                }else{
                    $dados->use_foto = null;
                }
                $dados->name = $request->input('fullname');
                $dados->email = $request->input('email');

                $perfil = $request->input('perfil');
                $password = $request->input('senha');
                if (isset($password)) {
                    if ($password !== '') {
                        $dados->password = Hash::make($request->input('senha'));
                    }
                }
                if (isset($perfil)) {
                    if ($perfil !== '') {
                        $dados->use_perfil = $request->input('perfil');
                    }
                }
            }

            if ($bt_salvar == 'informacoes') {
                $use_dt_nascimento = $request->input('dt_nascimento');
                if (isset($dt_nascimento)) {
                    $use_dt_nascimento = $this->dateEmMysql($dt_nascimento);
                    $dados->use_dt_nascimento = $dt_nascimento;
                } else {
                    $dados->use_dt_nascimento = null;
                }
                $dados->use_telefone = $request->input('telefone');
                
                $dados->use_rg = $request->input('rg');
                $dados->use_cpf = $request->input('cpf');
                $dados->use_sexo = $request->input('sexo');
                //Inicio  Endereço
                $temEnd = $dados->enderecos_id;
                if (isset($temEnd)) {
                    $dadosEnd = Endereco::find($temEnd);
                } else {
                    $dadosEnd = new Endereco();
                }
                $dadosEnd->end_rua = $request->input('rua');
                $dadosEnd->end_numero = $request->input('numero');
                $dadosEnd->end_complemento = $request->input('complemento');
                $dadosEnd->end_cep = $request->input('cep');
                $dadosEnd->end_cidade = $request->input('cidade');
                $dadosEnd->end_estado = $request->input('estado');
                $dadosEnd->save();
                $enderecos_id = $dadosEnd->id;
                if (isset($enderecos_id)) {
                    $dados->enderecos_id = $enderecos_id;
                }
            }

            // if ($bt_salvar == 'controle') {
            //     $dt_mob_sabesp = $request->input('dt_mob_sabesp');
            //     if (isset($dt_mob_sabesp)) {
            //         $dt_mob_sabesp = $this->dateEmMysql($dt_mob_sabesp);
            //         $dados->dt_mob_sabesp = $dt_mob_sabesp;
            //     } else {
            //         $dados->dt_mob_sabesp = null;
            //     }
            //     $dt_desmob_sabesp = $request->input('dt_desmob_sabesp');
            //     if (isset($dt_desmob_sabesp)) {
            //         $dt_desmob_sabesp = $this->dateEmMysql($dt_desmob_sabesp);
            //         $dados->dt_desmob_sabesp = $dt_desmob_sabesp;
            //     } else {
            //         $dados->dt_desmob_sabesp = null;
            //     }



            //     $regime = $request->input('regime');
            //     // Cadastro de empresa
            //     if ($regime == 'Prestador de Serviço') {
            //         $prestador = $dados->contratos_prestacao_servicos_id;
            //         if (isset($prestador)) {
            //             $dadosEmpresa = Contratos_prestacao_servico::find($prestador);
            //             $mensagem['tipo-pj'] = 'editado';
            //         } else {
            //             $dadosEmpresa = new Contratos_prestacao_servico();
            //             $mensagem['tipo-pj'] = 'novo';
            //         }
            //         $dadosEmpresa->nome_fantasia = $request->input('nome_fantasia');
            //         $dadosEmpresa->representante = $request->input('representante');
            //         $dadosEmpresa->cnpj = $request->input('cnpj');
            //         $dt_prest_inicio = $request->input('dt_prest_inicio');
            //         if (isset($dt_prest_inicio)) {
            //             $dt_prest_inicio = $this->dateEmMysql($dt_prest_inicio);
            //             $dadosEmpresa->dt_prest_inicio = $dt_prest_inicio;
            //         } else {
            //             $dadosEmpresa->dt_prest_inicio = null;
            //         }
            //         $dt_prest_fim = $request->input('dt_prest_fim');
            //         if (isset($dt_prest_fim)) {
            //             $dt_prest_fim = $this->dateEmMysql($dt_prest_fim);
            //             $dadosEmpresa->dt_prest_fim = $dt_prest_fim;
            //         } else {
            //             $dadosEmpresa->dt_prest_fim = null;
            //         }

            //         $dadosEmpresa->save();
            //         $mensagem['id-pj'] = $dadosEmpresa->id;
            //         $dados->contratos_prestacao_servicos_id = $dadosEmpresa->id;
            //     }
            //     if ($regime == 'Celetista') {
            //         $celetista = $dados->celetistas_id;
            //         if (isset($celetista)) {
            //             $dadosCeletista = Celetista::find($celetista);
            //             $mensagem['tipo-celetista'] = 'editado';
            //         } else {
            //             $dadosCeletista = new Celetista();
            //             $mensagem['tipo-celetista'] = 'novo';
            //         }

            //         $dadosCeletista->ordem_servico = $request->input('ordem_servico');
            //         $dt_aso_inicial = $request->input('dt_aso_inicial');
            //         if (isset($dt_aso_inicial)) {
            //             $dt_aso_inicial = $this->dateEmMysql($dt_aso_inicial);
            //             $dadosCeletista->dt_aso_inicial = $dt_aso_inicial;
            //         } else {
            //             $dadosCeletista->dt_aso_inicial = null;
            //         }

            //         $dt_aso_demissional = $request->input('dt_aso_demissional');
            //         if (isset($dt_aso_demissional)) {
            //             $dt_aso_demissional = $this->dateEmMysql($dt_aso_demissional);
            //             $dadosCeletista->dt_aso_demissional = $dt_aso_demissional;
            //         } else {
            //             $dadosCeletista->dt_aso_demissional = null;
            //         }
            //         $dadosCeletista->save();
            //         $mensagem['id-celetista'] = $dadosCeletista->id;
            //         $dados->celetistas_id = $dadosCeletista->id;
            //     }
            // }

        }

        $dados->save();
        if ($mensagem['tipo-geral'] == 'novo') {
            $mensagem['id-geral'] = $dados->id;
        }

        return $mensagem;
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

    public function delete($id)
    {
        $deletar = User::find($id);
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
}
