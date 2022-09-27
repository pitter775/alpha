<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">Novo Atendimento</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="add-new-cardapio modal-content pt-0">
    <div class="modal-body">    
        @csrf
        <div class="divAtendimento row">
            <div class="col-md-7">
                <label for="rg">Nome do solicitante</label>
                <div class="input-group input-group-merge">
                    <input id="rg" type="text" class="form-control" value="{{$user->use_rg ?? ''}}" name="rg" />
                </div>
            </div>

            <div class="col-md-5">
                <label for="cpf">Email</label>
                <div class="input-group input-group-merge">
                    
                    
                    <input id="cpf" type="text" class="form-control" value="{{$user->use_cpf ?? ''}}" name="cpf" />
                </div>
            </div>   

            <div class="col-md-4">
                <label for="cpf">Telefone</label>
                <div class="input-group input-group-merge">
                
                    
                    <input id="cpf" type="text" class="form-control" value="{{$user->use_cpf ?? ''}}" name="cpf" />
                </div>
            </div>   

            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipo_alteracao">Tipo de Atendimento</label>
                    <select id="tipo_alteracao" name="tipo_alteracao" class="form-control select2">
                        <option value="Matricula">Matrícula</option>  
                        <option value="Rematrícula">Rematrícula</option>
                        <option value="Ocorrência">Ocorrência</option>   
                        <option value="Atendimento ao Pai">Atendimento ao Pai</option>  
                    </select>
                </div>
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                <label for="use_perfil">Referente</label>
                <select id="use_perfil" name="use_perfil" class="form-control select2">
                        @foreach ($usuarios as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-12">
                <label for="rg">Titulo</label>
                <div class="input-group input-group-merge">
                    <input id="rg" type="text" class="form-control" value="{{$user->use_rg ?? ''}}" name="rg" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label for="obs_texto">Mensagem</label>
                <textarea class="form-control" id="obs_texto" name="obs_texto" rows="4" placeholder="Escreva aqui..."></textarea>
            </div>
            </div>
            
            


        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> </i> Cancelar</button>
    </div>
</form>

<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>