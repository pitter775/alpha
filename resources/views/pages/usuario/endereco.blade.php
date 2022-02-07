<div class="row mt-1">
   

   <div class="col-12" >
      <h4 class="mb-1">
         <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Endereço</span>
      </h4>
   </div>
   <div class="col-md-5">
      <label for="rua">Rua</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="rua" type="text" class="form-control" value="{{$user->end_rua ?? ''}}" name="rua" />
      </div>
   </div>
   <div class="col-md-2">
      <label for="numero">Número</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="numero" type="text" class="form-control" value="{{$user->end_numero ?? ''}}" name="numero" />
      </div>
   </div>
   <div class="col-md-5">
      <label for="complemento">Complemento</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="complemento" type="text" class="form-control" value="{{$user->end_complemento ?? ''}}" name="complemento" />
      </div>
   </div>
   <div class="col-lg-4 col-md-6">
      <label for="cep">CEP</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="cep" type="text" class="form-control" value="{{$user->end_cep ?? ''}}" name="cep" />
      </div>
   </div>
   <div class="col-lg-4 col-md-6">
      <label for="cidade">Cidade</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="cidade" type="text" class="form-control" value="{{$user->end_cidade ?? ''}}" name="cidade" />
      </div>
   </div>
   <div class="col-lg-4 col-md-6">
      <label for="estado">Estado</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="estado" type="text" class="form-control" value="{{$user->end_estado ?? ''}}" name="estado" />
      </div>
   </div>
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="informacoes" name="salvarDados">
   </div>
</div>