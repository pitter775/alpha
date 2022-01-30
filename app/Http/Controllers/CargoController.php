<?php

namespace App\Http\Controllers;
use App\Models\Cargo;
use Illuminate\Http\Request;
use PDOException;

class CargoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
      return view("pages.cargo.index");
    }
    public function all()
    {        
        $cargo = Cargo::all();
        return json_encode($cargo);
    }
    public function cadastro(Request $request){
        $id_geral = $request->input('id_geral'); 
        $mensagem = '';
        
        if($id_geral == ''){
            $tem = Cargo::where('name', $request->input('name'))->get();
            if(!count($tem) == 0){return 'Erro, Já existe esse email cadastrado no sistema.';}
            $dados = new Cargo();   
            $mensagem = 'novo';         
        }else{
            $dados = Cargo::find($id_geral);
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
        $deletar = Cargo::find($id);
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
