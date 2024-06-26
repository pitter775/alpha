@extends('layouts.app', ['elementActive' => 'dashboard'])
@section('content')
    <?php
    use App\Models\Serie;
    use Illuminate\Support\Facades\DB;
    
    ?>

<div class="modal-size-lg d-inline-block">
    <div class="modal fade text-left" id="large"tabindex="-1"role="dialog"aria-labelledby="myModalLabel17"aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="tabela-piloto">
          
        </div>
      </div>
    </div>
</div>

<style>
    .btmodal{ cursor: pointer;}
    .icodash{ position: absolute; height: 90px; right: 5px; top: 5px}
</style>


    <div class="content-wrapper" data-aos=fade-left data-aos-delay=0>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <h5>Total de Alunos</h5>
                                <p class="card-text font-small-3">Carlos Drummond de Andrade</p>
                                <h3 class="mb-75 mt-2 pt-50">
                                    <h1 class="font-weight-bolder mb-0">{{ $totalalunos ?? '0' }} alunos</h1>
                                    <input id="inptotalalunos" type="hidden" value="{{ $totalalunos ?? '0' }}" />
                                </h3>
                                <img src="../../../app-assets/images/illustration/badge.svg" class="congratulation-medal"
                                    alt="Medal Pic" />

                                <hr />
                                <div class="row avg-sessions pt-50">
                                    <div class="col-6 mb-2">
                                        <p class="mb-50">{{ $meninos ?? '0' }} Meninos </p>
                                        <div class="progress progress-bar-primary" style="height: 6px">
                                            <?php $porcent1 = ($meninos * 100) / $totalalunos; ?>
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $porcent1 }}" aria-valuemin="{{ $porcent1 }}"
                                                aria-valuemax="100" style="width: {{ $porcent1 }}%"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <p class="mb-50">{{ $meninas ?? '0' }} Meninas</p>
                                        <div class="progress progress-bar-danger" style="height: 6px">
                                            <?php $porcent2 = ($meninas * 100) / $totalalunos; ?>
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $porcent2 }}" aria-valuemin="{{ $porcent2 }}"
                                                aria-valuemax="100" style="width: {{ $porcent2 }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Sócio-Econômicos</h4>
                                <img src="../../../app-assets/images/icons/ico-socio.png" class="rounded icodash" alt="Sócio-Econômicos" /> 

                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0   btmodal"
                                        data-campo = "users[]-name;series[]-ser_apelido;socials[]-soc_renda_familiar" 
                                        data-condicao = "socio1e2" data-titulo ="Alunos ativos com 1 a 2 salários" 
                                        data-toggle="modal" data-target="#large">
                                        <div class="media">

                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto" >
                                                <h4 class="font-weight-bolder mb-0">{{ $socio1e2 ?? '0' }}</h4>
                                                <p class="card-text font-small-3 mb-0">1 a 2 salários</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media btmodal"
                                        data-campo = "users[]-name;series[]-ser_apelido;socials[]-soc_renda_familiar" 
                                        data-condicao = "socio3e4" data-titulo ="Alunos ativos com 3 a 4 salários" 
                                        data-toggle="modal" data-target="#large">
                                            <div class="avatar bg-light-primary mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $socio3e4 ?? '0' }}</h4>
                                                <p class="card-text font-small-3 mb-0">3 a 4 salários</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                        <div class="media btmodal"
                                        data-campo = "users[]-name;series[]-ser_apelido;socials[]-soc_renda_familiar" 
                                        data-condicao = "socio5e10" data-titulo ="Alunos ativos com 5 a 10 salários" 
                                        data-toggle="modal" data-target="#large">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $socio5e10 ?? '0' }}</h4>
                                                <p class="card-text font-small-3 mb-0">5 a 10</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="media btmodal"
                                                data-campo = "users[]-name;series[]-ser_apelido;socials[]-soc_renda_familiar" 
                                                data-condicao = "sociomaisde10" data-titulo ="Alunos ativos com mais de 10 salários" 
                                                data-toggle="modal" data-target="#large">
                                            <div class="avatar bg-light-success mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $sociomaisde10 ?? '0' }}</h4>
                                                <p class="card-text font-small-3 mb-0">mais de 10</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->
                </div>

                <div class="row match-height">
                    

                    <!-- Tipo de residência -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-header">
                                <h4 class="card-title">Tipo de residência</h4>
                                <img src="../../../app-assets/images/icons/ico-casa.png" class="rounded icodash" alt="Tipo de residência" /> 
                            </div>

                          
                            <div class="card-body" style="padding-top: 40px">
                                @foreach ($tiporesidencia as $tipores)
                                    <div class="browser-states btmodal"
                                    data-campo = "users[]-name;series[]-ser_apelido;socials[]-soc_tipo_residencia" 
                                    data-condicao = "{{ $tipores->soc_tipo_residencia ?? 'Sem definição' }}" data-titulo ="Tipo de residência de alunos ativos" 
                                    data-toggle="modal" data-target="#large">
                                        <div class="media ">
                                            <img src="../../../app-assets/images/icons/home.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                            <h6 class="align-self-center mb-0">
                                                {{ $tipores->soc_tipo_residencia ?? 'Sem definição' }}</h6>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="font-weight-bold text-body-heading mr-1">
                                                {{ $tipores->sum ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <!-- Especiais -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Alunos Especiais</h4>
                                <img src="../../../app-assets/images/icons/ico-especial.png" class="rounded icodash" alt="Presença" /> 

                            </div>
                            <div class="card-body" style="padding-top: 40px">
                                <div class="browser-states">
                                    <div class="media ">
                                        <img src="../../../app-assets/images/icons/necessidade.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Especiais</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">
                                            @foreach ($especiais as $tipoale)
                                                @if($tipoale->sau_necessidades_especial == 'Sim')
                                                    <span style=" padding: 0 10px" class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_necessidades_especial;saude_users[]-sau_necessidades_especial_detalhe" 
                                                    data-condicao = "especialsim" data-titulo ="Alunos com Necessidades Especiais" 
                                                    data-toggle="modal" data-target="#large">{{$tipoale->sum }} </span>
                                                @endif
                                                @if($tipoale->sau_necessidades_especial == null)
                                                    <span style="padding: 0 0 0 10px; float: right; color: #ccc" class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_necessidades_especial" 
                                                    data-condicao = "especialnull" data-titulo ="Ativos sem mensionar se tem a Necessidades Especiais" 
                                                    data-toggle="modal" data-target="#large"> {{$tipoale->sum}}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-states">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/necessidade.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Alergicos</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">                                            
                                            @foreach ($alergicos as $tipoale)
                                                @if($tipoale->sau_alergia == 'Sim')
                                                    <span style=" padding: 0 10px" class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_alergia;saude_users[]-sau_alergia_detalhe; " 
                                                    data-condicao = "simalergico" data-titulo ="Alunos Alergicos" 
                                                    data-toggle="modal" data-target="#large">{{$tipoale->sum }} </span>
                                                @endif
                                                @if($tipoale->sau_alergia == null)
                                                    <span style="padding: 0 0 0 10px; float: right; color: #ccc" class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_alergia" 
                                                    data-condicao = "nulllergico" data-titulo ="Ativos sem mensionar se tem a Alergia" 
                                                    data-toggle="modal" data-target="#large"> {{$tipoale->sum}}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-states">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/necessidade.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Dificuldade na Fala</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">
                                            @foreach ($sau_fala as $tipoale)
                                                @if($tipoale->sau_fala == 'Não')
                                                    <span style=" padding: 0 10px"  class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_fala" 
                                                    data-condicao = "naofala" data-titulo ="Alunos com Dificuldade na Fala" 
                                                    data-toggle="modal" data-target="#large">{{$tipoale->sum }} </span>
                                                @endif
                                                @if($tipoale->sau_fala == null)
                                                    <span style="padding: 0 0 0 10px; float: right; color: #ccc" class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_fala" 
                                                    data-condicao = "nullfala" data-titulo ="Ativos sem mensionar se tem a Fala" 
                                                    data-toggle="modal" data-target="#large"> {{$tipoale->sum}}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-states">
                                    <div class="media ">
                                        <img src="../../../app-assets/images/icons/necessidade.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Dificuldade na Escuta</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">
                                            @foreach ($sau_escuta as $tipoale)
                                                @if($tipoale->sau_escuta == 'Não')
                                                    <span style=" padding: 0 10px"  class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_escuta" 
                                                    data-condicao = "naoescuta" data-titulo ="Alunos com Dificuldade na Escuta" 
                                                    data-toggle="modal" data-target="#large">{{$tipoale->sum }} </span>
                                                @endif
                                                @if($tipoale->sau_escuta == null)
                                                    <span style="padding: 0 0 0 10px; float: right; color: #ccc"  class=" btmodal" 
                                                    data-campo = "users[]-name;series[]-ser_apelido;saude_users[]-sau_escuta" 
                                                    data-condicao = "nullescuta" data-titulo ="Ativos sem mensionar se tem a Escuta" 
                                                    data-toggle="modal" data-target="#large"> {{$tipoale->sum}}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Professores -->
                    <div class="col-lg-4 col-md-6 col-12  btmodal"
                        data-campo = "users[]-name;" 
                        data-condicao = "professores" data-titulo ="Lista de Professores" 
                        data-toggle="modal" data-target="#large">

                        <div class="card card-developer-meetup">
                            <div class="meetup-img-wrapper rounded-top text-center">
                                <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic"
                                    height="170" />
                            </div>
                            <div class="card-body">
                                <div class="meetup-header d-flex align-items-center">
                                    <div class="meetup-day">
                                        <h6 class="mb-0">total</h6>
                                        <h3 class="mb-0">{{count($professores)}}</h3>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="card-title mb-25">Professores</h4>
                                        <p class="card-text mb-0">Orientadores docente da pedagogia</p>
                                    </div>
                                </div>

                                <div class="avatar-group">
                                    @foreach ($professores->take(4) as $prof)
                                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom"
                                            data-original-title="{{ $prof->name }}" class="avatar pull-up">

                                            @if ($prof->use_foto == null)
                                                <img src=" {{ asset('app-assets/images/avatars/avatar.png') }}"
                                                    class="avatar pull-up" width="33" height="33" alt="avatar" />
                                            @endif
                                            @if ($prof->use_foto !== null)
                                                <img src="{{ asset('arquivos') . '/' . $prof->use_foto }}"
                                                    class="avatar pull-up" width="33" height="33" alt="avatar" />
                                            @endif
                                        </div>
                                    @endforeach

                                    <h6 class="align-self-center cursor-pointer ml-50 mb-0">+{{count($professores)-4}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/  Card -->
                    <!-- Presença -->
                    <!-- Browser States Card -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-header">
                                <h4 class="card-title">Presença Hoje</h4>
                                <img src="../../../app-assets/images/icons/ico-presente.png" class="rounded icodash" alt="Presença" /> 
                            </div>
                            <div class="card-body" style="padding-top: 20px">
                                <input id="dt_inicial" type="hidden" class="form-control flatpickr-basic" name="dt_inicial" />
                                <input id="dt_final" type="text" class="form-control flatpickr-basic"  name="dt_final" disabled/>
                                <div class="browser-states">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/ico-alu.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Presentes</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1" id="ppresente">--</div>
                                        <div class="state-chart-primary"></div>
                                    </div>
                                </div>
                                <div class="browser-states">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/ico-alu.png" class="rounded mr-1" height="30" alt="Mozila Firefox" />
                                        <h6 class="align-self-center mb-0">Faltantes</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1" id="ffaltantes">--</div>
                                        <div class="state-chart-warning"></div>
                                    </div>
                                </div>
                                <div class="browser-states">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/ico-alu.png" class="rounded mr-1" height="30" alt="Apple Safari" />
                                        <h6 class="align-self-center mb-0">Coletados</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1" id="rregistrados">--</div>
                                        <div class="state-chart-secondary"></div>
                                    </div>
                                </div>
                                <div class="browser-states">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/ico-alu.png" class="rounded mr-1" height="30" alt="Internet Explorer" />
                                        <h6 class="align-self-center mb-0">Não Coletados</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1" id="naoregistrados">--</div>
                                        <div class="state-chart-info"></div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!--/ Browser States Card -->


                     <!-- Transaction card -->
                     <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Dados Gerais</h4>
                                <img src="../../../app-assets/images/icons/ico-geral.png" class="rounded icodash" alt="Dados Gerais" /> 
                            </div>
                            <div class="card-body" style="padding-top: 30px">
                                <div class="transaction-item btmodal" 
                                data-campo = "users[]-name; series[]-ser_apelido; resp_autorizados[]-resp_nome; resp_autorizados[]-resp_telefone" 
                                data-condicao = "listaespera" data-titulo ="Lista de espera" 
                                data-toggle="modal" data-target="#large">
                                    <div class="media">
                                        <div class="avatar bg-light-primary rounded">
                                            <div class="avatar-content">
                                                <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Lista de Espera</h6>
                                            <small>Alunos esperando vagas</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-danger">{{$listaespera ?? 0}}</div>
                                </div>

                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-success rounded">
                                            <div class="avatar-content">
                                                <i data-feather="check" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Numeros de Vagas</h6>
                                            <small>Máximo de Alunos na Escola</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">500</div>
                                </div>

                                <div class="transaction-item btmodal" 
                                    data-campo = "users[]-name; series[]-ser_apelido" 
                                    data-condicao = "usertransport" data-titulo ="Lista e Alunos de Transport Particular" 
                                    data-toggle="modal" data-target="#large">
                                    <div class="media">
                                        <div class="avatar bg-light-danger rounded">
                                            <div class="avatar-content">
                                                <i data-feather="truck" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Transporte</h6>
                                            <small>Alunos de Transporte Particular</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">{{$transpartic ?? 0}}</div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-warning rounded">
                                            <div class="avatar-content">
                                                <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Cargos</h6>
                                            <small>Lista de cargos</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-danger">--</div>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                    <!--/ Transaction card -->

                     <!-- Movimentação -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Situação ano de 2022</h4>
                                <img src="../../../app-assets/images/icons/ico-situacao.png" class="rounded icodash" alt="Situação" /> 
                            </div>
                            <div class="card-body" style="padding-top: 50px">
                                <div class="browser-states">
                                    <div class="media ">
                                        <img src="../../../app-assets/images/icons/ico-sit.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Matriculados</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">
                                            <span style="">{{ $totalalunos ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-states btmodal" 
                                data-campo = "users[]-name;series[]-ser_apelido;alteracaos[]-alt_tipo;alteracaos[]-alt_data" 
                                data-condicao = "alunoremanejado" data-titulo ="Alunos Remanejados">
                                    <div class="media ">
                                        <img src="../../../app-assets/images/icons/ico-sit.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Remanejado</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">
                                            <span style=" " class=" " 
                                            data-toggle="modal" data-target="#large">{{ $remanejado ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-states btmodal" 
                                data-campo = "users[]-name;series[]-ser_apelido;alteracaos[]-alt_tipo;alteracaos[]-alt_data" 
                                data-condicao = "alunotransferido" data-titulo ="Alunos Transferidos" 
                                data-toggle="modal" data-target="#large">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/ico-sit.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Transferidos</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">
                                            <span style="" class=" ">{{ $transferido ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="browser-states btmodal" 
                                data-campo = "users[]-name;series[]-ser_apelido;alteracaos[]-alt_tipo;alteracaos[]-alt_data" 
                                data-condicao = "alunoabandono" data-titulo ="Alunos em Abandono" 
                                data-toggle="modal" data-target="#large">
                                    <div class="media">
                                        <img src="../../../app-assets/images/icons/ico-sit.png" class="rounded mr-1" height="30" alt="Google Chrome" />
                                        <h6 class="align-self-center mb-0">Abandono</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="font-weight-bold text-body-heading mr-1">
                                            <span style="" class=" ">{{ $abandono ?? '0' }}</span>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>

                    <!-- Company Table Card -->
                    <div class="col-lg-12 col-12">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Séries</th>
                                                <th>Meninos</th>
                                                <th>Meninas</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allseries as $serie)
                                                <tr class="btmodal"
                                                data-campo = "users[]-name;series[]-ser_apelido" 
                                                data-condicao = "condicaodetalhada" data-condicaodetalhada ="{{$serie->ser_apelido}}" data-titulo ="Alunos ativos da serie {{$serie->ser_apelido}}" 
                                                data-toggle="modal" data-target="#large">
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar rounded">
                                                                <div class="avatar-content">
                                                                    <img src="../../../app-assets/images/icons/rocket.svg"
                                                                        alt="{{ $serie->ser_apelido ?? '' }}" />
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="font-weight-bolder">
                                                                    {{ $serie->ser_apelido ?? '' }}</div>
                                                                <div class="font-small-2 text-muted">
                                                                    {{ $serie->ser_nome ?? '' }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <?php
                                                            $contmenino = DB::table('users AS u')
                                                                ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
                                                                ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
                                                                ->select('u.id AS id')
                                                                ->where('series.ser_apelido', $serie->ser_apelido)
                                                                ->where('u.use_sexo', 'Masculino')
                                                                ->where('u.use_perfil', 11)
                                                                ->where('u.use_status', 1)
                                                                ->count();
                                                            
                                                            ?>
                                                            <span
                                                                class="font-weight-bolder mb-25">{{ $contmenino ?? '0' }}</span>
                                                            <span class="font-small-2 text-muted">na série
                                                                {{ $serie->ser_apelido ?? '' }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="d-flex flex-column">
                                                            <?php
                                                            $contmenina = DB::table('users AS u')
                                                                ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
                                                                ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
                                                                ->select('u.id AS id')
                                                                ->where('series.ser_apelido', $serie->ser_apelido)
                                                                ->where('u.use_sexo', 'Feminino')
                                                                ->where('u.use_perfil', 11)
                                                                ->where('u.use_status', 1)
                                                                ->count();
                                                            
                                                            ?>
                                                            <span
                                                                class="font-weight-bolder mb-25">{{ $contmenina ?? '0' }}</span>
                                                            <span class="font-small-2 text-muted">na série
                                                                {{ $serie->ser_apelido ?? '' }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center ">
                                                            <?php
                                                            $conttotal = DB::table('users AS u')
                                                                ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
                                                                ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
                                                                ->select('u.id AS id')
                                                                ->where('series.ser_apelido', $serie->ser_apelido)
                                                                ->where('u.use_perfil', 11)
                                                                ->where('u.use_status', 1)
                                                                ->count();
                                                            
                                                            ?>
                                                            <span
                                                                class="font-weight-bolder mr-1">{{ $conttotal ?? '0' }}</span>
                                                            <i data-feather="trending-up"
                                                                class="text-success font-medium-1"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Company Table Card -->

                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>

    </div>

@endsection

@push('css_vendor')
@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/charts/chart-apex.css">
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
    <!-- <script src="../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script> -->
    <script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="../../../app-assets/vendors/js/charts/apexcharts.js"></script>
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-dash-list.js"></script>
    

@endpush

@push('js_vendor')
@endpush
