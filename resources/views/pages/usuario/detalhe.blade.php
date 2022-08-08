@extends('layouts.app', [
'elementActive' => 'usuario'
])
@section('content')

<div id="imprimirprontuario" style="">

</div>
    <style>
        .dropzone .dz-preview {
            zoom: 0.8;
        }

        .custom-control-label {
            cursor: pointer !important;
        }

        .text-adm {
            color: #66619c !important;
        }

    </style>
    <!-- BEGIN: Content-->
    <div class="content-wrapper" data-aos=fade-left data-aos-delay=0>
        <input type="hidden" value="{{ $user->id ?? '' }}" name="iduser" id="iduser">
        <input type="hidden" value="{{ $user->use_perfil ?? '' }}" name="perfiluser" id="perfiluser">


        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills" role="tablist">
                            @if (Auth::user()->use_perfil !== 12)
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="account-tab" data-toggle="tab"
                                    href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i data-feather="user"></i><span class="d-none d-sm-block">Conta</span>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="information-tab" data-toggle="tab"
                                    href="#information" aria-controls="information" role="tab" aria-selected="false">
                                    <i data-feather="info"></i><span class="d-none d-sm-block">Informações</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="endereco-tab" data-toggle="tab"
                                    href="#endereco" aria-controls="endereco" role="tab" aria-selected="false">
                                    <i data-feather='map-pin'></i><span class="d-none d-sm-block">Endereço</span>
                                </a>
                            </li>

                            @if ($user->use_perfil == 11)

                            <li class="nav-item liresp">
                                <a class="nav-link d-flex align-items-center" id="responsaveis-tab" data-toggle="tab"
                                    href="#responsaveis" aria-controls="responsaveis" role="tab" aria-selected="false">
                                    <i data-feather='user-check'></i><span class="d-none d-sm-block">Responsáveis</span>
                                </a>
                            </li>
                            <li class="nav-item lisaud">
                                <a class="nav-link d-flex align-items-center" id="saude-tab" data-toggle="tab" href="#saude"
                                    aria-controls="saude" role="tab" aria-selected="false">
                                    <i data-feather='heart'></i><span class="d-none d-sm-block">Saúde</span>
                                </a>
                            </li>
                            <li class="nav-item lialimen">
                                <a class="nav-link d-flex align-items-center" id="alimentares-tab" data-toggle="tab"
                                    href="#alimentares" aria-controls="alimentares" role="tab" aria-selected="false">
                                    <i data-feather='coffee'></i><span class="d-none d-sm-block">Alimentares</span>
                                </a>
                            </li>

                            @endif

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="arquivos-tab" data-toggle="tab"
                                    href="#arquivos" aria-controls="arquivos" role="tab" aria-selected="false">
                                    <i data-feather='file'></i><span class="d-none d-sm-block">Arquivos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" onclick="addCalendar()" id="controle-tab" data-toggle="tab"
                                    href="#controle" aria-controls="controle" role="tab" aria-selected="false">
                                    <i data-feather='activity'></i><span class="d-none d-sm-block">Controle</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" onclick="addCalendar()" id="observacao-tab" data-toggle="tab"
                                    href="#observacao" aria-controls="observacao" role="tab" aria-selected="false">
                                    <i data-feather='message-square'></i><span class="d-none d-sm-block">Observações</span>
                                </a>
                            </li>
                        </ul>
                    </div>
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

                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="account" aria-labelledby="account-tab"
                                            role="tabpanel">
                                            <form class="form-conta" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral" />
                                                @include('pages.usuario.conta')
                                            </form>
                                        </div>
                                        <div class="tab-pane active " id="information" aria-labelledby="information-tab"
                                            role="tabpanel">
                                            <form class="form-pessoais">
                                                @csrf
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral" />
                                                @include('pages.usuario.pessoais')
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="endereco" aria-labelledby="endereco-tab"
                                            role="tabpanel">
                                            <form class="form-endereco">
                                                @csrf
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral" />
                                                @include('pages.usuario.endereco')
                                            </form>
                                        </div>
                                        <div class="tab-pane fade liresp" id="responsaveis"
                                            aria-labelledby="responsaveis-tab" role="tabpanel">
                                            <form class="form-responsavel">
                                                @csrf
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral" />
                                                @include('pages.usuario.responsaveis')
                                            </form>
                                        </div>
                                        <div class="tab-pane fade lisaud" id="saude" aria-labelledby="saude-tab"
                                            role="tabpanel">
                                            <form class="form-saude">
                                                @csrf
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral" />
                                                @include('pages.usuario.saude')
                                            </form>
                                        </div>
                                        <div class="tab-pane fade lialimen" id="alimentares"
                                            aria-labelledby="alimentares-tab" role="tabpanel">
                                            <form class="form-alimentares">
                                                @csrf
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral" />
                                                @include('pages.usuario.alimentares')
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="controle" aria-labelledby="controle-tab" role="tabpanel">
                                            @include('pages.usuario.controle')
                                            @include('pages.usuario.controle-prof-list')
                                        </div>
                                        <div class="tab-pane fade " id="observacao" aria-labelledby="observacao-tab"
                                            role="tabpanel">
                                            <form class="form-observacao">
                                                @csrf
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral" />
                                                @include('pages.usuario.observacao')
                                            </form>

                                            @include('pages.usuario.observacao-list')


                                        </div>
                                        <div class="tab-pane fade " id="arquivos" aria-labelledby="arquivos-tab"
                                            role="tabpanel">
                                            <form action="{{ route('dropzoneFileUpload') }}" class="dropzone"
                                                id="file-upload" enctype="multipart/form-data" style="height: 200px;">
                                                @csrf
                                                <div class="dz-message">
                                                    Clique ou solte os arquivos aqui.<br>
                                                </div>
                                                <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral"
                                                    id="id_geral">
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

                    </div>
                    <!--/ User Content -->
                </div>
            </section>




        </div>
    </div>

    <script>

    </script>

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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/calendars/fullcalendar.min.css">
@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-file-uploader.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-file-manager.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-calendar.css">
@endpush

@push('js_page')
    <script src="../../../app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
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
    <script src="../../../app-assets/vendors/js/tables/datatable/datetime.js"></script>

    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="../../../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
    <script src="../../../app-assets/js/scripts/dropzone.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-file-uploader.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

    <script src="../../../app-assets/js/scripts/pages/app-usuario-detalhe.js"></script>

    <script src="../../../app-assets/js/scripts/forms/form-number-input.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-calendar-events.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-calendar.js"></script>
@endpush

@push('js_vendor')
    <script src="../../../app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
@endpush
