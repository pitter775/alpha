@extends('layouts.app', [
'elementActive' => 'usuario'
])
@section('content')
<style>
   .dropzone .dz-preview {
      zoom: 0.8;
   }

   .custom-control-label {
      cursor: pointer !important;
   }
   .text-adm { color: #7367f0 !important;}
</style>
<!-- BEGIN: Content-->
<div class="content-wrapper" data-aos=fade-left data-aos-delay=0>
   <input type="hidden" value="{{$user->id ?? ''}}" name="iduser" id="iduser">
   <input type="hidden" value="{{$user->perfil ?? ''}}" name="perfiluser" id="perfiluser">

   <div class="content-body">
      <section class="app-user-view-account">
         <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-3 col-lg-4 col-md-4 order-1 order-md-0">
               <!-- User Card -->
               <div id="divcarduser">

               </div>

               <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-9 col-lg-8 col-md-7 order-0 order-md-1">
               <!-- Project table -->
               <section class="app-user-edit">
                  <div class="card">
                     <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                 <i data-feather="user"></i><span class="d-none d-sm-block">Conta</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                 <i data-feather="info"></i><span class="d-none d-sm-block">Informações</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" id="controle-tab" data-toggle="tab" href="#controle" aria-controls="controle" role="tab" aria-selected="false">
                                 <i data-feather='activity'></i><span class="d-none d-sm-block">Controle</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" id="arquivos-tab" data-toggle="tab" href="#arquivos" aria-controls="arquivos" role="tab" aria-selected="false">
                                 <i data-feather='file'></i><span class="d-none d-sm-block">Arquivos</span>
                              </a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                              <form class="form-conta" enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" value="{{$user->id ?? ''}}" name="id_geral" id="id_geral" />
                                 <div class="row">
                                    <div class="col-md-8">
                                       <div class="media mb-2">
                                          @if($user->foto == null)
                                          <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" alt="users avatar" data-tipo="avatar" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                  
                                          @endif
                                          @if($user->foto !== null)
                                          <img src="{{asset('arquivos').'/'.$user->foto}}" alt="users avatar" data-tipo="nova" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                
                                          @endif

                                          
                                          <div class="media-body mt-50">
                                             <h4>{{$user->name}}</h4>
                                             <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                   <span class="d-none d-sm-block btmudar">Mudar</span>
                                                   <input class="form-control" type="file" name="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" />
                                                   <span class="d-block d-sm-none">
                                                      <i class="mr-0" data-feather="edit"></i>
                                                   </span>
                                                </label>
                                                <button class="btn btn-outline-secondary btreset">Reset</button>
                                       
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <label for="alteracao">Data Alteração</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="alteracao" type="text" class="form-control flatpickr-basic" name="alteracao" />

                                       </div>
                                       <small class="text-muted">Se a alteração for retroativa, altere a data.</small>
                                    </div>

                                    <div class="col-md-7">
                                       <label for="fullname">Nome</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='user'></i>
                                             </span>
                                          </div>
                                          <input id="fullname" type="text" class="form-control" value="{{$user->name}}" name="fullname" />
                                       </div>
                                    </div>

                                    <div class="col-md-5" style="margin-bottom: 15px;">
                                       <label for="email">Email</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='mail'></i>
                                             </span>
                                          </div>
                                          <input id="email" type="text" class="form-control" value="{{$user->email}}" name="email" />
                                       </div>
                                    </div>



                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="perfil">Perfil</label>
                                          <select id="perfil" name="perfil" class="form-control select2">
                                             <option value="1" @if($user->perfil == 1) selected @endif>Usuário</option>
                                             <option value="10" @if($user->perfil == 10) selected @endif>ADM</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <label for="senha">Nova Senha</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='key'></i>
                                             </span>
                                          </div>
                                          <input id="senha" type="text" class="form-control" placeholder="Nova Senha" name="senha" />
                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="status">Status</label>
                                          <select id="status" name="status" class="form-control select2">
                                             <option value="1" @if($user->status == 1) selected @endif >Ativo</option>
                                             <option value="2" @if($user->status == 2) selected @endif >Inativo</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                       <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
                                       <input type="hidden" value="conta" name="salvarDados">
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="tab-pane fade " id="information" aria-labelledby="information-tab" role="tabpanel">
                              <form class="form-pessoais">
                                 @csrf
                                 <input type="hidden" value="{{$user->id ?? ''}}" name="id_geral" id="id_geral" />
                                 <div class="row mt-1">
                                    <div class="col-12">
                                       <h4 class="mb-1">
                                          <i data-feather="user" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Informações Pessoais</span>
                                       </h4>
                                    </div>
                                    <div class="col-lg-4">
                                       <label for="dt_nascimento">Data de Nascimento</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="dt_nascimento" type="text" class="form-control flatpickr-basic" value="@if($user-> dt_nascimento ) {{date( 'd/m/Y' , strtotime($user-> dt_nascimento )) }} @endif" name="dt_nascimento" />
                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <label for="telefone">Telefone</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='phone'></i>
                                             </span>
                                          </div>
                                          <input id="telefone" type="text" class="form-control" value="{{$user->telefone ?? ''}}" name="telefone" />
                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="estado_civil">Estado Civil</label>
                                          <select id="estado_civil" name="estado_civil" class="form-control select2">
                                             <option value="Casado" @if($user->estado_civil == 'Casado') selected @endif>Casado</option>
                                             <option value="Solteiro" @if($user->estado_civil == 'Solteiro') selected @endif>Solteiro</option>
                                             <option value="Divorciado" @if($user->estado_civil == 'Divorciado') selected @endif>Divorciado</option>
                                             <option value="Viuvo(a)" @if($user->estado_civil == 'Viuvo(a)') selected @endif>Viuvo(a)</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <label for="cnh_numero">CNH Nº</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='alert-circle'></i>
                                             </span>
                                          </div>
                                          <input id="cnh_numero" type="text" class="form-control" value="{{$user->cnh_numero ?? ''}}" name="cnh_numero" />
                                       </div>
                                    </div>

                                    <div class="col-lg-4">
                                       <label for="cnh_dt_vencimento">CNH Vencimento</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="cnh_dt_vencimento" type="text" class="form-control flatpickr-basic" value="@if($user-> cnh_dt_vencimento ) {{date( 'd/m/Y' , strtotime($user-> cnh_dt_vencimento )) }} @endif" name="cnh_dt_vencimento" />
                                       </div>
                                    </div>

                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label for="cnh_tipo">CNH Tipo</label>
                                          <select id="cnh_tipo" name="cnh_tipo" class="form-control select2">
                                             <option value="A" @if($user->cnh_tipo == 'A') selected @endif>A</option>
                                             <option value="B" @if($user->cnh_tipo == 'B') selected @endif>B</option>
                                             <option value="C" @if($user->cnh_tipo == 'C') selected @endif>C</option>
                                             <option value="AB" @if($user->cnh_tipo == 'AB') selected @endif>AB</option>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <label for="rg">RG</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='alert-circle'></i>
                                             </span>
                                          </div>
                                          <input id="rg" type="text" class="form-control" value="{{$user->rg ?? ''}}" name="rg" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label for="cpf">CPF</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='alert-circle'></i>
                                             </span>
                                          </div>
                                          <input id="cpf" type="text" class="form-control" value="{{$user->cpf ?? ''}}" name="cpf" />
                                       </div>
                                    </div>


                                    <div class="col-md-4 ">
                                       <div class="form-group">
                                          <label class="d-block mb-1">Sexo</label>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="male" name="sexo" value="Masculino" class="custom-control-input" checked />
                                             <label class="custom-control-label" for="male">Masculino</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
                                             <label class="custom-control-label" for="female">Fenimino</label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-12" style="margin-top: 20px;">
                                       <h4 class="mb-1 mt-2">
                                          <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Endereço</span>
                                       </h4>
                                    </div>
                                    <div class="col-md-5">
                                       <label for="rua">Rua</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='map-pin'></i>
                                             </span>
                                          </div>
                                          <input id="rua" type="text" class="form-control" value="{{$user->rua ?? ''}}" name="rua" />
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <label for="numero">Número</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='map-pin'></i>
                                             </span>
                                          </div>
                                          <input id="numero" type="text" class="form-control" value="{{$user->numero ?? ''}}" name="numero" />
                                       </div>
                                    </div>
                                    <div class="col-md-5" style="margin-bottom: 15px;">
                                       <label for="complemento">Complemento</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='map-pin'></i>
                                             </span>
                                          </div>
                                          <input id="complemento" type="text" class="form-control" value="{{$user->complemento ?? ''}}" name="complemento" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <label for="cep">CEP</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='map-pin'></i>
                                             </span>
                                          </div>
                                          <input id="cep" type="text" class="form-control" value="{{$user->cep ?? ''}}" name="cep" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <label for="cidade">Cidade</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='map-pin'></i>
                                             </span>
                                          </div>
                                          <input id="cidade" type="text" class="form-control" value="{{$user->cidade ?? ''}}" name="cidade" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <label for="estado">Estado</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='map-pin'></i>
                                             </span>
                                          </div>
                                          <input id="estado" type="text" class="form-control" value="{{$user->estado ?? ''}}" name="estado" />
                                       </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                       <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
                                       <input type="hidden" value="informacoes" name="salvarDados">
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="tab-pane fade " id="controle" aria-labelledby="controle-tab" role="tabpanel">
                              <form class="form-controle">
                                 @csrf
                                 <input type="hidden" value="{{$user->id ?? ''}}" name="id_geral" id="id_geral" />

                                 <div class="row mt-1  pb-50 mb-1">
                                    <div class="col-md-8">
                                       <h4 class="mb-1">
                                          <i data-feather="user" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Dados Gerais</span>
                                       </h4>
                                    </div>

                                    <div class="col-md-4">
                                       <label for="alteracao2">Data Alteração</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="alteracao2" type="text" class="form-control flatpickr-basic" name="alteracao" />

                                       </div>
                                       <small class="text-muted">Se a alteração for retroativa, altere a data.</small>
                                    </div>


                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="empresa">Empresa</label>
                                          <input type="hidden" id="hempresa" value="{{$user->empresas_id ?? ''}}">
                                          <select id="empresa" name="empresa" class="form-control select2">
                                             @foreach($empresa as $key => $value)
                                             <option value="{{ $value->id }}" @if($user->empresas_id == $value->id) selected @endif >{{ $value->name }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="cargo">Cargo</label>
                                          <input type="hidden" id="hcargo" value="{{$user->cargos_id ?? ''}}">
                                          <select id="cargo" name="cargo" class="form-control select2">
                                             @foreach($cargo as $key => $value)
                                             <option value="{{ $value->id }}" @if($user->cargos_id == $value->id) selected @endif >{{ $value->name }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="alocacao">Alocação</label>
                                          <input type="hidden" id="halocacao" value="{{$user->alocacaos_id ?? ''}}">
                                          <select id="alocacao" name="alocacao" class="form-control select2">
                                             @foreach($alocacao as $key => $value)
                                             <option value="{{ $value->id }}" @if($user->alocacaos_id == $value->id) selected @endif >{{ $value->name }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label for="salario">Salário</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='dollar-sign'></i>
                                             </span>
                                          </div>
                                          <input id="salario" type="text" class="form-control"  value="{{$user->salario ?? ''}}" name="salario" />
                                       </div>
                                       <small class="text-muted text-adm">Custo: <span id="custoval"></span> </small>
                                    </div>

                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label for="frente">Frente</label>
                                          <input type="hidden" id="hfrente" value="{{$user->frentes_id ?? ''}}">
                                          <select id="frente" name="frente" class="form-control select2">
                                             @foreach($frente as $key => $value)
                                             <option value="{{ $value->id }}" @if($user->frentes_id == $value->id) selected @endif >{{ $value->name }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label for="dt_mob_sabesp">Mobilização Sabesp</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="dt_mob_sabesp" type="text" class="form-control flatpickr-basic" value="@if($user-> dt_mob_sabesp) {{date( 'd/m/Y' , strtotime($user-> dt_mob_sabesp)) }} @endif" name="dt_mob_sabesp" />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label for="dt_desmob_sabesp">Desmobilização Sabesp</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="dt_desmob_sabesp" type="text" class="form-control flatpickr-basic" value="@if($user-> dt_desmob_sabesp ) {{date( 'd/m/Y' , strtotime($user-> dt_desmob_sabesp )) }} @endif" name="dt_desmob_sabesp" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label class="d-block mb-1">Regime</label>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="pj" name="regime" value="Prestador de Serviço" class="custom-control-input" @if($user->regime == 'Prestador de Serviço') checked @endif />
                                             <label class="custom-control-label" for="pj">Prestador de Serviço</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="regis" name="regime" value="Celetista" class="custom-control-input" @if($user->regime == 'Celetista') checked @endif/>
                                             <label class="custom-control-label" for="regis">Celetista</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>


                                 <div class="row mt-1" id="divCeletista">
                                    <div class="col-12">
                                       <h4 class="mb-1">
                                          <i data-feather="shield" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Celetista</span>
                                       </h4>
                                    </div>
                                    <div class="col-md-6">
                                       <label for="ordem_servico">Ordem de Serviço</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='star'></i>
                                             </span>
                                          </div>
                                          <input id="ordem_servico" type="text" class="form-control" value="{{$user->ordem_servico ?? ''}}" name="ordem_servico" />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label for="dt_aso_inicial">ASO Inicial</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="dt_aso_inicial" type="text" class="form-control flatpickr-basic" value="@if($user-> dt_aso_inicial ) {{date( 'd/m/Y' , strtotime($user-> dt_aso_inicial )) }} @endif" name="dt_aso_inicial" />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label for="dt_aso_demissional">ASO Demissional</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="dt_aso_demissional" type="text" class="form-control flatpickr-basic" value="@if($user-> dt_aso_demissional ) {{date( 'd/m/Y' , strtotime($user-> dt_aso_demissional )) }} @endif" name="dt_aso_demissional" />
                                       </div>
                                    </div>

                                 </div>
                                 <div class="row mt-1 " id="divPrestodor">
                                    <div class="col-12">
                                       <h4 class="mb-1">
                                          <i data-feather="shield" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Prestador de Serviços</span>

                                       </h4>
                                    </div>
                                    <div class="col-md-4">
                                       <label for="nome_fantasia">Nome da Empresa</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='briefcase'></i>
                                             </span>
                                          </div>
                                          <input id="nome_fantasia" type="text" class="form-control" value="{{$user->nome_fantasia ?? ''}}" name="nome_fantasia" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label for="representante">Representante Social</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='briefcase'></i>
                                             </span>
                                          </div>
                                          <input id="representante" type="text" class="form-control" value="{{$user->representante ?? ''}}" name="representante" />
                                       </div>
                                    </div>
                                    <div class="col-md-4" style="margin-bottom: 15px;">
                                       <label for="cnpj">CNPJ</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='briefcase'></i>
                                             </span>
                                          </div>
                                          <input id="cnpj" type="text" class="form-control" value="{{$user->cnpj ?? ''}}" name="cnpj" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label for="dt_prest_inicio">Início</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="dt_prest_inicio" type="text" class="form-control flatpickr-basic" value="@if($user-> dt_prest_inicio ) {{date( 'd/m/Y' , strtotime($user-> dt_prest_inicio )) }} @endif" name="dt_prest_inicio" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <label for="dt_prest_fim">Término</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">
                                                <i data-feather='calendar'></i>
                                             </span>
                                          </div>
                                          <input id="dt_prest_fim" type="text" class="form-control flatpickr-basic" value="@if($user-> dt_prest_fim ) {{date( 'd/m/Y' , strtotime($user-> dt_prest_fim )) }} @endif" name="dt_prest_fim" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 d-flex flex-sm-row flex-column mt-2" style="margin-left: -12px;">
                                    <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
                                    <input type="hidden" value="controle" name="salvarDados">
                                 </div>
                              </form>
                              <div class="divaditivos" style="margin-top: 40px;">
                                 <form class="form-aditivo">
                                    @csrf
                                    <input type="hidden" value="{{$user->contratos_prestacao_servicos_id ?? ''}}" name="id_pj" id="id_pj" />
                                    <div class="table-responsive border rounded mt-1">
                                       <h4 class="py-1 mx-1 mb-0 font-medium-2">
                                          <i data-feather="dollar-sign" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Aditivos</span>
                                       </h4>
                                       <div class="row" style="margin:0px">
                                          <div class="col-md-4" style="margin-bottom: 15px;">
                                             <div class="form-group">
                                                <label for="valor_aditivo">Valor Aditivo</label>
                                                <div class="input-group input-group-merge">
                                                   <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                         <i data-feather='dollar-sign'></i>
                                                      </span>
                                                   </div>
                                                   <input id="valor_aditivo" type="text" class="form-control" value="" name="valor_aditivo" />
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <label for="dt_aditivo">Data Aditivo</label>
                                             <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">
                                                      <i data-feather='calendar'></i>
                                                   </span>
                                                </div>
                                                <input id="dt_aditivo" type="text" class="form-control flatpickr-basic" value="" name="dt_aditivo" />
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <button type="submit" style="margin-top: 30px;" class="btn btn-outline-primary waves-effect">Adicionar Aditivo</button>
                                          </div>
                                       </div>


                                       <table class="aditivo-list-table table table-sm table-responsive-lg">
                                          <thead class="thead-light">
                                             <tr>
                                                <th></th>
                                                <th>Valor</th>
                                                <th>Data do Aditivo</th>
                                                <th></th>
                                             </tr>
                                          </thead>
                                       </table>

                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade " id="arquivos" aria-labelledby="arquivos-tab" role="tabpanel">
                              <form action="{{ route('dropzoneFileUpload') }}" class="dropzone" id="file-upload" enctype="multipart/form-data" style="height: 200px;">
                                 @csrf
                                 <div class="dz-message">
                                    Clique ou solte os arquivos aqui.<br>
                                 </div>
                                 <input type="hidden" value="{{$user->id ?? ''}}" name="id_geral" id="id_geral">
                              </form>

                              <div class="card" style="padding-right: 0;">
                                 <!-- <h4 class="fw-bolder border-bottom pb-50 mb-1 mt-75">Todos os Arquivos</h4> -->
                                 <div id="cardArquivos">

                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- /Project table -->

               <!-- Activity Timeline -->
               <div id="divcarhistory" style="padding-bottom: 40px;" >
                  <h4 class="" style="padding-top: 20px;">Histórico de Alterações</h4>
                  <div class="">
                     <form class="historico">
                        @csrf
                        <table class="history-list-table table table-sm table-responsive-lg">
                           <thead class="thead-light">
                              <tr>
                                 <th></th>
                                 <th>Tipo</th>
                                 <th>Valor</th>
                                 <th>Data</th>
                                 <th></th>
                              </tr>
                           </thead>
                        </table>
                     </form>
                  </div>
               </div>
               <!-- /Activity Timeline -->
            </div>
            <!--/ User Content -->
         </div>
      </section>




   </div>
</div>

<!-- END: Content-->
@endsection

@push('css_vendor')
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">


@endpush

@push('css_page')

<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-user.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-file-uploader.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-file-manager.css">



@endpush

@push('js_page')
<script src="../../../app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>


<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
<script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
<script src="../../../app-assets/js/scripts/pages/app-usuario-detalhe.js"></script>
<script src="../../../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<script src="../../../app-assets/js/scripts/forms/form-file-uploader.js"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>     


@endpush

@push('js_vendor')
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<!-- <script src="../../../app-assets/vendors/js/extensions/dropzone.min.js"></script> -->


@endpush