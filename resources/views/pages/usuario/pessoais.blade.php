<div class="row mt-1">
   <div class="col-12">
      <h4 class="mb-1">
         <i data-feather="user" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Informações Pessoais</span>
      </h4>
   </div>
   <div class="col-md-4">
      <label for="rg">RG</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='alert-circle'></i>
            </span>
         </div>
         <input id="rg" type="text" class="form-control" value="{{$user->use_rg ?? ''}}" name="rg" />
      </div>
   </div>
   <div class="col-md-4">
      <label for="cpf">CPF</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='alert-circle'></i>
            </span>
         </div>
         <input id="cpf" type="text" class="form-control" value="{{$user->use_cpf ?? ''}}" name="cpf" />
      </div>
   </div>
   <div class="col-lg-4">
      <label for="dt_nascimento">Data de Nascimento</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='calendar'></i>
            </span>
         </div>
         <input id="dt_nascimento" type="text" class="form-control flatpickr-basic" value="@if($user-> use_dt_nascimento ) {{date( 'd/m/Y' , strtotime($user-> use_dt_nascimento )) }} @endif" name="dt_nascimento" />
      </div>
   </div>

   <div class="col-md-6">
      <label for="telefone">Reg. nascimento</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='phone'></i>
            </span>
         </div>
         <input id="telefone" type="text" class="form-control" value="{{$user->use_telefone ?? ''}}" name="telefone" />
      </div>
   </div>
   
   <div class="col-md-4 ">
      <div class="form-group">
         <label class="d-block mb-1">Sexo</label>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="male" name="sexo" value="Masculino" class="custom-control-input" checked />
            <label class="custom-control-label check" for="male">Masculino</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">Fenimino</label>
         </div>
      </div>
   </div>
   <div class="col-md-12 ">
      <div class="form-group">
         <label class="d-block mb-1">Raça / Cor definidas pelo IBGE</label>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="male" name="sexo" value="Masculino" class="custom-control-input" checked />
            <label class="custom-control-label check" for="male">Branca</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">Preta</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">Parda</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">Amarela</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">Indigena</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">N/ declarada</label>
         </div>
      </div>
   </div>

   <div class="col-12" style="border-top: solid 1px #eee; margin-top: 20px" >
      <h4 class="mb-1 mt-2">
         <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Dados Sócio-Econômicos</span>
      </h4>
   </div>
   <div class="col-md-3">
      <label for="rg">Nº de cômodos na residência</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='alert-circle'></i>
            </span>
         </div>
         <input id="rg" type="text" class="form-control" value="{{$user->use_rg ?? ''}}" name="rg" />
      </div>
   </div>
   <div class="col-md-3">
      <label for="rg">Nº de residêntes</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='alert-circle'></i>
            </span>
         </div>
         <input id="rg" type="text" class="form-control" value="{{$user->use_rg ?? ''}}" name="rg" />
      </div>
   </div>
   <div class="col-md-6 ">
      <div class="form-group">
         <label class="d-block mb-1">Tipo de Residência</label>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="male" name="sexo" value="Masculino" class="custom-control-input" checked />
            <label class="custom-control-label check" for="male">Própria</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">Alugada</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">Cedida</label>
         </div>
      </div>
   </div>


   <div class="col-md-12 ">
      <div class="form-group">
         <label class="d-block mb-1">Recursos</label>
         <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="soc_agua_encanada"id="soc_agua_encanada" checked />
            <label class="custom-control-label check" for="soc_agua_encanada">Água encanada</label>
          </div>

          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck1"  />
            <label class="custom-control-label check" for="customCheck1">Esgoto</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck1"  />
            <label class="custom-control-label check" for="customCheck1">Fossa</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck1"  />
            <label class="custom-control-label check" for="customCheck1">Luz Elétrica</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck1"  />
            <label class="custom-control-label check" for="customCheck1">Internet</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck1"  />
            <label class="custom-control-label check" for="customCheck1">Computador</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="customCheck1"  />
            <label class="custom-control-label check" for="customCheck1">Veiculo</label>
          </div>

      </div>
   </div>

   <div class="col-md-12">
      <div class="form-group">
         <label class="d-block mb-1">Renda Familiar</label>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="male" name="sexo" value="Masculino" class="custom-control-input" />
            <label class="custom-control-label check" for="male">1 a 2 salários</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">3 a 4 salários</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">5 a 10 salários</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="sexo" class="custom-control-input" value="Fenimino" />
            <label class="custom-control-label check" for="female">mais de 10 salários</label>
         </div>
      </div>
   </div>
  
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="informacoes" name="salvarDados">
   </div>
</div>