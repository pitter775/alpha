<?php

namespace App\Http\Controllers;
use App\Models\Frente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDOException;


class FrenteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

      return view("pages.frente.index");
    }
    public function all()
    {        
        $frente = Frente::all();
        return json_encode($frente);
    }
    public function cadastro(Request $request){
        $id_geral = $request->input('id_geral'); 
        $mensagem = '';
        
        if($id_geral == ''){
            $tem = Frente::where('name', $request->input('name'))->get();
            if(!count($tem) == 0){return 'Erro, Já existe esse email cadastrado no sistema.';}
            $dados = new Frente();   
            $mensagem = 'novo';         
        }else{
            $dados = Frente::find($id_geral);
            $mensagem = 'editado'; 
        }        
        $dados->name = $request->input('name');
        
        
        $dados->save(); 
        if($mensagem == 'novo'){
            return $dados->id;
        }else{
            return $mensagem;
        }
        
    }
    public function delete($id){
        $deletar = Frente::find($id);
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
