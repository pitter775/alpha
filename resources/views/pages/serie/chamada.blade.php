
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

        <div class="content-header row">
            <h4>Chamada da série - {{ $series[0]->ser_apelido ?? ':('}}</h4>
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
        
        <div class="content-body" style="margin-top: 20px !important">
            <?php
            $datanaw = date('d/m/Y');
            ?>

            @foreach ($series as $seri)
                <div class="card cardserie">
                    <div class="card-header email-detail-head">
                        <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                            <?php
                            $fotoo = '/app-assets/images/avatars/avatar.png';
                            if ($seri->use_foto !== '' && $seri->use_foto !== null && $seri->use_foto !== 'undefined') {
                                $fotoo = "/arquivos/$seri->use_foto";
                            }
                            ?>
                            <div class="avatar mr-75"
                                style="background-image:url({{ $fotoo }}); background-size: cover;height: 48px; width:48px ">
                            </div>
                            <div class="mail-items">
                                <h5 class="mb-0"> {{ $seri->name ?? '' }} </h5>
                                <div class="email-info-dropup">
                                    <span class="font-small-3 text-muted" id="card_top01" style="color: #444 !important">
                                        {{ $seri->ser_nome }} -
                                        {{ date('d/m/Y', strtotime($seri->use_dt_nascimento ?? '')) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mail-meta-item d-flex align-items-center">
                            <button type="button" class="btn btn-flat-success bt-presente"
                                data-userid="{{ $seri->id ?? '' }}" data-datanaw="{{ $datanaw }}">
                                <i data-feather="smile" class="mr-25"></i>
                                <span>Presente</span>
                            </button>
                            <button type="button" class="btn  btn-flat-danger bt-falta"
                                data-userid="{{ $seri->id ?? '' }}" data-datanaw="{{ $datanaw }}">
                                <i data-feather="frown" class="mr-25"></i>
                                <span>Falta</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection



@push('css_vendor')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-email.css"> --}}
@endpush

@push('js_page')
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-serie-list.js"></script>
    {{-- <script src="../../../app-assets/js/scripts/pages/app-email.js"></script> --}}
@endpush

@push('js_vendor')
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
@endpush
