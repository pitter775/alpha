<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Closure;
use Illuminate\Http\Request;

class Acesso
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $pagina_atual = Route::getFacadeRoot()->current()->uri();
        $perfil = false;
        $urls = [];

        if(!isset(Auth::user()->use_perfil)){
            return redirect()->route('login');
        }

        if(Auth::user()->use_perfil == '10' || Auth::user()->use_perfil == '13' || Auth::user()->use_perfil == '14' || Auth::user()->use_perfil == '12'|| Auth::user()->use_perfil == '17'){ 
            $perfil = true;
        }
        if(Auth::user()->use_perfil == '12'){ 
            $urls = [
                'presenca/cadastro',  'serie/chamada/{id}' , 'presenca/lista',    
            ];
        }

        if(Auth::user()->perfil == '1' || Auth::user()->perfil == '0'){          
            $urls = [
                // 'storage/{filename}',
                // 'home','home/get_card',
                // 'meuscontratos','meuscontratos/add/{card}','meuscontratos/delete/{id}','meuscontratos/get_produtos/{id}','meuscontratos/cadastro',
                // 'horas','horas/add/{card}','horas/delete/{id}','horas/editar/{id}','horas/cadastro','horas/permissao_selecao','horas/delete/add_atv-0','horas/delete/remove_atv', 'horas/horasOk'             
            ];

        }        
        foreach($urls as $value){
            if($pagina_atual == $value){
                $perfil = true;
            }
        }
        if($perfil){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
