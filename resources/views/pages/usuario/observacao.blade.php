<div class="row mt-1">
   

   <div class="col-12" >
      <h4 class="mb-1">
         <i data-feather="message-square" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Diário do Aluno</span>
      </h4>
   </div>
   <div class="col-md-8">
      <label for="obs_titulo">Titulo</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='message-square'></i>
            </span>
         </div>
         <input id="obs_titulo" type="text" class="form-control" value="{{$user->obs_titulo ?? ''}}" name="obs_titulo" />
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="obs_categoria">Catetoria</label>
         <select id="obs_categoria" name="obs_categoria" class="form-control select2">
            <option value="Problemas de Saude">Problemas de Saude</option>
            <option value="Integridade Física">Integridade Física</option>
            <option value="Observação">Observação</option>
         </select>
      </div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
         <label for="obs_texto">Observação</label>
         <textarea class="form-control" id="obs_texto" name="obs_texto" rows="3" placeholder="Escreva aqui..."></textarea>
     </div>
   </div>
   
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="observacao" name="salvarDados">
   </div>
</div>