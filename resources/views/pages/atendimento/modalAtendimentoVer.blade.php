<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">{{$ver->ate_titulo ?? ''}}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    <div class="modal-body">    
        @csrf
        <div class="divAtendimento row" style="width: 100%">
            <div class="col-md-7">
                <label for="ate_nome">Nome do solicitante</label>
                <div class="input-group input-group-merge">
                    <input id="ate_nome" type="text" class="form-control" value="" name="ate_nome" />
                </div>
            </div>

            <div class="col-md-5">
                <label for="ate_email">Email</label>
                <div class="input-group input-group-merge">
                    <input id="ate_email" type="text" class="form-control" value="" name="ate_email" />
                </div>
            </div>   

            <div class="col-md-4">
                <label for="ate_telefone">Telefone</label>
                <div class="input-group input-group-merge">
                    <input id="ate_telefone" type="text" class="form-control" value="" name="ate_telefone" />
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