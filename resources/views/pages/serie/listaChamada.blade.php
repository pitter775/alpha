@foreach ($series as $seri)
<div class="card cardserie @if ($seri->presenca == 1) divpresente @endif @if ($seri->presenca == 2) divfalta @endif">
    <div class="card-header email-detail-head ">
        <div class="user-details d-flex justify-content-between align-items-center flex-wrap ">
            <?php
            $fotoo = '/app-assets/images/avatars/avatar.png';
            if ($seri->use_foto !== '' && $seri->use_foto !== null && $seri->use_foto !== 'undefined') {
                $fotoo = "/arquivos/$seri->use_foto";
            }
            ?>
            <div class="avatar btavataruser mr-75" data-iduser="{{$seri->id}}"
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
        <div class="mail-meta-item d-flex align-items-center  ">
            <button type="button" class="btn btn-flat-success bt-presente"
                data-userid="{{ $seri->id ?? '' }}" >
                <i data-feather="smile" class="mr-25"></i>
                <span>Presente</span>
            </button>
            <button type="button" class="btn  btn-flat-danger bt-falta"
                data-userid="{{ $seri->id ?? '' }}" >
                <i data-feather="frown" class="mr-25"></i>
                <span>Falta</span>
            </button>
        </div>
    </div>
</div>
@endforeach