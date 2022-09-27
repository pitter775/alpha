<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">Novo Atendimento</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    <div class="modal-body">    
        @csrf
        <div class="divAtendimento row">
            <div class="col-md-7">
                <label for="ate_nome">Nome do solicitante</label>
                <div class="input-group input-group-merge">
                    <input id="ate_nome" type="text" class="form-control" value="{{$user->use_ate_nome ?? ''}}" name="ate_nome" />
                </div>
            </div>

            <div class="col-md-5">
                <label for="ate_email">Email</label>
                <div class="input-group input-group-merge">
                    <input id="ate_email" type="text" class="form-control" value="{{$user->use_ate_email ?? ''}}" name="ate_email" />
                </div>
            </div>   

            <div class="col-md-4">
                <label for="ate_telefone">Telefone</label>
                <div class="input-group input-group-merge">
                
                    
                    <input id="ate_telefone" type="text" class="form-control" value="{{$user->use_ate_telefone ?? ''}}" name="ate_telefone" />
                </div>
            </div>   

            <div class="col-md-4">
                <div class="form-group">
                    <label for="ate_tipo">Tipo de Atendimento</label>
                    <select id="ate_tipo" name="ate_tipo" class="form-control select2">
                        <option value="Matricula">Matrícula</option>  
                        <option value="Rematrícula">Rematrícula</option>
                        <option value="Ocorrência">Ocorrência</option>   
                        <option value="Atendimento ao Pai">Atendimento ao Pai</option>  
                    </select>
                </div>
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ate_users_id">Referente</label>
                    <select id="ate_users_id" name="ate_users_id" class="form-control select2">
                            @foreach ($usuarios as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-8">
                <label for="ate_titulo">Titulo</label>
                <div class="input-group input-group-merge">
                    <input id="ate_titulo" type="text" class="form-control" value="{{$user->use_ate_titulo ?? ''}}" name="ate_titulo" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ate_status">Status</label>
                    <select id="ate_status" name="ate_status" class="form-control select2">                        
                        <option value="Ativo">Ativo</option>
                        <option value="Resolvido">Resolvido</option>                        
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label for="ate_mensagem">Mensagem</label>
                <textarea class="form-control" id="ate_mensagem" name="ate_mensagem" rows="4" placeholder="Escreva aqui..."></textarea>
            </div>
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> </i> Cancelar</button>
    </div>

<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>