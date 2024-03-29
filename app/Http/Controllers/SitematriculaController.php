<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Social;
use App\Models\Endereco;
use App\Models\Matricula;
use App\Models\Responsavei;
use App\Models\Resp_autorizado;
use App\Models\Saude_user;
use App\Models\Habitos_alimentare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDOException;
use Dirape\Token\Token;

class SitematriculaController extends Controller
{
    public function link(Request $request){
        $bt_salvar = $request->input("salvarDados");
        $mensagem = array();
        $token = (new Token())->Unique('users', 'token', 60);
 

        if ($bt_salvar == 'linkEmail') {
            $mensagem['tipo-geral'] = 'link matricula';
            $mensagem['email'] = $request->input("email");

            $tem = User::where('email', $request->input('email'))->get();
            if (!count($tem) == 0) {    
                if($tem[0]->token){
                    $mensagem['tipo-matricula'] = 'Matricula em andamento';
                    $token = $tem[0]->token;
                }else{
                    $mensagem['tipo-erro'] = 'Esse emal já tem no sistema, e não pode ser usado para criar matrícula';
                    $token = '';
                }
                
            }else{
                //cadastrar novo usuario autenticado
                //cadastrar novo usuario aluno
                //cadastrar nova matricula

                //enviar link com cadastro novo
                $mensagem['tipo-matricula'] ='Novo usuario, nova matricula';

                //usuario autenticado
                $dados_aut = new User();
                $dados_aut->email = $request->input('email');
                $dados_aut->use_perfil = 16;
                $dados_aut->token = $token;
                $dados_aut->save();

                //usuario aluno
                $dados_alu = new User();
                $dados_alu->use_perfil = 11;
                $dados_alu->use_status = 3; // matricula pelo site sem iniciar
                $dados_alu->token = $token;
                $dados_alu->save();

                //matricula aluno
                $dados_mat = new Matricula;
                $dados_mat->mat_token = $token;
                $dados_mat->mat_users_id = $dados_alu->id;
                $dados_mat->save();
            }

    
            $mensagem['tipo-token'] = $token; 

            
            return $mensagem;
        }
    }
    public function telamatricula($token){

        //user e trazer o tekien
        $user  = DB::table('matriculas AS mat')         
            ->leftjoin('users', 'users.id', 'mat.mat_users_id')  
            ->leftjoin('socials', 'socials.id', 'users.use_social_id')  
            ->leftjoin('enderecos', 'enderecos.end_users_id', 'users.id')
            ->leftjoin('responsaveis', 'responsaveis.res_users_id', 'users.id')  
            ->leftjoin('saude_users', 'saude_users.sau_users_id', 'users.id')  
            ->leftjoin('habitos_alimentares', 'habitos_alimentares.hab_users_id', 'users.id')  
            ->select('*','users.id AS id')
            ->where('mat.mat_token', $token)
            ->first();
          
    
        return view('pages.site.matricula_tela', compact('user'));
    }
    public function getuser($id){
        $user  = DB::table('users AS u')         
        ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')  
        ->leftjoin('socials', 'socials.id', 'u.use_social_id')  
        ->leftjoin('enderecos', 'enderecos.end_users_id', 'u.id')
        ->leftjoin('responsaveis', 'responsaveis.res_users_id', 'u.id')  
        ->leftjoin('saude_users', 'saude_users.sau_users_id', 'u.id')  
        ->leftjoin('habitos_alimentares', 'habitos_alimentares.hab_users_id', 'u.id')  
        ->select('*','u.id AS id')
        ->where('u.id', $id)
        ->first();
        return view('pages.site.getuser', compact('user'));
    }
    // public function responsavel(){
    //     $temResp = Responsavei::all();

    //     foreach($temResp as $val){

    //         if($val->res_nome_pai){
    //             $resp = new Resp_autorizado();
    //             $resp->resp_nome = $val->res_nome_pai;
    //             $resp->resp_telefone = $val->res_telefone_pai;
    //             $resp->resp_profissao = $val->res_profissao_pai;
    //             $resp->resp_autorizacao = 1;
    //             $resp->resp_users_id = $val->res_users_id;
    //             $resp->resp_parentesco = "Pai";
    //             $resp->save();
    //         }
    //         if($val->res_nome_mae){
    //             $resp = new Resp_autorizado();
    //             $resp->resp_nome = $val->res_nome_mae;
    //             $resp->resp_telefone = $val->res_telefone_mae;
    //             $resp->resp_profissao = $val->res_profissao_mae;
    //             $resp->resp_autorizacao = 1;
    //             $resp->resp_parentesco = "Mãe";
    //             $resp->resp_users_id = $val->res_users_id;
    //             $resp->save();
    //         }

