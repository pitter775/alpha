@extends('layouts.app', [
'elementActive' => 'cardapio'
])
@section('content')
    <!-- Modal novo usuário-->
    <div class="modal modal-slide-in new-cardapio-modal fade" id="modals-slide-in">
        <div class="modal-dialog">
            <form class="add-new-cardapio modal-content pt-0">
                @csrf
                <input type="hidden" value="" name="id_geral" id="id_geral">
                <input type="hidden" value="1" name="ser_escolas_id" id="ser_escolas_id">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="ediadi">Adicionar</span> Cardápio
                    </h5>
                </div>
                <div class="modal-body flex-grow-1">

                    <div class="row mb-25">
                        <div class="col-md-4">
                            <label for="car_data">Data Alteração</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i data-feather='calendar'></i>
                                    </span>
                                </div>
                                <input id="car_data" type="text" class="form-control flatpickr-basic" name="car_data" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for='series_id'>Classes</label>
                                <select class="form-control select2" name="series_id[]" id="series_id" multiple>
                                    @foreach ($series as $value)
                                        <option value="{{ $value->id }}">{{ $value->ser_apelido }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="apelido" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="car_cardapio">Cardápio</label>
                                <textarea class="form-control" id="car_cardapio" name="car_cardapio" rows="3" placeholder="Textarea"
                                    style="height: 214px;"></textarea>
                            </div>
                        </div>

                    </div>



                    <button type="submit" class="btn btn-primary mr-1 data-submit add waves-effect"><i
                            data-feather='check-circle'></i> Salvar</button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> <i
                            data-feather='x'></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Fim-->
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
            <h4>Gerenciar Cardápio</h4>
        </div>
        <div class="content-body">
            <section class="app-cardapio-list">

                <!-- list section start -->
                <div class="card">
                    <div class=" " style="width: 100%;">
                        <table class="cardapio-list-table table table-sm table-responsive-lg">
                            <thead class="thead-light">
                                <tr>
                                    <th>id</th>
                                    <th>cardápio</th>
                                    <th>data</th>
                                    <th>series_id</th>
                                    <th>ser_nome</th>
                                    <th>ser_periodo</th>
                                    <th>Série</th>
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
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
    <script src="../../../app-assets/js/scripts/pages/app-cardapio-list.js"></script>
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
