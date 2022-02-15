
@extends('layouts.app', [
    'elementActive' => 'usuario'
])
@section('content')
<!-- Modal novo usuário-->
<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
    <div class="modal-dialog">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <form class="add-new-user  pt-0">
                @csrf 
                <input type="hidden" value="" name="id_geral" id="id_geral">
                
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="ediadi">Adicionar</span> Usuário</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="row"> 
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="form-label" for="fullname">Nome</label>
                                <input type="text" class="form-control dt-full-name" id="fullname" placeholder="Nome do Usuário" name="fullname" aria-label="John Doe" aria-describedby="fullname2" />
                            </div>
                        </div>                        

                        <div class="col-md-3">
                            <div class="form-group">
                               <label for="use_perfil">Perfil</label>
                               <select id="use_perfil" name="use_perfil" class="form-control select2">
                                  <option value="11">Aluno</option>
                                  <option value="12">Professor</option>
                                  <option value="13">Diretoria</option>
                                  <option value="14">Secretaria</option>
                                  <option value="16">Link Site</option>
                                  <option value="10">ADM</option>
                               </select>
                            </div>
                         </div>
                    </div>                                             
                    
                    <button type="submit" class="btn btn-primary mr-1 data-submit add waves-effect"><i data-feather='check-circle'></i> Salvar</button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> <i data-feather='x'></i> Cancelar</button>
                    <a href="" class="btn btn-outline-primary waves-effect btdetalhe" style="margin-left: 10px;"> <i data-feather='archive'></i> Detalhes</a> 

                

                </div>
            </form>         
        </div>

    </div>
</div>
<!-- Modal Fim-->
<style>
    h4{ margin-left: 18px;}
    .card-header{ margin-left: 2px;}
</style>

                
<div class="content-wrapper" data-aos=fade-left data-aos-delay=0>
    
    <div class="content-header row">
        <h4>  Gerenciar Usuários</h4>
    </div>
    <div class="content-body">
        <section class="app-user-list">
            <!-- users filter start -->
            <div class="card">
                <h5 class="card-header">Filtro da tabela</h5>
                
                <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            <!-- users filter end -->
            <!-- list section start -->
            <div class="card" >
                <div class=" " style="width: 100%; ">
                <!-- dt-complex-header table table-bordered table-responsive dataTable no-footer -->
                <table class="user-list-table dt-complex-header table table-bordered table-responsive dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info" style="width: 1444px;">
            
                    <!-- <table class="user-list-table table table-sm table-responsive-lg" style=" display: block;    width: 100%;    overflow-x: auto;    -webkit-overflow-scrolling: touch; " > -->
                        <thead class="thead-light" style="width: 100%">
                            <tr>
                                <th></th>
                                <th style="width: 20px"></th>
                                <th style="width: 250px">Nome</th>
                                <th>Email</th>
                                <th>Cidade</th>
                                <th>Sexo</th>
                                <th style="width: 100px">Perfil</th> 
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- list section end -->
        </section>
        <!-- users list ends -->
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
    <script src="../../../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-usuario-list.js"></script>
@endpush

@push('js_vendor')
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    
    
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    
@endpush


