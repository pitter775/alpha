
@extends('layouts.app', [
    'elementActive' => 'qrcode'
])
@section('content')

<style>
    h4{ margin-left: 18px;}
    .card-header{ margin-left: 2px;}
    .tox-statusbar__branding{ display: none !important}
    .dropzone .dz-preview {zoom: 0.8;}
    .dz-message { font-size: 15PX !important}
    .dropzone .dz-message:before {content: '' !important; background-image: url('') !important;}
    .btimprimirqr{ cursor: pointer;}
    </style>

<!-- Modal -->


                
<div class="content-wrapper" data-aos=fade-left data-aos-delay=0>
    
    <div class="content-header row">
        <h4>Gerenciar QR Codes</h4>
    </div>

    <div class="content-body" id="gerePub" style="margin-bottom: 30px">
        <a href="/qrcode/imprimirTodosQrcode" target="_blank" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 btlistaqrcode"> <i data-feather='printer'></i> Lista para Imprimir todos os Alunos</a>
    </div>



    <div class="content-body" style="margin-top: 0px">
        <section class="app-qrcode-list">
            <!-- list section start -->
            <div class="card" >
                <div class=" " style="width: 100%;">
                    <table class="piloto-list-table table table-sm table-responsive-lg">
                        <thead class="thead-light">
                            <tr>
                                <th>Nome</th>
                                <th>Serie</th>
                            </tr>
                        </thead>
                        <TBOdy>
                            @foreach($users as $key => $tab)                                               
                            <tr style="margin-top: 20px" class="btimprimirqr" data-idaluno="{{$tab->id}}">                                
                                <td>{{$tab->name}}</td>
                                <td>{{ $tab->ser_apelido . ' - ' . $tab->ser_nome}}</td>
                            </tr>                            
                            @endforeach
                        </TBOdy>
                    </table>
                </div>
            </div>
            <!-- list section end -->
        </section>
        <!-- publicacaos list ends -->
    </div>
</div>
@endsection

@push('css_vendor')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">   
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">    

    <script src="../../../app-assets/vendors/js/tinymce/tinymce.min.js"></script>
    


@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/dropzone.min.css">
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
    <!-- <script src="../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script> -->
    <script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>    
    <script src="../../../app-assets/js/scripts/forms/form-select2.js"></script> 
    <script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-qrcode-list.js"></script>

    <script src="../../../app-assets/js/scripts/dropzone.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-file-uploader.js"></script>
    {{-- <script src="../../../app-assets/js/scripts/pages/app-usuario-detalhe.js"></script> --}}
    

   
@endpush

@push('js_vendor')
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
        {{-- <script src="../../../app-assets/js/scripts/pages/app-usuario-detalhe.js"></script> --}}
   
    


@endpush


