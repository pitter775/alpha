@extends('layouts.app_off', [
    'elementActive' => 'usuario'
])
@section('content')


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

            <div class="info-container">
                <ul class="list-unstyled" style="margin-top: 30px">
                   
                   @if ($user->mat_series_id)
                   
                      <li class="mb-75">
                         <i data-feather='flag'  class="icongetuser"></i>
                         <span class="me-25"> {{$user->ser_nome}}</span> <span class="me-25"> {{$user->ser_apelido}}</span> <span class="me-25"> {{$user->ser_periodo}}</span>
                      </li>
                      
                   @endif 
                    
                   @if ($user->use_dt_nascimento)
                      <li class="mb-75">
                         <i data-feather='calendar' class="icongetuser"></i>
                         <span class="me-25"> @if($user->use_dt_nascimento ) {{date( 'd/m/Y' , strtotime($user->use_dt_nascimento )) }} @endif</span>
                      </li>
                   @endif            
                       
                   @if ($user->sau_alergia)
                      <li class="mb-75">
                         <i data-feather='heart' class="icongetuser"></i>
                         <span class="me-25">Aluno Alérgico: {{$user->sau_alergia}} </span>
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

            <div class="row">
               <div class="col-md-12" style="padding-top:20px">
                  <button type="button" class="btn btn-success mb-1 mb-sm-0 mr-0 mr-sm-1 btentrada"
                   data-nome="{{$user->name}}" data-idaluno="{{$user->id}}"> <i data-feather='arrow-up'></i> Entrada </button>

                  <button type="button" class="btn btn-warning mb-1 mb-sm-0 mr-0 mr-sm-1 btsaida"
                   data-nome="{{$user->name}}" data-idaluno="{{$user->id}}"> <i data-feather='arrow-down'></i> Saída </button>
               </div>
           </div>
         </div>
      </div>
      <div style="height: 50px;"></div>

      <!-- <h4 class="fw-bolder border-bottom pb-50 mb-1">Detalhes</h4> -->
      
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


@push('css_vendor')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">   
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">  
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">  


@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-user.css">
    
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
@endpush

@push('scripts')
  
    <script src="../../../app-assets/js/scripts/pages/app-cardb-list.js"></script>

    
@endpush

@push('js_scripts')
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>   
    
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    
@endpush