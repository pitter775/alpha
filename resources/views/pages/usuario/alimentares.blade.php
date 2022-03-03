<style>
   .cke2{ margin-top: 20px}
   .che2k{ margin-bottom: 0px !important}
</style>
<div class="row mt-1">
   <div class="col-12">
      <h4 class="mb-1">
         <i data-feather="coffee" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Hábitos alimentares da criança</span>
      </h4>
   </div>
   
   <div class="col-md-12 ">
      <div class="form-group">
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input" value="1" name="hab_leite" id="hab_leite" 
            <?php if(isset($user->hab_leite)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_leite">Leite</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="hab_queijo" id="hab_queijo" 
            <?php if(isset($user->hab_queijo)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_queijo">Queijo</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="hab_yakult"  id="hab_yakult" 
            <?php if(isset($user->hab_yakult)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_yakult">Yakult</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="hab_bolacha"  id="hab_bolacha" 
            <?php if(isset($user->hab_bolacha)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_bolacha">Bolacha</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="hab_canes"  id="hab_canes" 
            <?php if(isset($user->hab_canes)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_canes">Carnes</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"value="1" name="hab_frango"  id="hab_frango" 
            <?php if(isset($user->hab_frango)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_frango">Frango</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input" value="1" name="hab_salsicha"  id="hab_salsicha" 
            <?php if(isset($user->hab_salsicha)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_salsicha">Salsicha</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input" value="1"  name="hab_verduras_legumes"  id="hab_verduras_legumes" 
            <?php if(isset($user->hab_verduras_legumes)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_verduras_legumes">Verduras / Legumes</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1" name="hab_arroz_feijao_graos"  id="hab_arroz_feijao_graos" 
            <?php if(isset($user->hab_arroz_feijao_graos)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_arroz_feijao_graos">Arroz / Feijão / Grãos</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1" name="hab_macarrao_molho"  id="hab_macarrao_molho" 
            <?php if(isset($user->hab_macarrao_molho)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_macarrao_molho">Macarrao com molho</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1" name="hab_frutas"  id="hab_frutas" 
            <?php if(isset($user->hab_frutas)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_frutas">Frutas</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1" name="hab_peixe"  id="hab_peixe" 
            <?php if(isset($user->hab_peixe)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_peixe">Peixe</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1"  name="hab_salgadinhos_doces" id="hab_salgadinhos_doces" 
            <?php if(isset($user->hab_salgadinhos_doces)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_salgadinhos_doces">Salgadinhos / Doces</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input" value="1"  name="hab_macarrao_instantaneo"  id="hab_macarrao_instantaneo" 
            <?php if(isset($user->hab_macarrao_instantaneo)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_macarrao_instantaneo">Macarrão Instanteneo</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1" name="hab_figado_miudos"  id="hab_figado_miudos" 
            <?php if(isset($user->hab_figado_miudos)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_figado_miudos">Fígado / Miúdos</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1" name="hab_danone"  id="hab_danone" 
            <?php if(isset($user->hab_danone)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_danone">Danones</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input"  value="1" name="hab_chocolate"  id="hab_chocolate"  
            <?php if(isset($user->hab_chocolate)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_chocolate">Chocolate</label>
         </div>
         <div class="custom-control custom-checkbox  custom-control-inline cke2">
            <input type="checkbox" class="custom-control-input" value="1"   name="hab_ovos" id="hab_ovos" 
            <?php if(isset($user->hab_ovos)){echo 'checked';} ?> />
            <label class="custom-control-label check" for="hab_ovos">Ovos</label>
         </div>


      </div>
   </div>


  
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      @if (Auth::user()->use_perfil !== 12) <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button> @endif
      <input type="hidden" value="alimentares" name="salvarDados">
   </div>
</div>