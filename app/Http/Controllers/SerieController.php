<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;
use PDOException;

class SerieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.serie.index');
    }
    public function all()
    {        
        $serie = Serie::all();
        return json_encode($serie);
    }
    public function cadastro(Request $request){
        $id_geral = $request->input('id_geral'); 
        $mensagem = '';
        
        if($id_geral == ''){
            $tem = Serie::where('ser_nome', $request->input('ser_nome'))->get();
            if(!count($tem) == 0){return 'Erro, Já existe esse nome cadastrado no sistema.';}
            $dados = new serie();   
            $mensagem = 'novo';         
        }else{
            $dados = Serie::find($id_geral);
            $mensagem = 'editado'; 
        }        
        $dados->ser_escolas_id =  $request->input('ser_escolas_id');
        $dados->ser_nome = $request->input('ser_nome');
        $dados->ser_periodo = $request->input('ser_periodo');
        $dados->ser_apelido = $request->input('ser_apelido');
        
        
        $dados->save(); 
        if($mensagem == 'novo'){
            return $dados->id;
        }else{
            return $mensagem;
        }
        
    }
    public function delete($id){
        $deletar = Serie::find($id);
        if(isset($deletar)){
            try {
                $deletar->delete();
                return 'Ok';
            }catch (PDOException $e) {
                if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                    return 'Erro';
                }
            }
        }
    }
}
