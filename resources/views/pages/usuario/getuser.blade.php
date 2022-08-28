<?php
$perfil = '';
switch ($user->use_perfil) {
   case 1:
      $perfil = 'Sem acesso ao sistema';
      break;
   case 10:
      $perfil = 'Administrador';
      break;
}

?>
<style>
   .icongetuser {
      color: #66619c;
      margin-right: 10px
   }
</style>
<div class="card">
   <div class="card-body">
      <div class="user-avatar-section">
         <div class="d-flex align-items-center flex-column">
            @if($user->use_foto == null)
            <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" class="img-fluid rounded mt-3 mb-2"  width="120" alt="avatar" />

            @endif
            @if($user->use_foto !== null)
            <img src="{{asset('arquivos').'/'.$user->use_foto}}" class="img-fluid rounded mt-3 mb-2"  width="200" alt="avatar" />

            @endif
            <div class="user-info text-center">
               <h4> {{$user->name}}</h4>
               @if($user->use_status == 1)
               <span class="badge bg-light-success">Ativo</span>
               @endif
               @if($user->use_status == 2)
               <span class="badge bg-light-danger">Inativo</span>
               @endif
               @if($user->use_status == 3)
               <span class="badge bg-light-danger">Aguardando Vaga</span>
               @endif
            </div>

            <div class="row">
               <div class="col-md-12" style="padding-top:20px">
                   @if (Auth::user()->use_perfil !== 12) <a href="/usuario/imprimirPront/{{$user->id}}" target="_blank" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 btimprimirProntuario"> <i data-feather='printer'></i> Imprimir o Prontuário</a> @endif  
               </div>
           </div>
         </div>
      </div>
      <div style="height: 50px;"></div>

      <!-- <h4 class="fw-bolder border-bottom pb-50 mb-1">Detalhes</h4> -->
      <div class="info-container">
         <ul class="list-unstyled">
            @if ($user->use_perfil)
               <li class="mb-75">
                  <i data-feather='smile' class="icongetuser"></i>
                  @if($user->use_perfil == 10)
                     <span class="me-25">ADM</span>
                  @endif
                  @if($user->use_perfil == 11)
                     <span class="me-25">Aluno</span>
                  @endif
                  @if($user->use_perfil == 12)
                     <span class="me-25">Professor</span>
                  @endif
                  @if($user->use_perfil == 13)
                     <span class="me-25">Diretoria</span>
                  @endif
                  @if($user->use_perfil == 14)
                     <span class="me-25">Secretaria</span>
                  @endif
                  @if($user->use_perfil == 16)
                     <span class="me-25">Link Autenticado</span>
                  @endif
               </li>
            @endif 
            @if ($user->mat_series_id)
            
               <li class="mb-75">
                  <i data-feather='flag'  class="icongetuser"></i>
                  <span class="me-25"> {{$user->ser_nome}}</span>
               </li>
               <li class="mb-75">
                  <i data-feather='flag'  class="icongetuser"></i>
                  <span class="me-25"> {{$user->ser_apelido}}</span>
               </li>
               <li class="mb-75">
                  <i data-feather='flag'  class="icongetuser"></i>
                  <span class="me-25"> {{$user->ser_periodo}}</span>
               </li>
            @endif 
            @if ($user->email)
               <li class="mb-75">
                  <i data-feather='mail' class="icongetuser"></i>
                  <span class="me-25"> {{$user->email}}</span>
               </li>
            @endif            
            @if ($user->use_dt_nascimento)
               <li class="mb-75">
                  <i data-feather='calendar' class="icongetuser"></i>
                  <span class="me-25"> @if($user->use_dt_nascimento ) {{date( 'd/m/Y' , strtotime($user->use_dt_nascimento )) }} @endif</span>
               </li>
            @endif            
            @if ($user->end_cidade)
               <li class="mb-75">
                  <i data-feather='map-pin' class="icongetuser"></i>
                  <span class="me-25"> {{$user->end_cidade}}</span>
               </li>
            @endif            
            @if ($user->res_res_telefone)
               <li class="mb-75">
                  <i data-feather='phone' class="icongetuser"></i>
                  <span class="me-25"> {{$user->res_res_telefone}}</span>
               </li>
            @endif            
            @if ($user->sau_alergia)
               <li class="mb-75">
                  <i data-feather='heart' class="icongetuser"></i>
                  <span class="me-25">Aluno Alérgico: {{$user->sau_alergia}} </span>
               </li>
            @endif            
            @if ($user->sau_necessidades_especial)
               <li class="mb-75">
                  <i data-feather='heart' class="icongetuser"></i>
                  <span class="me-25">Aluno Espedical: {{$user->sau_necessidades_especial}}</span>
               </li>
            @endif            
            @if ($user->sau_sus)
               <li class="mb-75">
                  <i data-feather='heart' class="icongetuser"></i>
                  <span class="me-25"> SUS - {{$user->sau_sus}}</span>
               </li>
            @endif            
            
         </ul>
      </div>
   </div>
</div>

<script>
   if (feather) {
      feather.replace({
         width: 24,
         height: 24
      });
   }
</script>