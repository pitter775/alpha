<div class="row mt-1">
   

   <div class="col-12" >
      <h4 class="mb-1">
         <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Pais</span>
      </h4>
   </div>
   <div class="col-md-5">
      <label for="rua">Nome do Pai</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="rua" type="text" class="form-control" value="{{$user->end_rua ?? ''}}" name="rua" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="numero">Telefone do pai</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='phone'></i>
            </span>
         </div>
         <input id="numero" type="text" class="form-control" value="{{$user->end_numero ?? ''}}" name="numero" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="complemento">Profissao do pai</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="complemento" type="text" class="form-control" value="{{$user->end_complemento ?? ''}}" name="complemento" />
      </div>
   </div>

   <div class="col-md-5">
      <label for="rua">Nome do Mãe</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="rua" type="text" class="form-control" value="{{$user->end_rua ?? ''}}" name="rua" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="numero">Telefone da mãe</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='phone'></i>
            </span>
         </div>
         <input id="numero" type="text" class="form-control" value="{{$user->end_numero ?? ''}}" name="numero" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="complemento">Profissao da mãe</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="complemento" type="text" class="form-control" value="{{$user->end_complemento ?? ''}}" name="complemento" />
      </div>
   </div>

   
   <div class="col-12" style="border-top: solid 1px #eee; margin-top: 30px" >
      <h4 class="mb-1 mt-2">
         <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Responsável Legal</span>
      </h4>
   </div>
   <div class="col-md-5">
      <label for="rua">Nome do Responsável</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="rua" type="text" class="form-control" value="{{$user->end_rua ?? ''}}" name="rua" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="numero">Telefone</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='phone'></i>
            </span>
         </div>
         <input id="numero" type="text" class="form-control" value="{{$user->end_numero ?? ''}}" name="numero" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="complemento">Profissao</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="complemento" type="text" class="form-control" value="{{$user->end_complemento ?? ''}}" name="complemento" />
      </div>
   </div>
   
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="informacoes" name="salvarDados">
   </div>
</div>