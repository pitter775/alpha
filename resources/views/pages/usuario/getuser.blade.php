<?php
$perfil = '';
switch ($user->perfil) {
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
            @if($user->foto == null)
            <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" class="img-fluid rounded mt-3 mb-2" height="110" width="110" alt="avatar" />

            @endif
            @if($user->foto !== null)
            <img src="{{asset('arquivos').'/'.$user->foto}}" class="img-fluid rounded mt-3 mb-2" height="110" width="110" alt="avatar" />

            @endif
            <div class="user-info text-center">
               <h4> {{$user->name}}</h4>
               @if($user->status == 1)
               <span class="badge bg-light-success">Ativo</span>
               @endif
               @if($user->status == 2)
               <span class="badge bg-light-danger">Inativo</span>
               @endif
            </div>
         </div>
      </div>
      <div style="height: 50px;"></div>

      <!-- <h4 class="fw-bolder border-bottom pb-50 mb-1">Detalhes</h4> -->
      <div class="info-container">
         <ul class="list-unstyled">
            <li class="mb-75">
               <i data-feather='mail' class="icongetuser"></i>
               <span class="me-25"> {{$user->email}}</span>
            </li>
            @if($user->empresaname)
            <li class="mb-75">
               <i data-feather='cpu' class="icongetuser"></i>
               <span class="me-25">{{$user->empresaname}}</span>
            </li>
            @endif

            @if($user->regime)
            <li class="mb-75">
               <i data-feather='shield' class="icongetuser"></i>
               <span class="me-25">{{$user->regime}}</span>
            </li>
            @endif

            @if($user->frentename)
            <li class="mb-75">
               <i data-feather='anchor' class="icongetuser"></i>
               <span class="me-25">{{$user->frentename}}</span>
            </li>
            @endif

            @if($user->cargoname)
            <li class="mb-75">
               <i data-feather='pocket' class="icongetuser"></i>
               <span class="me-25">{{$user->cargoname}}</span>
            </li>
            @endif

            @if($user->alocacaoname)
            <li class="mb-75">
               <i data-feather='globe' class="icongetuser"></i>
               <span class="me-25">{{$user->alocacaoname}}</span>
            </li>
            @endif

            @if($user->salario)
            <li class="mb-75">
               <i data-feather='dollar-sign' class="icongetuser"></i>
               <span class="me-25">{{$user->salario}}</span>
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