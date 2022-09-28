<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel17">Novo Atendimento</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

    <input type="hidden" value="" name="com_ate_id" id="com_ate_id">
    <div class="modal-body">    
        @csrf
        <div class="divAtendimento row">
            <div class="col-md-7">
                <label for="ate_nome">Nome do solicitante</label>
                <div class="input-group input-group-merge">
                    <input id="ate_nome" type="text" class="form-control" value="{{$atendimento->ate_nome ?? ''}}" name="ate_nome" />
                </div>
            </div>

            <div class="col-md-5">
                <label for="ate_email">Email</label>
                <div class="input-group input-group-merge">
                    <input id="ate_email" type="text" class="form-control" value="{{$atendimento->ate_email ?? ''}}" name="ate_email" />
                </div>
            </div>   

            <div class="col-md-4">
                <label for="ate_telefone">Telefone</label>
                <div class="input-group input-group-merge">
                    <input id="ate_telefone" type="text" class="form-control" value="{{$atendimento->ate_telefone ?? ''}}" name="ate_telefone" />
                </div>
            </div>   

            <div class="col-md-4">
                <div class="form-group">
                    <label for="ate_tipo">Tipo de Atendimento</label>
                    <select id="ate_tipo" name="ate_tipo" class="form-control select2">
                        @if(isset($atendimento))
                            <option value="Matricula" @if($atendimento->ate_tipo == 'Matricula') selected @endif>Matrícula</option>  
                            <option value="Rematrícula" @if($atendimento->ate_tipo == 'Rematrícula') selected @endif>Rematrícula</option>
                            <option value="Ocorrência" @if($atendimento->ate_tipo == 'Ocorrência') selected @endif>Ocorrência</option>   
                            <option value="Secretaria Educação" @if($atendimento->ate_tipo == 'Secretaria Educação') selected @endif>Secretaria Educação</option>   
                            <option value="Prefeitura" @if($atendimento->ate_tipo == 'Prefeitura') selected @endif>Prefeitura</option>   
                            <option value="Atendimento ao Pai" @if($atendimento->ate_tipo == 'Atendimento ao Pai') selected @endif>Atendimento ao Pai</option>  
                            <option value="ADM do Sistema" @if($atendimento->ate_tipo == 'ADM do Sistema') selected @endif>ADM do Sistema</option>  
                        @else
                            <option value="Matricula">Matrícula</option>  
                            <option value="Rematrícula">Rematrícula</option>
                            <option value="Ocorrência">Ocorrência</option>   
                            <option value="Secretaria Educação">Secretaria Educação</option>   
                            <option value="Prefeitura">Prefeitura</option>   
                            <option value="Atendimento ao Pai">Pai</option>  
                        @endif
                    </select>
                </div>
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ate_users_id">Referente</label>
                    <select id="ate_users_id" name="ate_users_id" class="form-control select2">
                            @foreach ($usuarios as $user)
                                @if(isset($atendimento))
                                    <option value="{{$user->id}}" @if($atendimento->ate_users_id == $user->id) selected @endif >{{$user->name}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-8">
                <label for="ate_titulo">Titulo</label>
                <div class="input-group input-group-merge">
                    <input id="ate_titulo" type="text" class="form-control" value="{{$atendimento->ate_titulo ?? ''}}" name="ate_titulo" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ate_status">Status</label>
                    <select id="ate_status" name="ate_status" class="form-control select2">        
                        @if(isset($atendimento))                
                            <option value="Pendente" @if($atendimento->ate_status == 'Pendente') selected @endif>Pendente</option>
                            <option value="Andamento" @if($atendimento->ate_status == 'Andamento') selected @endif>Andamento</option>
                            <option value="Finalizado" @if($atendimento->ate_status == 'Finalizado') selected @endif>Finalizado</option>      
                        @else    
                            <option value="Pendente">Pendente</option>
                            <option value="Andamento">Andamento</option>     
                            <option value="Finalizado">Finalizado</option>     
                        @endif           
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label for="ate_mensagem">Mensagem</label>
                <textarea class="form-control" id="ate_mensagem" name="ate_mensagem" rows="4" placeholder="Escreva aqui...">{{$atendimento->ate_mensagem ?? ''}}</textarea>
            </div>
            </div>
        </div>
        
    </div>

    
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>        
        <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> </i> Fechar</button>
    </div>

<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>