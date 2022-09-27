<style>
    .media-body{ margin-bottom: 20px; padding: 15px; background-color: #e2e4e9; }

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
                <textarea class="form-control" id="com_texto" name="com_texto" rows="2" placeholder="Escreva o comentário..."></textarea>
                <input type="hidden" value="{{$ver->id ?? ''}}" name="com_ate_id" id="com_ate_id">
            </div>
            <div class="chat">
                <div class="chat-avatar">
                    <span class="avatar box-shadow-1 cursor-pointer">
                        <img src="../../../app-assets/images/portrait/small/avatar-s-20.jpg" alt="avatar" height="36" width="36">
                    </span>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <p>Hey John, I am looking for the best admin template.</p>
                        <p>Could you please help me to find it out? 🤔</p>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="col-md-3" style=" padding: 0; margin-right: -20px !important">
            <div class="media-body" style="margin-top: 0px; background-color: #f4f5f7;">
                <div class="form-group">
                    <select id="ate_status" name="ate_status" class="form-control select2">                        
                        <option value="Ativo">Ativo</option>
                        <option value="Resolvido">Resolvido</option>                        
                    </select>
                </div>
            </div>

            <div class="media-body">
                <h6 class="mb-0">{{$ver->ate_nome ?? ''}}</h6>
                <small>Solicitante</small>
            </div>

            <div class="media-body">
                <h6 class="mb-0">{{$ver->name ?? ''}}</h6>
                <small>Referente ao Aluno</small>
            </div>

            <div class="media-body">
                <h6 class="mb-0"><?php echo date( 'd/m/Y' , strtotime($ver->created_at));  ?></h6>
                <small>Criado em</small>
            </div>
        </div>   

    </div>
</div>
    
</div>

    
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> </i> Cancelar</button>
    </div>

<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>