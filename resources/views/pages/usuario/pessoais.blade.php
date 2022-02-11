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
      <label for="use_dt_nascimento">Data de Nascimento</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='calendar'></i>
            </span>
         </div>
         <input id="use_dt_nascimento" type="text" class="form-control flatpickr-basic" value="@if($user-> use_dt_nascimento ) {{date( 'd/m/Y' , strtotime($user-> use_dt_nascimento )) }} @endif" name="use_dt_nascimento" />
      </div>
   </div>

   <div class="col-md-6">
      <label for="use_regiao_nascimento">Reg. nascimento</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='map-pin'></i>
            </span>
         </div>
         <input id="use_regiao_nascimento" type="text" class="form-control" value="{{$user->use_regiao_nascimento ?? ''}}" name="use_regiao_nascimento" />
      </div>
   </div>
   
   <div class="col-md-4 ">
      <div class="form-group">
         <label class="d-block mb-1">Sexo</label>
         <?php
            $checkedsexo = null;
            if(isset($user->use_sexo)){
               $checkedsexo = $user->use_sexo;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="male" name="use_sexo" value="Masculino" class="custom-control-input" 
            <?php if($checkedsexo == 'Masculino'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="male">Masculino</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="female" name="use_sexo" class="custom-control-input" value="Fenimino" 
            <?php if($checkedsexo == 'Fenimino'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="female">Fenimino</label>
         </div>
      </div>
   </div>
   <div class="col-md-12 ">
      <div class="form-group">
         <label class="d-block mb-1">Raça / Cor definidas pelo IBGE</label>
         <?php
            $checkedRaca = null;
            if(isset($user->use_cor_pele)){
               $checkedRaca = $user->use_cor_pele;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Branca" name="use_cor_pele" value="Branca" class="custom-control-input"  <?php if($checkedRaca == 'Branca'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="Branca">Branca</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Preta" name="use_cor_pele" class="custom-control-input" value="Preta" <?php if($checkedRaca == 'Preta'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="Preta">Preta</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Parda" name="use_cor_pele" class="custom-control-input" value="Parda" <?php if($checkedRaca == 'Parda'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="Parda">Parda</label> 
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Amarela" name="use_cor_pele" class="custom-control-input" value="Amarela" <?php if($checkedRaca == 'Amarela'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="Amarela">Amarela</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Indigena" name="use_cor_pele" class="custom-control-input" value="Indigena" <?php if($checkedRaca == 'Indigena'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="Indigena">Indigena</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="declarada" name="use_cor_pele" class="custom-control-input" value="N/ declarada" <?php if($checkedRaca == 'N/ declarada'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="declarada">N/ declarada</label>
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
      <label for="soc_residencia_comodos">Cômodos na residência</label>
      <div class="input-group input-group-merge">
     
            <input id="soc_residencia_comodos" type="number" class="touchspin" value="{{$user->soc_residencia_comodos ?? '0'}}" name="soc_residencia_comodos" />
         </div>
   </div>
   <div class="col-md-3">
      <label for="soc_residentes">Nº de residêntes</label>
      <div class="input-group">
         <input id="soc_residentes" type="number" class="touchspin" value="{{$user->soc_residentes ?? '0'}}" name="soc_residentes" />
      </div>
   </div>
   <div class="col-md-6 ">
      <div class="form-group">
         <label class="d-block mb-1">Tipo de Residência</label>
         <?php
         $checkedCasa = null;
         if(isset($user->soc_tipo_residencia)){
            $checkedCasa = $user->soc_tipo_residencia;
         }
         ?>
     
         <div class="custom-control custom-radio custom-control-inline">
            {{-- <input type="radio" id="Própria" name="soc_tipo_residencia" value="Própria" class="custom-control-input" @if(isset($user->soc_tipo_residencia) == '1'){ $checked = 'checked';}} /> --}}
            <input type="radio" id="Própria" name="soc_tipo_residencia" value="Própria" class="custom-control-input" <?php if($checkedCasa == 'Própria'){ echo 'checked';} ?>/>
            <label class="custom-control-label check" for="Própria">Própria</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Alugada" name="soc_tipo_residencia" class="custom-control-input" value="Alugada" <?php if($checkedCasa == 'Alugada'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="Alugada">Alugada</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="Cedida" name="soc_tipo_residencia" class="custom-control-input" value="Cedida" <?php if($checkedCasa == 'Cedida'){ echo 'checked';} ?>/>
            <label class="custom-control-label check" for="Cedida">Cedida</label>
         </div>
      </div>
   </div>


   <div class="col-md-12 ">
      <div class="form-group">
         <label class="d-block mb-1">Recursos</label>

         <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" value="1" class="custom-control-input" name="soc_agua_encanada" id="soc_agua_encanada" <?php if(isset($user->soc_agua_encanada)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="soc_agua_encanada" >Água encanada</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" value="1" class="custom-control-input" name="soc_esgoto" id="soc_esgoto" <?php if(isset($user->soc_esgoto)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="soc_esgoto">Esgoto</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" value="1" class="custom-control-input" name="soc_fossa" id="soc_fossa"  <?php if(isset($user->soc_fossa)){echo 'checked';} ?>/>
            <label class="custom-control-label check" for="soc_fossa">Fossa</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" value="1" class="custom-control-input" name="soc_luz_eletrica" id="soc_luz_eletrica"  <?php if(isset($user->soc_luz_eletrica)){echo 'checked';} ?>/>
            <label class="custom-control-label check" for="soc_luz_eletrica">Luz Elétrica</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" value="1" class="custom-control-input" name="soc_internet" id="soc_internet" <?php if(isset($user->soc_internet)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="soc_internet">Internet</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" value="1" class="custom-control-input"  name="soc_computador" id="soc_computador" <?php if(isset($user->soc_computador)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="soc_computador">Computador</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline">
            <input type="checkbox" value="1" class="custom-control-input" name="soc_veiculo" id="soc_veiculo" <?php if(isset($user->soc_veiculo)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="soc_veiculo">Veiculo</label>
          </div>

      </div>
   </div>

   <div class="col-md-12">
      <div class="form-group">
         <label class="d-block mb-1">Renda Familiar</label>
         <?php
         $checkedFamilia = null;
         if(isset($user->soc_renda_familiar)){
            $checkedFamilia = $user->soc_renda_familiar;
         }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="soc_renda_familiar1" name="soc_renda_familiar" value="1 a 2 salários" class="custom-control-input" <?php if($checkedFamilia == '1 a 2 salários'){ echo 'checked';} ?>/>
            <label class="custom-control-label check" for="soc_renda_familiar1">1 a 2 salários</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="soc_renda_familiar2" name="soc_renda_familiar" class="custom-control-input" value="3 a 4 salários" <?php if($checkedFamilia == '3 a 4 salários'){ echo 'checked';} ?>/>
            <label class="custom-control-label check" for="soc_renda_familiar2">3 a 4 salários</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="soc_renda_familiar3" name="soc_renda_familiar" class="custom-control-input" value="5 a 10 salários" <?php if($checkedFamilia == '5 a 10 salários'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="soc_renda_familiar3">5 a 10 salários</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="soc_renda_familiar4" name="soc_renda_familiar" class="custom-control-input" value="mais de 10 salários" <?php if($checkedFamilia == 'mais de 10 salários'){ echo 'checked';} ?>/>
            <label class="custom-control-label check" for="soc_renda_familiar4">mais de 10 salários</label>
         </div>
      </div>
   </div>
  
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="informacoes" name="salvarDados">
   </div>
</div>