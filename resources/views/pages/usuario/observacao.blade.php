<div class="row mt-1">
   

   <div class="col-12" >
      <h4 class="mb-1">
         <i data-feather="message-square" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Observação</span>
      </h4>
   </div>
   <div class="col-md-10">
      <label for="obs_titulo">Titulo da observação</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='message-square'></i>
            </span>
         </div>
         <input id="obs_titulo" type="text" class="form-control" value="{{$user->obs_titulo ?? ''}}" name="obs_titulo" />
      </div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
         <label for="exampleFormControlTextarea1">Observação</label>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Campo para observação do aluno"></textarea>
     </div>
   </div>
   
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="observacao" name="salvarDados">
   </div>
</div>