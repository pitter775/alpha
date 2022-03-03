<div class="row mt-1">
   

   <div class="col-12" >
      <h4 class="mb-1">
         <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Endereço</span>
      </h4>
   </div>
   <div class="col-md-10">
      <label for="end_rua">Rua</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_rua" type="text" class="form-control" value="{{$user->end_rua ?? ''}}" name="end_rua" />
      </div>
   </div>
   <div class="col-md-2">
      <label for="end_numero">Número</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_numero" type="text" class="form-control" value="{{$user->end_numero ?? ''}}" name="end_numero" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="end_complemento">Complemento</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_complemento" type="text" class="form-control" value="{{$user->end_complemento ?? ''}}" name="end_complemento" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="end_cep">CEP</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_cep" type="text" class="form-control" value="{{$user->end_cep ?? ''}}" name="end_cep" />
      </div>
   </div>
   <div class="col-md-6">
      <label for="end_bairro">Bairro</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_bairro" type="text" class="form-control" value="{{$user->end_bairro ?? ''}}" name="end_bairro" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="end_cidade">Cidade</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_cidade" type="text" class="form-control" value="{{$user->end_cidade ?? ''}}" name="end_cidade" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="end_estado">Estado</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_estado" type="text" class="form-control" value="{{$user->end_estado ?? ''}}" name="end_estado" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="end_pais">País</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="end_pais" type="text" class="form-control" value="{{$user->end_pais ?? ''}}" name="end_pais" />
      </div>
   </div>
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      @if (Auth::user()->use_perfil !== 12) <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>@endif
      <input type="hidden" value="endereco" name="salvarDados">
   </div>
</div>