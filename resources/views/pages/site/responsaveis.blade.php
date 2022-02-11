<div class="row mt-1">
   

   <div class="col-12" >
      <h4 class="mb-1">
         <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Pais</span>
      </h4>
   </div>
   <div class="col-md-5">
      <label for="res_nome_pai">Nome do Pai</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i class="mr-0" data-feather="edit"></i>
            </span>
         </div>
         <input id="res_nome_pai" type="text" class="form-control" value="{{$user->res_nome_pai ?? ''}}" name="res_nome_pai" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="res_telefone_pai">Telefone do pai</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='phone'></i>
            </span>
         </div>
         <input id="res_telefone_pai" type="text" class="form-control" value="{{$user->res_telefone_pai ?? ''}}" name="res_telefone_pai" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="res_profissao_pai">Profissao do pai</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='briefcase'></i>
            </span>
         </div>
         <input id="res_profissao_pai" type="text" class="form-control" value="{{$user->res_profissao_pai ?? ''}}" name="res_profissao_pai" />
      </div>
   </div>

   <div class="col-md-5">
      <label for="res_nome_mae">Nome do Mãe</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i class="mr-0" data-feather="edit"></i>
            </span>
         </div>
         <input id="res_nome_mae" type="text" class="form-control" value="{{$user->res_nome_mae ?? ''}}" name="res_nome_mae" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="res_telefone_mae">Telefone da mãe</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='phone'></i>
            </span>
         </div>
         <input id="res_telefone_mae" type="text" class="form-control" value="{{$user->res_telefone_mae ?? ''}}" name="res_telefone_mae" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="res_profissao_mae">Profissao da mãe</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='briefcase'></i>
            </span>
         </div>
         <input id="res_profissao_mae" type="text" class="form-control" value="{{$user->res_profissao_mae ?? ''}}" name="res_profissao_mae" />
      </div>
   </div>

   
   <div class="col-12" style="border-top: solid 1px #eee; margin-top: 30px" >
      <h4 class="mb-1 mt-2">
         <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Responsável Legal</span>
      </h4>
   </div>
   <div class="col-md-5">
      <label for="res_nome_res">Nome do Responsável</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i class="mr-0" data-feather="edit"></i>
            </span>
         </div>
         <input id="res_nome_res" type="text" class="form-control" value="{{$user->res_nome_res ?? ''}}" name="res_nome_res" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="res_res_telefone">Telefone</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='phone'></i>
            </span>
         </div>
         <input id="res_res_telefone" type="text" class="form-control" value="{{$user->res_res_telefone ?? ''}}" name="res_res_telefone" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="res_res_profissao">Profissao</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='briefcase'></i>
            </span>
         </div>
         <input id="res_res_profissao" type="text" class="form-control" value="{{$user->res_res_profissao ?? ''}}" name="res_res_profissao" />
      </div>
   </div>
   
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="responsavel" name="salvarDados">
   </div>
</div>