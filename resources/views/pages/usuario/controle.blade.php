<style>
    .cke2 {
        margin-top: 20px
    }

    .che2k {
        margin-bottom: 0px !important
    }

</style>
<div class="row mt-1">
    <div class="col-12">
        <h4 class="mb-1">
            <i data-feather='activity' class="font-medium-4 mr-25"></i>
            <span class="align-middle">Situação atual <span id="titcont"></span></span>
        </h4>
        {{-- div aluno --}}
        <form class="form-controle-aluno">
            @csrf
            <input type="hidden" value="{{ $user->mat_escolas_id ?? '' }}" name="mat_escolas_id" id="mat_escolas_id">
            <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral" id="id_geral" />
            <input type="hidden" value="controle-aluno" id="salvarDados-cont" name="salvarDados">

            <div class="divperfilAluno row">
                <div class="col-md-8" style="padding-top: 20px">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="clipboard" class="avatar-icon font-medium-3"></i>
                            </div>
                            </div>
                            <div class="media-body">
                            <h6 class="mb-0">Tipo</h6>
                            <small id="situ_matricula"></small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="award" class="avatar-icon font-medium-3"></i>
                            </div>
                            </div>
                            <div class="media-body">
                            <h6 class="mb-0">Professora</h6>
                            <small id="situ_prof"></small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                            <div class="avatar-content">
                                <i data-feather="tag" class="avatar-icon font-medium-3"></i>
                            </div>
                            </div>
                            <div class="media-body">
                            <h6 class="mb-0">Serie</h6>
                            <small id="situ_serie"></small>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row" style="border-top: solid 1px #eee; margin-top: 30px" >
                        <div class="col-8" >
                            <h4 class="mb-1 mt-2">
                                {{-- <i data-feather='activity' class="font-medium-4 mr-25"></i> --}}
                                <span class="align-middle">Registrar Alteração</span>
                            </h4>
                        </div>  
                        <div class="col-md-4 ">
                            <div class="form-group">
                               <label class="d-block mb-1">Retroativo ?</label>
                               <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="altsim" name="altsimnao" value="" class="custom-control-input" checked />
                                  <label class="custom-control-label check" for="altsim"  >Não</label>
                               </div>
                               <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="altnao" name="altsimnao" class="custom-control-input" value="1"  />
                                  <label class="custom-control-label check" for="altnao">Sim</label>
                               </div>
                            </div>
                         </div>                  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo_alteracao">Tipo de Alteração</label>
                                <select id="tipo_alteracao" name="tipo_alteracao" class="form-control select2">
                                    <option value="Matricula">Matrícula</option>  
                                    <option value="Remanejamento">Remanejamento</option>
                                    <option value="Transferência">Transferência</option>   
                                    <option value="Abandono">Abandono</option>  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 seriealuno">
                            <div class="form-group">
                                <label for="alt_series">Selecione a Série do Aluno</label>
                                <select id="alt_series" name="mat_series_id_alu" class="form-control select2">
                                    <option value=""></option>
                                    @foreach ($series as $key => $value)
                                        <option value="{{ $value->id }}" @if ($user->mat_series_id == $value->id) selected @endif>{{ $value->ser_nome }} - {{ $value->ser_periodo }} - {{ $value->ser_apelido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <label for="alt_data">Data da Alteração</label>
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i data-feather='calendar'></i>
                                    </span>
                                </div>
                                <input id="alt_data" type="text" class="form-control flatpickr-basic" name="alt_data" />
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="padding-top:20px">
                            @if (Auth::user()->use_perfil !== 12) <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button> @endif  
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @include('pages.usuario.add_calendario')
                </div>
            </div>
        </form>
        {{-- div professor --}}
        <form class="form-controle">
            @csrf
            <input type="hidden" value="{{ $user->mat_escolas_id ?? '' }}" name="mat_escolas_id" id="mat_escolas_id">
            <input type="hidden" value="{{ $user->id ?? '' }}" name="id_geral" id="id_geral" />
            <input type="hidden" value="controle-professor" id="salvarDados-cont" name="salvarDados">

            <div class="divperfilProfessor row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="prof_series_id">Atribuir série ao Professor</label>
                        <select id="prof_series_id" name="prof_series_id" class="form-control select2">
                            <option value=""></option>
                            @foreach ($series as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->ser_nome }} - {{ $value->ser_apelido }} -
                                    {{ $value->ser_periodo }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (Auth::user()->use_perfil !== 12) <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button> @endif 
                </div>
                
            </div>
            <div class="divperfilOutro row"></div>
        </form>

        @include('pages.usuario.controle-alteracao-list')

    </div>

</div>
