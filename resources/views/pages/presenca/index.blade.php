    @extends('layouts.app', [
    'elementActive' => 'presenca'
    ])
    @section('content')

        <style>
            h4 {
                margin-left: 18px;
            }

            .card-header {
                margin-left: 2px;
            }

        </style>       


        <div class="content-wrapper" data-aos=fade-left data-aos-delay=0>

            <div class="content-header row">
                <h4>                
                    Lista Geral de Presenças
                </h4>
            </div>

            <div class="content-body " style="margin-top: 20px">
            <section class="app-presenca-list" >

                <!-- list section start -->
                <div class="card" style="padding: 20px">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="dt_inicial">Data inicial</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i data-feather='calendar'></i>
                                        </span>
                                </div>                                    
                                <input id="dt_inicial" type="text" class="form-control flatpickr-basic" name="dt_inicial" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="dt_final">Data Final</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i data-feather='calendar'></i>
                                        </span>
                                </div>                                    
                                <input id="dt_final" type="text" class="form-control flatpickr-basic"  name="dt_final" />
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <div class="row" id="press_total">
                                <div class="col-md-3">
                                    <label for="use_dt_nascimento">Alunos</label>
                                    <div class="input-group input-group-merge" style="font-size: 25px" id="totalAlunos">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="totalAlunos">Ocorrencias</label>
                                    <div class="input-group input-group-merge" style="font-size: 25px" id="totalOcorrencias">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="totalpresentes">Presenças</label>
                                    <div class="input-group input-group-merge" style="font-size: 25px; color: rgb(70, 180, 88)" id="totalpresentes">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="totalfaltas">Faltas</label>
                                    <div class="input-group input-group-merge" style="font-size: 25px; color: rgb(187, 78, 78)" id="totalfaltas">
                                    </div>
                                </div>
                            </div>                                
                        </div>
                    </div>               
                </div>
            </section>
            </div>

            <div class="row">
                <div class="content-body col-md-7">
                    <div class="content-wrapper" data-aos=fade-left data-aos-delay=0>

                        <div class="content-header row">
                            <h4> 
                                <i data-feather="check-circle" class="font-medium-4 "></i>
                                <span class="align-middle">Todas as Classes</span>
                            </h4>
                        </div>
                        <div class="content-body">
                            <section class="app-cardapio-list">                
                                <!-- list section start -->
                                <div class="card">
                                    <div class=" " style="width: 100%;">
                                        <table class="serie-list-table table table-sm table-responsive-lg">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>id</th>
                                                    <th>serie</th>
                                                    <th>id serie</th>
                                                    <th>professora</th>
                                                    <th>falta</th>
                                                    <th>presença</th>
                                                    <th>total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- list section end -->
                            </section>
                            <!-- cardapios list ends -->
                        </div>
                    </div>
                    <!-- presencas list ends -->
                </div>
                <div class="content-body col-md-5">
                    <div class="content-wrapper" data-aos=fade-left data-aos-delay=0>

                        <div class="content-header row">
                            <h4> 
                                <i data-feather="check-circle" class="font-medium-4 "></i>
                                <span class="align-middle">Por Classe</span>
                            </h4>
                        </div>
                        <div class="content-body">
                            <section class="app-classe-list">                
                                <!-- list section start -->
                                <div class="card">
                                    <div class=" " style="width: 100%;">
                                        <table class="classe-list-table table table-sm table-responsive-lg">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>id</th>
                                                    <th>serie</th>
                                                    <th>Aluno</th>
                                                    <th>falta</th>
                                                    <th>presença</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- list section end -->
                            </section>
                            <!-- cardapios list ends -->
                        </div>
                    </div>
                    <!-- presencas list ends -->
                </div>
            </div>            
        </div>
    @endsection

    @push('css_vendor')
        <link rel="stylesheet" type="text/css"
            href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="../../../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">

    @endpush

    @push('css_page')
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">
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
        <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
        <script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
        <script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
        <script src="../../../app-assets/js/scripts/pages/app-presenca-list.js"></script>
        <script src="../../../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
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
    @endpush
