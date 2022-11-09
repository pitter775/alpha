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
    .my-table {
    width: 100%;
    border: solid;
    table-layout: fixed;
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
                                    <label>Dados Pessoais</label>
                                    <select class="select2 form-control" name="users[]" id="users" multiple>
                                        <optgroup label="Dados Pessoais">
                                            
                                            @foreach($users as $key => $value)
                                                <?php
                                                    $novoValule = '';
                                                    switch ($value) {
                                                        case 'name':$novoValule = 'Nome';break;
                                                        // case 'use_perfil':$novoValule = 'Perfil';break;
                                                        // case 'email':$novoValule = 'E-mail';break;
                                                        case 'use_status':$novoValule = 'Status';break;
                                                        case 'use_rg':$novoValule = 'RG';break;
                                                        case 'use_cpf':$novoValule = 'CPF';break;
                                                        case 'use_sexo':$novoValule = 'Sexo';break;
                                                        case 'use_dt_nascimento':$novoValule = 'Data de Nascimento';break;
                                                        case 'use_transport_particular':$novoValule = 'Transporte Particular';break;
                                                        // case 'use_cartao_sus':$novoValule = 'Cartão do SUS';break;
                                                    }
                                                ?>
                                                @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                              
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Situação</label>
                                    <select class="select2 form-control" name="alteracaos[]" id="alteracaos" multiple>
                                        <optgroup label="Dados de Matrícula">
                                            @foreach($alteracaos as $key => $value)
                                                <?php
                                                    $novoValule = '';
                                                    switch ($value) {
                                                        case 'alt_tipo':$novoValule = 'Situação';break;
                                                        case 'alt_data':$novoValule = 'Data da Situação';break;                                                        
                                                    }
                                                ?>
                                                @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Hábitos Alimentares</label>
                                    <select class="select2 form-control" name="habitos_alimentares[]" id="habitos_alimentares" multiple>
                                        <optgroup label="Todos os hábitos Alimentares">
                                            @foreach($alimentares as $key => $value)
                                                <?php
                                                    $novoValule = '';
                                                    switch ($value) {
                                                        case 'hab_leite':$novoValule = 'Leite';break;
                                                        case 'hab_salsicha':$novoValule = 'Salsicha';break;                                                        
                                                        case 'hab_salgadinhos_doces':$novoValule = 'Salgadinhos e Doces';break;                                                        
                                                        case 'hab_queijo':$novoValule = 'Queijo';break;                                                        
                                                        case 'hab_verduras_legumes':$novoValule = 'Verduras e Legumes';break;                                                        
                                                        case 'hab_macarrao_instantaneo':$novoValule = 'Macarrão Instantaneo';break;                                                        
                                                        case 'hab_yakult':$novoValule = 'Yakult';break;                                                        
                                                        case 'hab_arroz_feijao_graos':$novoValule = 'Arroz, feijao e grãos';break;                                                        
                                                        case 'hab_figado_miudos':$novoValule = 'Figado e miudos';break;                                                        
                                                        case 'hab_bolacha':$novoValule = 'Bolacha';break;                                                        
                                                        case 'hab_macarrao_molho':$novoValule = 'Macarrao com molho';break;                                                        
                                                        case 'hab_danone':$novoValule = 'Danone';break;                                                        
                                                        case 'hab_canes':$novoValule = 'Carnes';break;                                                        
                                                        case 'hab_frutas':$novoValule = 'Frutas';break;                                                        
                                                        case 'hab_chocolate':$novoValule = 'Chocolate';break;                                                        
                                                        case 'hab_frango':$novoValule = 'Frango';break;                                                        
                                                        case 'hab_peixe':$novoValule = 'Peixe';break;                                                        
                                                        case 'hab_ovos':$novoValule = 'Ovos';break;                                                        
                                                    }
                                                ?>
                                                 @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                                 
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Responsáveis</label>
                                    <select class="select2 form-control" name="responsaveis[]" id="responsaveis" multiple>
                                        <optgroup label="Todas os dados da coluna Responsáveis">
                                            @foreach($responsaveis as $key => $value)
                                            <?php
                                                $novoValule = '';
                                                switch ($value) {
                                                    case 'resp_nome':$novoValule = 'Nome';break;
                                                    case 'resp_telefone':$novoValule = 'Telefone';break;                                                        
                                                    case 'resp_profissao':$novoValule = 'Profissão';break;                                                        
                                                    case 'resp_autorizacao':$novoValule = 'Autorização';break;                                                        
                                                    case 'resp_parentesco':$novoValule = 'Parentesco';break;                                   
                                                }
                                            ?>
                                            @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Saude</label>
                                    <select class="select2 form-control" name="saude_users[]" id="saude_users" multiple>
                                        <optgroup label="Todas as colunas de Saude">
                                            @foreach($saude_users as $key => $value)
                                            <?php
                                            $novoValule = '';
                                            switch ($value) {
                                                case 'sau_sus':$novoValule = 'Número do SUS';break;
                                                case 'sau_convenio':$novoValule = 'Convênio';break;     
                                                case 'sau_tipo_sangue':$novoValule = 'Tipo do sangue';break;     
                                                case 'sau_necessidades_especial':$novoValule = 'Necessidades Especiais';break;            
                                                case 'sau_animais_qual':$novoValule = 'Animais';break;            
                                                case 'sau_descricao_saude':$novoValule = 'Descrição da Saude';break;            
                                                case 'sau_xixi_cama':$novoValule = 'Faz xixi na cama';break;            
                                                case 'sau_medicamento_qual':$novoValule = 'Uso de Medicamento';break;            
                                                case 'sau_tratamento_motivo':$novoValule = 'Tratamentos';break;            
                                                case 'sau_internado_motivo':$novoValule = 'Internamentos';break;            
                                                case 'sau_cirurgia_motivo':$novoValule = 'Cirurgias';break;            
                                                case 'sau_cirurgia_motivo':$novoValule = 'Cirurgias';break;            
                                                case 'sau_desmaios':$novoValule = 'Desmaios';break;            
                                                case 'sau_convulsoes':$novoValule = 'Convulsões';break;            
                                                case 'sau_intolerancia_outros':$novoValule = 'Intolerâncias Outros';break;            
                                                case 'sau_intolerancia_glutem':$novoValule = 'Intolerância Glutem';break;            
                                                case 'sau_intolerancia_lactose':$novoValule = 'Intolerância Lactose';break;            
                                                case 'sau_alergia_detalhe':$novoValule = 'Alergias';break;            
                                                case 'sau_parto':$novoValule = 'Parto Normal';break;            
                                                case 'sau_sarampo':$novoValule = 'Sarampo';break;            
                                                case 'sau_caxumba':$novoValule = 'Caxumba';break;            
                                                case 'sau_coqueluche':$novoValule = 'Coqueluche';break;            
                                                case 'sau_catapora':$novoValule = 'Catapora';break;            
                                                case 'sau_rubeola':$novoValule = 'Rubeola';break;            
                                                case 'sau_hepatite':$novoValule = 'Hepatite';break;            
                                                case 'sau_bronquite':$novoValule = 'Bronquite';break;            
                                                case 'sau_asma':$novoValule = 'Asma';break;            
                                                case 'sau_anemia':$novoValule = 'Anemia';break;            
                                                case 'sau_menigite':$novoValule = 'Menigite';break;            
                                                case 'sau_outras':$novoValule = 'Outras doenças';break;            
                                            }
                                        ?>
                                        @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                            @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Série</label>
                                    <select class="select2 form-control" name="series[]" id="series" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($series as $key => $value)
                                            <?php
                                            $novoValule = '';
                                            switch ($value) {
                                                case 'ser_nome':$novoValule = 'Nome da Série';break;
                                                case 'ser_periodo':$novoValule = 'Período';break;                                                        
                                                case 'ser_apelido':$novoValule = 'Apelido da Série';break;                               
                                            }
                                        ?>
                                        @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                        @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Social</label>
                                    <select class="select2 form-control" name="socials[]" id="socials" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($socials as $key => $value)
                                            <?php
                                            $novoValule = '';
                                            switch ($value) {
                                                case 'soc_tipo_residencia':$novoValule = 'Tipo de Residência';break;
                                                case 'soc_residencia_comodos':$novoValule = 'Comodos na Residência';break;                                                        
                                                case 'soc_residentes':$novoValule = 'Quantos Residentes';break;                               
                                                case 'soc_agua_encanada':$novoValule = 'Água Encanada';break;                               
                                                case 'soc_esgoto':$novoValule = 'Esgoto';break;                               
                                                case 'soc_fossa':$novoValule = 'Foça';break;                               
                                                case 'soc_luz_eletrica':$novoValule = 'Luz Eletrica';break;                               
                                                case 'soc_internet':$novoValule = 'Internet';break;                               
                                                case 'soc_computador':$novoValule = 'Computador';break;                               
                                                case 'soc_veiculo':$novoValule = 'Veículo';break;                               
                                                case 'soc_renda_familiar':$novoValule = 'Renda Familiar';break;                           
                                            }
                                        ?>
                                        @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                        @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label>Endereço</label>
                                    <select class="select2 form-control" name="enderecos[]" id="enderecos" multiple>
                                        <optgroup label="Todas as colunas da tabela">
                                            @foreach($enderecos as $key => $value)
                                            <?php
                                            $novoValule = '';
                                            switch ($value) {
                                                case 'end_rua':$novoValule = 'Nome da Rua';break;
                                                case 'end_numero':$novoValule = 'Número da Casa';break;                                                        
                                                case 'end_complemento':$novoValule = 'Complemento';break;                               
                                                case 'end_cep':$novoValule = 'CEP';break;                               
                                                case 'end_cidade':$novoValule = 'Cidade';break;                               
                                                case 'end_estado':$novoValule = 'Estado';break;                               
                                                case 'end_pais':$novoValule = 'Pais';break;                               
                                                case 'end_bairro':$novoValule = 'Bairro';break;                               
                                            }
                                        ?>
                                        @if($novoValule) <option value="{{ $value }}" >{{ $novoValule }}</option> @endif
                                        @endforeach
                                        </optgroup>                                    
                                    </select>
                                </div>
                                <div class="col-md-12 mb-1" ><tr></tr></div>
                                <div class="col-md-12 mb-1" >
                                    <button type="submit" id="tabelaPiloto" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Criar tabela com campos selecionados</button>                        
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
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
