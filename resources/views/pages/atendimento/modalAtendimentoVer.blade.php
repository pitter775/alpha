<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">{{$ver->ate_titulo ?? ''}}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<style>
    .media-body{ margin-top: 20px; background-color: #fff;}

</style>

    <div class="modal-body" style="width: 100%">    
        @csrf
        <div class="divAtendimento row" style="width: 100%">
            <div class="col-md-9">
                <h5 class="apply-job-title">{{$ver->ate_mensagem ?? ''}}</h5>
            </div>

            <div class="col-md-3" style="background-color: #efefef">
                <div class="media-body">
                    <div class="form-group">
                        <select id="ate_status" name="ate_status" class="form-control select2">                        
                            <option value="Ativo">Ativo</option>
                            <option value="Resolvido">Resolvido</option>                        
                        </select>
                    </div>
                    <small>Status</small>
                </div>

                <div class="media-body">
                    <h6 class="mb-0">{{$ver->ate_nome ?? ''}}</h6>
                    <small>Solicitante</small>
                </div>

                <div class="media-body">
                    <h6 class="mb-0">{{$ver->name ?? ''}}</h6>
                    <small>Aluno</small>
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