
@extends('layouts.app', [
'elementActive' => $series[0]->ser_apelido ?? ''
])
@section('content')
    <!-- Modal Fim-->
    <style>
        h4 {
            margin-left: 18px;
        }

        .card-header {
            margin-left: 2px;
        }

        .cardserie {
            box-shadow: none !important;
            margin-bottom: -1px !important;
            border: solid 1px #eee
        }

        .cardserie:hover {
            box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%) !important;
            z-index: 9999;
        }

        .divfalta {
            background: linear-gradient(90deg, rgba(255,115,115,0.2393732492997199) 22%, rgba(255,255,255,1) 70%);
            border: solid 1px #b76262
        }

        .divpresente {
            background: linear-gradient(90deg, rgba(115,255,115,0.23461134453781514) 22%, rgba(255,255,255,1) 70%);;
            border: solid 1px #76b762
        }

    </style>
    <div class="content-wrapper email-application" data-aos=fade-left data-aos-delay=0>
        <input id="idserie" type="hidden" name="idserie" value="{{$idserie}}"  />
        <div class="content-header">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-8" style="padding-left: 0px"><h4>Chamada da série - {{ $series[0]->ser_apelido ?? ':('}}</h4></div>
                <div class="col-md-4" style="text-align: right">
                    <label for="car_data">Dia da Chamada</label>
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i data-feather='calendar'></i>
                            </span>
                        </div>
                        <input id="car_data" type="text" class="form-control flatpickr-basic" name="car_data" />
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="card-text text-primary mb-0" style="margin-left: 4px"><span style="font-weight: bold">{{$series->count() ?? '0'}} </span> de alunos da {{ $series[0]->ser_apelido  ?? ''}}</p>
            </div>
            <div class="col-md-6 align-self-end">
                <div class="badge badge-light-success"><i data-feather="smile"></i> <span class="sppresente">0</span></div>
                <div class="badge badge-light-danger"><i data-feather="frown" ></i> <span class="spfalta">0</span></div>
            </div>
        </div>
        <?php $datanaw = date('d/m/Y'); ?>

        <div class="content-body" id="listaChamada" style="margin-top: 20px !important">

        </div>
    </div>
@endsection



@push('css_vendor')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-email.css"> --}}
@endpush

@push('js_page')
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="../../../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
    
    <script src="../../../app-assets/js/scripts/pages/app-chamada.js"></script>
    {{-- <script src="../../../app-assets/js/scripts/pages/app-email.js"></script> --}}
@endpush

@push('js_vendor')
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
@endpush
