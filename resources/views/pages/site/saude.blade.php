<div class="row mt-1">
   <div class="col-12">
      <h4 class="mb-1">
         <i data-feather="heart" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Dados de Saúde</span>
      </h4>
   </div>
   
   <div class="col-md-12 ">
      <div class="form-group">
         <label class="d-block mb-1 che2k">Doença da infância</label>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_sarampo" id="sau_sarampo" <?php if(isset($user->sau_sarampo)){echo 'checked';} ?>  />
            <label class="custom-control-label check" for="sau_sarampo">Sarampo</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_caxumba" id="sau_caxumba"  <?php if(isset($user->sau_caxumba)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_caxumba">Caxumba</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_coqueluche" id="sau_coqueluche"   <?php if(isset($user->sau_coqueluche)){echo 'checked';} ?>  />
            <label class="custom-control-label check" for="sau_coqueluche">Coqueluche</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_catapora" id="sau_catapora"  <?php if(isset($user->sau_catapora)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_catapora">Catapora</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_rubeola" id="sau_rubeola"  <?php if(isset($user->sau_rubeola)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_rubeola">Rubéola</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_hepatite" id="sau_hepatite"  <?php if(isset($user->sau_hepatite)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_hepatite">Hepatite</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_bronquite" id="sau_bronquite"  <?php if(isset($user->sau_bronquite)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_bronquite">Bronquite</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_asma" id="sau_asma"  <?php if(isset($user->sau_asma)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_asma">Asma</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_anemia" id="sau_anemia" <?php if(isset($user->sau_anemia)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_anemia">Anemia</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input check"value="1" name="sau_menigite" id="sau_menigite" <?php if(isset($user->sau_menigite)){echo 'checked';} ?>    />
            <label class="custom-control-label check" for="sau_menigite">Meningite</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="sau_outras" id="sau_outras"  <?php if(isset($user->sau_outras)){echo 'checked';} ?>   />
            <label class="custom-control-label check" for="sau_outras">Outras</label>
          </div>        

      </div>
   </div>
   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Tipo de parto</label>
         <?php
            $checkedparto = null;
            if(isset($user->sau_parto)){
               $checkedparto = $user->sau_parto;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_parto1" name="sau_parto" value="Normal" class="custom-control-input" 
            <?php if($checkedparto == 'Normal'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_parto1">Normal</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_parto2" name="sau_parto" class="custom-control-input" value="Cesariana" 
            <?php if($checkedparto == 'Cesariana'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_parto2">Cesariana</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_parto_complicacoes">Complicações no parto</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_parto_complicacoes" type="text" class="form-control" value="{{$user->sau_parto_complicacoes ?? ''}}" name="sau_parto_complicacoes" />
      </div>
   </div>
   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Tem alergia</label>
         <?php
         $checkedalergia = null;
         if(isset($user->sau_alergia)){
            $checkedalergia = $user->sau_alergia;
         }
      ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_alergia1" name="sau_alergia" value="Sim" class="custom-control-input" 
            <?php if($checkedalergia == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_alergia1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_alergia2" name="sau_alergia" class="custom-control-input" value="Não" 
            <?php if($checkedalergia == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_alergia2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_alergia_detalhe">Se sim, a que?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_alergia_detalhe" type="text" class="form-control" value="{{$user->sau_alergia_detalhe ?? ''}}" name="sau_alergia_detalhe" />
      </div>
   </div>

   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Intolerância à</label>
         <div class="custom-control custom-checkbox  custom-control-inline check">
            <input type="checkbox" class="custom-control-input" name="sau_intolerancia_lactose"id="sau_intolerancia_lactose" 
            <?php if(isset($user->sau_intolerancia_lactose)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_intolerancia_lactose">Lactose</label>
          </div>
          <div class="custom-control custom-checkbox  custom-control-inline check">
            <input type="checkbox" class="custom-control-input" name="sau_intolerancia_glutem" id="sau_intolerancia_glutem" 
            <?php if(isset($user->sau_intolerancia_glutem)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_intolerancia_glutem">Glútem</label>
          </div>
         
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_intolerancia_outros">Outro Alimento:</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_intolerancia_outros" type="text" class="form-control" value="{{$user->sau_intolerancia_outros ?? ''}}" name="sau_intolerancia_outros" />
      </div>
   </div>
   <div class="col-md-12">
      <label for="sau_alergia_medicamentos">Alergia a medicamentos</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_alergia_medicamentos" type="text" class="form-control" value="{{$user->sau_alergia_medicamentos ?? ''}}" name="sau_alergia_medicamentos" />
      </div>
   </div>
   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Já tomou benzetacil</label>
         <?php
         $checkedbezeta = null;
         if(isset($user->sau_benzetacil)){
            $checkedbezeta = $user->sau_benzetacil;
         }
      ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_benzetacil1" name="sau_benzetacil" value="Sim" class="custom-control-input" 
            <?php if($checkedbezeta == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_benzetacil1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_benzetacil2" name="sau_benzetacil" class="custom-control-input" value="Não" 
            <?php if($checkedbezeta == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_benzetacil2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_benzetacil_motivo">Se sim, porque?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_benzetacil_motivo" type="text" class="form-control" value="{{$user->sau_benzetacil_motivo ?? ''}}" name="sau_benzetacil_motivo" />
      </div>
   </div>
   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Tem ou já teve convulções ou ataques?</label>
         <?php
            $checkedconv = null;
            if(isset($user->sau_convulsoes)){
               $checkedconv = $user->sau_convulsoes;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_convulsoes1" name="sau_convulsoes" value="Sim" class="custom-control-input" 
            <?php if($checkedconv == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_convulsoes1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_convulsoes2" name="sau_convulsoes" class="custom-control-input" value="Não" 
            <?php if($checkedconv == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_convulsoes2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_convulsoes_motivo">Se sim, Causa?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_convulsoes_motivo" type="text" class="form-control" value="{{$user->sau_convulsoes_motivo ?? ''}}" name="sau_convulsoes_motivo" />
      </div>
   </div>
   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Desmaios?</label>
         <?php
            $checkeddesm = null;
            if(isset($user->sau_desmaios)){
               $checkeddesm = $user->sau_desmaios;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_desmaios1" name="sau_desmaios" value="Sim" class="custom-control-input" 
            <?php if($checkeddesm == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_desmaios1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_desmaios2" name="sau_desmaios" class="custom-control-input" value="Não" 
            <?php if($checkeddesm == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_desmaios2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-3 ">
  
      <div class="form-group">
         <label class="d-block mb-1">Diarreias frequentes?</label>
         <?php
            $checkeddiar = null;
            if(isset($user->sau_diarreia_frequente)){
               $checkeddiar = $user->sau_diarreia_frequente;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_diarreia_frequente1" name="sau_diarreia_frequente" value="Sim" class="custom-control-input" 
            <?php if($checkeddiar == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_diarreia_frequente1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_diarreia_frequente2" name="sau_diarreia_frequente" class="custom-control-input" value="Não" 
            <?php if($checkeddiar == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_diarreia_frequente2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Resfriado frequentes?</label>
         <?php
            $checkedresf = null;
            if(isset($user->sau_resfriado_frequente)){
               $checkedresf = $user->sau_resfriado_frequente;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_resfriado_frequente1" name="sau_resfriado_frequente" value="Sim" class="custom-control-input" 
            <?php if($checkedresf == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_resfriado_frequente1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_resfriado_frequente2" name="sau_resfriado_frequente" class="custom-control-input" value="Não" 
            <?php if($checkedresf == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_resfriado_frequente2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-3 ">
      <div class="form-group">
         <label class="d-block mb-1">Infecção de ouvido?</label>
         <?php
            $checkedinfou = null;
            if(isset($user->sau_infeccao_ouvido)){
               $checkedinfou = $user->sau_infeccao_ouvido;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_infeccao_ouvido1" name="sau_infeccao_ouvido" value="Sim" class="custom-control-input" 
            <?php if($checkedinfou == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_infeccao_ouvido1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_infeccao_ouvido2" name="sau_infeccao_ouvido" class="custom-control-input" value="Não" 
            <?php if($checkedinfou == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_infeccao_ouvido2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Fez alguma cirurgia?</label>
         <?php
            $checkedcirur = null;
            if(isset($user->sau_cirurgia)){
               $checkedcirur = $user->sau_cirurgia;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_cirurgia1" name="sau_cirurgia" value="Sim" class="custom-control-input" 
            <?php if($checkedcirur == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_cirurgia1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_cirurgia2" name="sau_cirurgia" class="custom-control-input" value="Não" 
            <?php if($checkedcirur == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_cirurgia2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_cirurgia_motivo">Se sim, Qual?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_cirurgia_motivo" type="text" class="form-control" value="{{$user->sau_cirurgia_motivo ?? ''}}" name="sau_cirurgia_motivo" />
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Ja ficou internado (a)?</label>
         <?php
            $checkedinter = null;
            if(isset($user->sau_internado)){
               $checkedinter = $user->sau_internado;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_internado1" name="sau_internado" value="Sim" class="custom-control-input" 
            <?php if($checkedinter == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_internado1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_internado2" name="sau_internado" class="custom-control-input" value="Não" 
            <?php if($checkedinter == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_internado2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_internado_motivo">Se sim, Porque?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_internado_motivo" type="text" class="form-control" value="{{$user->sau_internado_motivo ?? ''}}" name="sau_internado_motivo" />
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Fez ou faz algum tratamento?</label>
         <?php
            $checkedmedi = null;
            if(isset($user->sau_tratamento)){
               $checkedmedi = $user->sau_tratamento;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_tratamento1" name="sau_tratamento" value="Sim" class="custom-control-input" 
            <?php if($checkedmedi == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_tratamento1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_tratamento2" name="sau_tratamento" class="custom-control-input" value="Não" 
            <?php if($checkedmedi == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_tratamento2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_tratamento_motivo">Se sim, do que?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_tratamento_motivo" type="text" class="form-control" value="{{$user->sau_tratamento_motivo ?? ''}}" name="sau_tratamento_motivo" />
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Toma algum tipo de medicamento?</label>
         <?php
            $checkedtrata  = null;
            if(isset($user->sau_medicamento)){
               $checkedtrata = $user->sau_medicamento;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_medicamento1" name="sau_medicamento" value="Sim" class="custom-control-input" 
            <?php if($checkedtrata == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_medicamento1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_medicamento2" name="sau_medicamento" class="custom-control-input" value="Não" 
            <?php if($checkedtrata == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_medicamento2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_medicamento_qual">Se sim, Qual?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_medicamento_qual" type="text" class="form-control" value="{{$user->sau_medicamento_qual ?? ''}}" name="sau_medicamento_qual" />
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Enxerga bem?</label>
         <?php
            $checkedenxer = null;
            if(isset($user->sau_enxerga)){
               $checkedenxer = $user->sau_enxerga;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_enxerga1" name="sau_enxerga" value="Sim" class="custom-control-input" 
            <?php if($checkedenxer == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_enxerga1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_enxerga2" name="sau_enxerga" class="custom-control-input" value="Não" 
            <?php if($checkedenxer == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_enxerga2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-3 ">
      
      <div class="form-group">
         <label class="d-block mb-1">Escuta bem?</label>
         <?php
            $checkedescut = null;
            if(isset($user->sau_escuta)){
               $checkedescut = $user->sau_escuta;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_escuta1" name="sau_escuta" value="Sim" class="custom-control-input" 
            <?php if($checkedescut == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_escuta1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_escuta2" name="sau_escuta" class="custom-control-input" value="Não" 
            <?php if($checkedescut == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_escuta2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Fala Direito?</label>
         <?php
            $checkedfala = null;
            if(isset($user->sau_fala)){
               $checkedfala = $user->sau_fala;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_fala1" name="sau_fala" value="Sim" class="custom-control-input" 
            <?php if($checkedfala == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_fala1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_fala2" name="sau_fala" class="custom-control-input" value="Não" 
            <?php if($checkedfala == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_fala2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Faz xixi na cama?</label>
         <?php
            $checkedxixi = null;
            if(isset($user->sau_xixi_cama)){
               $checkedxixi = $user->sau_xixi_cama;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_xixi_cama1" name="sau_xixi_cama" value="Sim" class="custom-control-input" 
            <?php if($checkedxixi == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_xixi_cama1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_xixi_cama2" name="sau_xixi_cama" class="custom-control-input" value="Não" 
            <?php if($checkedxixi == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_xixi_cama2">Não</label>
         </div>
      </div>
   </div>

   <div class="col-md-12">
      <label for="sau_descricao_saude">A criança esta bem de saúde?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_descricao_saude" type="text" class="form-control" value="{{$user->sau_descricao_saude ?? ''}}" name="sau_descricao_saude" />
      </div>
   </div>
   <div class="col-md-3 ">

      <div class="form-group">
         <label class="d-block mb-1">Tem animais em casa?</label>
         <?php
            $checkedanima = null;
            if(isset($user->sau_animais)){
               $checkedanima = $user->sau_animais;
            }
         ?>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_animais1" name="sau_animais" value="Sim" class="custom-control-input" 
            <?php if($checkedanima == 'Sim'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_animais1">Sim</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="sau_animais2" name="sau_animais" class="custom-control-input" value="Não" 
            <?php if($checkedanima == 'Não'){ echo 'checked';} ?> />
            <label class="custom-control-label check" for="sau_animais2">Não</label>
         </div>
      </div>
   </div>
   <div class="col-md-9">
      <label for="sau_animais_qual">Se sim, Qual?</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='heart'></i>
            </span>
         </div>
         <input id="sau_animais_qual" type="text" class="form-control" value="{{$user->sau_animais_qual ?? ''}}" name="sau_animais_qual" />
      </div>
   </div>

  
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="saude" name="salvarDados">
   </div>
</div>