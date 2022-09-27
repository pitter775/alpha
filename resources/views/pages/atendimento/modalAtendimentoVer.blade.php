<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">{{$ver->ate_titulo ?? ''}}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    <div class="modal-body">    
        @csrf
        <div class="divAtendimento row" style="width: 100%">
            <div class="col-md-9">
                <h5 class="apply-job-title">{{$ver->ate_mensagem ?? ''}}</h5>
            </div>

            <div class="col-md-3" style="background-color: #eee">
                <div class="media-body">
                    <h6 class="mb-0">{{$ver->ate_nome ?? ''}}</h6>
                    <small>Solicitante</small>
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