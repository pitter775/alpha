<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">{{$ver->ate_titulo ?? ''}}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    <div class="modal-body">    
        @csrf
        <div class="divAtendimento row">
            teste
        </div>
        
    </div>

    
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> </i> Cancelar</button>
    </div>

<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>