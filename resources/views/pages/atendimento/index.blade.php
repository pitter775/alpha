@extends('layouts.app', [
'elementActive' => 'atendimento'
])
@section('content')

<!-- Modal -->
<div class="modal text-left" id="modalLargo" tabindex="-1"role="dialog"aria-labelledby="myModalLabel17"aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
        <div class="novomod" style="width: 100%; background-color: #f4f5f7">
            <form class="add-new-cardapio modal-content pt-0">    
                <div class="modal-content"  id="novoAtendimento"></div>
            </form>
        </div>

        <div class="vermod" style="width: 100%; background-color: #f4f5f7">
            <form class="add-ver-cardapio modal-content pt-0">    
                <div class="modal-content"  id="verAtendimento"></div>
            </form>
        </div>

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

        .ver_atendimento {-webkit-box-shadow: none;box-shadow: none;-webkit-transition: all 0.25s ease-in-out;transition: all 0.25s ease-in-out; cursor: pointer;}
        .ver_atendimento:hover {        -webkit-box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.2), 0 4px 10px 0 rgba(0, 0, 0, 0.12); box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.2), 0 4px 10px 0 rgba(0, 0, 0, 0.12);-webkit-transition: all 0.25s ease-out;transition: all 0.25s ease-out;}
        h4{ margin-left: 0px;}

    

    </style>


    <div class="content-wrapper" data-aos=fade-left data-aos-delay=0>

        <div class="content-header row">
            <h4>Gerenciar Atendimento</h4>
        </div>
        <div class="content-body">
            <section class="app-cardapio-list2">

                <!-- list section start -->
                <div class="card">
                    <div class=" " style="width: 100%;">
                        <table class="cardapio-list-table table table-sm table-responsive-lg">
                            <thead class="thead-light">
                                 <tr>
                                    <th>id</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Tipo</th>
                                    <th>Titulo</th>
                                    <th>Data</th>
                                    <th>Status</th>                              
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
    <script src="../../../app-assets/js/scripts/pages/app-atendimento-list.js"></script>
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
