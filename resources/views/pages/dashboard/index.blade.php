@extends('layouts.app', ['elementActive' => 'dashboard'])
@section('content')
    <?php
    use App\Models\Serie;
    use Illuminate\Support\Facades\DB;
    
    ?>
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

                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-danger mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $socio1e2 ?? '0' }}</h4>
                                                <p class="card-text font-small-3 mb-0">1 a 2 salários</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
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
                                        <div class="media">
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
                                        <div class="media">
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
                    <!--  Professores -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-developer-meetup">
                            <div class="meetup-img-wrapper rounded-top text-center">
                                <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic"
                                    height="170" />
                            </div>
                            <div class="card-body">
                                <div class="meetup-header d-flex align-items-center">
                                    <div class="meetup-day">
                                        <h6 class="mb-0">total</h6>
                                        <h3 class="mb-0">14</h3>
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

                                    <h6 class="align-self-center cursor-pointer ml-50 mb-0">+10</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/  Card -->

                    <!-- Tipo de residência -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-browser-states">
                            <div class="card-header">
                                <div>
                                    <h4 class="card-title">Tipo de residência</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                @foreach ($tiporesidencia as $tipores)
                                    <div class="browser-states">
                                        <div class="media">
                                            <img src="../../../app-assets/images/icons/home.png" class="rounded mr-1"
                                                height="30" alt="Google Chrome" />
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

                    <!-- Tolerantes a lactose -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Não Alergicos</h4>

                            </div>
                            <div class="card-body p-0">
                                <?php $nalerg = ($saude[1]->sum * 100) / $totalalunos; ?>

                                <div id="goal-overview-radial-bar-chart" class="my-2"
                                    data-nalerg="{{ $nalerg }}"></div>
                                <div class="row border-top text-center mx-0">
                                    <div class="col-6 border-right py-1">
                                        <p class="card-text text-muted mb-0">Não Alergicos</p>
                                        {{-- <h3 class="font-weight-bolder mb-0">{{$saude[1]->sau_alergia}}</h3> --}}
                                        <h3 class="font-weight-bolder mb-0">{{ $saude[1]->sum }}</h3>
                                    </div>
                                    <div class="col-6 py-1">
                                        <p class="card-text text-muted mb-0">Alergicos</p>
                                        {{-- <h3 class="font-weight-bolder mb-0">{{$saude[2]->sau_alergia}}</h3> --}}
                                        <h3 class="font-weight-bolder mb-0">{{ $saude[2]->sum }}</h3>
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
                                                <tr>
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
                                                                ->count();
                                                            
                                                            ?>
                                                            <span
                                                                class="font-weight-bolder mb-25">{{ $contmenina ?? '0' }}</span>
                                                            <span class="font-small-2 text-muted">na série
                                                                {{ $serie->ser_apelido ?? '' }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <?php
                                                            $conttotal = DB::table('users AS u')
                                                                ->leftjoin('matriculas', 'matriculas.mat_users_id', 'u.id')
                                                                ->leftjoin('series', 'series.id', 'matriculas.mat_series_id')
                                                                ->select('u.id AS id')
                                                                ->where('series.ser_apelido', $serie->ser_apelido)
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
    <script src="../../../app-assets/vendors/js/charts/apexcharts.js"></script>
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
@endpush

@push('js_vendor')
@endpush