    //     }

    // }
    public function cadastro(Request $request)
    {

        $id_geral = $request->input('id_geral');
        $bt_salvar = $request->input("salvarDados");
        $token = (new Token())->Unique('users', 'token', 60);
        $matriculas_id = null;
        $mensagem = array();

        if ($id_geral == '') {
            $dados = new User();
            $mensagem['tipo-geral'] = 'novo';
            $dados->name = $request->input('fullname');
        } else {
            $dados = User::find($id_geral);
            $mensagem['tipo-geral'] = 'editado';
            $mensagem['inputtemfoto'] = $request->input('temfoto');
            if($dados->use_perfil == 11){
                $idmatricula = Matricula::where('mat_users_id', $id_geral)->first();
                $matriculas_id = $idmatricula->id;
            }

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
                        $image->move(public_path('/arquivos/' . $id_user), $imageName);

                        $dados->use_foto = $id_user . '/' . $nameRef . '.' . $tipo;
                        $mensagem['dados-gravados'] = $dados->use_foto;

                    }
                }
                $mensagem['pegando1'] = 'nome e email'; 
                $dados->name = $request->input('fullname');
           
                $mensagem['pegando2'] = 'ok 2'; 
            }
            if ($bt_salvar == 'informacoes') {
                $use_dt_nascimento = $request->input('use_dt_nascimento');
                if (isset($use_dt_nascimento)) {
                    $use_dt_nascimento = $this->dateEmMysql($use_dt_nascimento);
                    $dados->use_dt_nascimento = $use_dt_nascimento;
                } else {
                    $dados->use_dt_nascimento = null;
                }                
                $dados->use_rg = $request->input('rg');                
                $dados->use_cpf = $request->input('cpf');
                $dados->use_sexo = $request->input('use_sexo');
                $dados->use_cor_pele = $request->input('use_cor_pele');
                $dados->use_regiao_nascimento = $request->input('use_regiao_nascimento');

                //Inicio  add/update Socio Economico
                $TemSocial = $dados->use_social_id;
                if (isset($TemSocial)) {
                    $dadosSocial = Social::find($TemSocial);
                } else {
                    $dadosSocial = new Social();
                }
                $dadosSocial->soc_tipo_residencia = $request->input('soc_tipo_residencia');
                $dadosSocial->soc_residencia_comodos = $request->input('soc_residencia_comodos');
                $dadosSocial->soc_residentes = $request->input('soc_residentes');
                $dadosSocial->soc_agua_encanada = $request->input('soc_agua_encanada');
                $dadosSocial->soc_esgoto = $request->input('soc_esgoto');
                $dadosSocial->soc_fossa = $request->input('soc_fossa');
                $dadosSocial->soc_luz_eletrica = $request->input('soc_luz_eletrica');
                $dadosSocial->soc_internet = $request->input('soc_internet');
                $dadosSocial->soc_computador = $request->input('soc_computador');
                $dadosSocial->soc_veiculo = $request->input('soc_veiculo');
                $dadosSocial->soc_renda_familiar = $request->input('soc_renda_familiar');
                $dadosSocial->save();
                $social_id = $dadosSocial->id;
                if (isset($social_id)) {
                    $dados->use_social_id = $social_id;
                }
            }   
            if ($bt_salvar == 'endereco') {

                $mensagem['dados-endereco'] = 'entrou';
                $mensagem['dados-id_geral'] = $id_geral;
              
                
                $temEnd = Endereco::where('end_users_id', $id_geral)->get();
                if (!count($temEnd) == 0) {
                    $dados_end = Endereco::find($temEnd[0]->id);
                    $mensagem['dados-endereco'] = 'ja tem editando ';
                }else{
                    $dados_end = new Endereco();
                    $mensagem['dados-endereco'] = 'novo endereco ';
                }
                $dados_end->end_rua = $request->input('end_rua');
                $dados_end->end_numero = $request->input('end_numero');
                $dados_end->end_complemento = $request->input('end_complemento');
                $dados_end->end_cep = $request->input('end_cep');
                $dados_end->end_cidade = $request->input('end_cidade');
                $dados_end->end_estado = $request->input('end_estado');
                $dados_end->end_pais = $request->input('end_pais');
                $dados_end->end_users_id = $id_geral;
                $dados_end->save();               
            }    
            if ($bt_salvar == 'responsavel') {

                $mensagem['dados-responsavel'] = 'entrou';  

                $temResp = Responsavei::where('res_users_id', $id_geral)->get();
                if (!count($temResp) == 0) {
                    $dados_mat = Responsavei::find($temResp[0]->id);
                    $mensagem['dados-responsavel'] = 'ja tem editando ';
                }else{
                    $dados_mat = new Responsavei();
                    $mensagem['dados-responsavel'] = 'novo responsavel ';
                }

                // $dados_mat->res_matriculas_id = $matriculas_id;
                $dados_mat->res_users_id = $id_geral;
                $dados_mat->res_nome_pai = $request->input('res_nome_pai');
                $dados_mat->res_telefone_pai = $request->input('res_telefone_pai');
                $dados_mat->res_profissao_pai = $request->input('res_profissao_pai');
                $dados_mat->res_nome_mae = $request->input('res_nome_mae');
                $dados_mat->res_telefone_mae = $request->input('res_telefone_mae');
                $dados_mat->res_profissao_mae = $request->input('res_profissao_mae');
                $dados_mat->res_nome_res = $request->input('res_nome_res');
                $dados_mat->res_res_telefone = $request->input('res_res_telefone');
                $dados_mat->res_res_profissao = $request->input('res_res_profissao');
                $dados_mat->save();               
            }    
            if ($bt_salvar == 'saude') {

                $mensagem['dados-saude'] = 'entrou';            
                $temSaude = Saude_user::where('sau_users_id', $id_geral)->get();
                if (!count($temSaude) == 0) {
                    $dados_sau = Saude_user::find($temSaude[0]->id);
                    $mensagem['dados-saude'] = 'ja tem editando saude ';
                }else{
                    $dados_sau = new Saude_user();
                    $mensagem['dados-saude'] = 'novo saude ';
                }

                $dados_sau->sau_users_id = $id_geral;
                $dados_sau->sau_sarampo = $request->input('sau_sarampo');
                $dados_sau->sau_caxumba = $request->input('sau_caxumba');
                $dados_sau->sau_coqueluche = $request->input('sau_coqueluche');
                $dados_sau->sau_catapora = $request->input('sau_catapora');
                $dados_sau->sau_rubeola = $request->input('sau_rubeola');
                $dados_sau->sau_hepatite = $request->input('sau_hepatite');
                $dados_sau->sau_bronquite = $request->input('sau_bronquite');
                $dados_sau->sau_asma = $request->input('sau_asma');
                $dados_sau->sau_anemia = $request->input('sau_anemia');
                $dados_sau->sau_menigite = $request->input('sau_menigite');
                $dados_sau->sau_outras = $request->input('sau_outras');
                $dados_sau->sau_parto = $request->input('sau_parto');
                $dados_sau->sau_parto_complicacoes = $request->input('sau_parto_complicacoes');
                $dados_sau->sau_alergia = $request->input('sau_alergia');
                $dados_sau->sau_alergia_detalhe = $request->input('sau_alergia_detalhe');
                $dados_sau->sau_intolerancia_lactose = $request->input('sau_intolerancia_lactose');
                $dados_sau->sau_intolerancia_glutem = $request->input('sau_intolerancia_glutem');
                $dados_sau->sau_alergia_medicamentos = $request->input('sau_alergia_medicamentos');
                $dados_sau->sau_intolerancia_outros = $request->input('sau_intolerancia_outros');
                $dados_sau->sau_benzetacil = $request->input('sau_benzetacil');
                $dados_sau->sau_benzetacil_motivo = $request->input('sau_benzetacil_motivo');
                $dados_sau->sau_convulsoes = $request->input('sau_convulsoes');
                $dados_sau->sau_convulsoes_motivo = $request->input('sau_convulsoes_motivo');
                $dados_sau->sau_desmaios = $request->input('sau_desmaios');
                $dados_sau->sau_diarreia_frequente = $request->input('sau_diarreia_frequente');
                $dados_sau->sau_resfriado_frequente = $request->input('sau_resfriado_frequente');
                $dados_sau->sau_infeccao_ouvido = $request->input('sau_infeccao_ouvido');
                $dados_sau->sau_cirurgia = $request->input('sau_cirurgia');
                $dados_sau->sau_cirurgia_motivo = $request->input('sau_cirurgia_motivo');
                $dados_sau->sau_internado = $request->input('sau_internado');
                $dados_sau->sau_internado_motivo = $request->input('sau_internado_motivo');
                $dados_sau->sau_tratamento = $request->input('sau_tratamento');
                $dados_sau->sau_tratamento_motivo = $request->input('sau_tratamento_motivo');
                $dados_sau->sau_medicamento = $request->input('sau_medicamento');
                $dados_sau->sau_medicamento_qual = $request->input('sau_medicamento_qual');
                $dados_sau->sau_enxerga = $request->input('sau_enxerga');
                $dados_sau->sau_escuta = $request->input('sau_escuta');
                $dados_sau->sau_fala = $request->input('sau_fala');
                $dados_sau->sau_xixi_cama = $request->input('sau_xixi_cama');
                $dados_sau->sau_descricao_saude = $request->input('sau_descricao_saude');
                $dados_sau->sau_animais = $request->input('sau_animais');
                $dados_sau->sau_animais_qual = $request->input('sau_animais_qual');
                $dados_sau->save();               
            }     
            if ($bt_salvar == 'alimentares') {

                $mensagem['dados-alimentares'] = 'entrou';            
                $temAlim = Habitos_alimentare::where('hab_users_id', $id_geral)->get();
                if (!count($temAlim) == 0) {
                    $dados_alime = Habitos_alimentare::find($temAlim[0]->id);
                    $mensagem['dados-saude'] = 'ja tem editando alimentares ';
                }else{
                    $dados_alime = new Habitos_alimentare();
                    $mensagem['dados-alimentares'] = 'novo alimentares ';
                }

                $dados_alime->hab_users_id = $id_geral;
                $dados_alime->hab_leite = $request->input('hab_leite');
                $dados_alime->hab_queijo = $request->input('hab_queijo');
                $dados_alime->hab_yakult = $request->input('hab_yakult');
                $dados_alime->hab_bolacha = $request->input('hab_bolacha');
                $dados_alime->hab_canes = $request->input('hab_canes');
                $dados_alime->hab_salsicha = $request->input('hab_salsicha');
                $dados_alime->hab_verduras_legumes = $request->input('hab_verduras_legumes');
                $dados_alime->hab_arroz_feijao_graos = $request->input('hab_arroz_feijao_graos');
                $dados_alime->hab_macarrao_molho = $request->input('hab_macarrao_molho');
                $dados_alime->hab_frutas = $request->input('hab_frutas');
                $dados_alime->hab_peixe = $request->input('hab_peixe');
                $dados_alime->hab_salgadinhos_doces = $request->input('hab_salgadinhos_doces');
                $dados_alime->hab_macarrao_instantaneo = $request->input('hab_macarrao_instantaneo');
                $dados_alime->hab_figado_miudos = $request->input('hab_figado_miudos');
                $dados_alime->hab_danone = $request->input('hab_danone');
                $dados_alime->hab_chocolate = $request->input('hab_chocolate');
                $dados_alime->hab_ovos = $request->input('hab_ovos');
                $dados_alime->save();               
            }     

        }
        

        $dados->save();
        $mensagem['gravados'] = 'tudo ok';
        $mensagem['perfil-da'] = $dados->use_perfil;
        
        if ($mensagem['tipo-geral'] == 'novo') {
            $mensagem['id-geral'] = $dados->id;
            if($dados->use_perfil == 11){
                $mensagem['perfil'] = '11';// aluno;                
                //cadastrar matricula
                $dados_matricula = new Matricula();
                $dados_matricula->mat_users_id = $dados->id;
                $dados_matricula->mat_escolas_id = 1; 
                $dados_matricula->mat_token = $token; 
                $dados_matricula->save();    
            }
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
