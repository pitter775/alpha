<style>
    .media-body2{ margin-bottom: 20px; padding: 15px; background-color: #e2e4e9; }
    .comentcs { margin-top: 20px;}

</style>

<div class="modal-header" style="background-color: #eee;">
    <h4 class="modal-title" id="myModalLabel17">{{$ver->ate_titulo ?? ''}}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" style="width: 100%; background-color: #f4f5f7; padding: 0">    
    @csrf
    <div class="divAtendimento row" style="width: 100%; padding:0; margin-left: 0px;">
        <div class="col-md-9">
            <h4 style="margin-top: 20px;">Descrição:</h4>
            <h5 class="apply-job-title" style="padding: 15px; background-color: #e2e4e9">{{$ver->ate_mensagem ?? ''}}</h5>

            <div class="media align-items-center" style="margin-top: 30px;" >
                <div class="avatar">
                    @if(Auth::user()->use_foto == null)
                        <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" alt="avatar" height="38" width="38">
                    @endif
                    @if(Auth::user()->use_foto !== null)
                        <img src="{{asset('arquivos').'/'.Auth::user()->use_foto}}" alt="avatar" height="38" width="38">
                    @endif
                </div>                
                <textarea class="form-control" id="com_texto" name="com_texto" rows="1" data-idver = "{{$ver->id ?? ''}}" placeholder="Escreva o comentário..."></textarea>
                
            </div>

            <div class="divcoments">

            </div>


           
        </div>

        <div class="col-md-3" style=" padding: 0; margin-right: -20px !important">
            <div class="media-body media-body2" style="margin-top: 0px; background-color: #f4f5f7;">
                <div class="form-group">
                    <select id="ate_status_ver" data-idver = "{{$ver->id ?? ''}}" name="ate_status" class="form-control select2">                        
                        <option value="Ativo" @if($ver->ate_status == 'Ativo') selected @endif>Ativo</option>
                        <option value="Resolvido" @if($ver->ate_status == 'Resolvido') selected @endif>Resolvido</option>                              
                    </select>
                </div>
            </div>

            <div class="media-body media-body2">
                <h6 class="mb-0">{{$ver->ate_tipo  ?? ''}}</h6>
                <small>Tipo</small>
            </div>

            <div class="media-body media-body2">
                <h6 class="mb-0">{{$ver->ate_nome ?? ''}}</h6>
                <small>Solicitante</small>
            </div>

            <div class="media-body media-body2">
                <h6 class="mb-0">{{$ver->name ?? ''}}</h6>
                <small>Referente ao Aluno</small>
            </div>

            <div class="media-body media-body2">
                <h6 class="mb-0"><?php echo date( 'd/m/Y' , strtotime($ver->created_at));  ?></h6>
                <small>Criado em</small>
            </div>
        </div>   

    </div>
</div>
    
</div>

    
    <div class="modal-footer">
        {{-- <button type="submit" class="btn btn-primary">Salvar</button> --}}
        <button type="button" class="btn btn-outline-warning waves-effect btneditar" data-id="{{$ver->id ?? ''}}" > </i> Editar</button>
        <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> </i> Fechar</button>
    </div>

<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>