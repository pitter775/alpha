@extends('layouts.app', [
'elementActive' => 'piloto'
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
            <h4>Criação de Tabela Piloto para Alunos</h4>
        </div>
        <div class="content-body">
            <section class="app-cardapio-list">

                <!-- list section start -->
                <div class="card">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <form id="form-piloto">
                                @csrf
                                <div class="row" style="padding: 20px">
                                <!-- Multiple -->
                                <div class="col-md-4 mb-1">
                                    <label>Usuarios</label>
                                    <select class="select2 form-control" name="users[]" id="users" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($users as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Matriculas</label>
                                    <select class="select2 form-control" name="matriculas[]" id="matriculas" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($matriculas as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Alimentares</label>
                                    <select class="select2 form-control" name="habitos_alimentares[]" id="habitos_alimentares" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($alimentares as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Presenças</label>
                                    <select class="select2 form-control" name="presencas[]" id="presencas" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($presencas as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Responsáveis</label>
                                    <select class="select2 form-control" name="responsaveis[]" id="responsaveis" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($responsaveis as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Saude</label>
                                    <select class="select2 form-control" name="saude_users[]" id="saude_users" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($saude_users as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Série</label>
                                    <select class="select2 form-control" name="series[]" id="series" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($series as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Social</label>
                                    <select class="select2 form-control" name="socials[]" id="socials" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($socials as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Endereço</label>
                                    <select class="select2 form-control" name="enderecos[]" id="enderecos" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($enderecos as $key => $value)
                                                <option value="{{ $value }}" >{{ $value }}</option>
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-12 mb-1" ><tr></tr></div>
                                <div class="col-md-12 mb-1" >
                                    <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Criar tabela com campos selecionados</button>                        
                                 </div>
                                </div>
                            </form>
                        </div>
                     
                    </div>
                </div>
                <!-- list section end -->
            </section>
        </div>
        <div class="content-body">
            <section id="tabela-piloto">

    
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
    <script src="../../../app-assets/js/scripts/pages/app-piloto-list.js"></script>
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
