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

            if ($bt_salvar == 'conta') {
                // $dados->foto = $request->input('foto');
                $id_user = $id_geral;
                $image = $request->file('file');

                if( $request->input('temfoto') == 'naotem'){
                    $mensagem['existe-imagem4'] = 'nao tem mesmo'; 
                    $dados->use_foto = null;
                }else{
                    if (isset($image)) {
                        $mensagem['existe-imagem1'] = 'imagem ok';
                        $tipo = $image->extension();
                        $nameRef =  rand(0, time()) . time();
                        $imageName = $nameRef . '.' . $tipo;
                        $mensagem['existe-imagem2'] = $imageName;
                        $image->move(public_path('arquivos/' . $id_user), $imageName);

                        $dados->use_foto = $id_user . '/' . $nameRef . '.' . $tipo;
                        $mensagem['dados-gravados'] = $dados->use_foto;

                    }
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
