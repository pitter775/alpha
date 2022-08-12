<div class="row mt-1" style="">
   <div class="col-md-12">
      <form class="form-dependentes col-md-12" style="margin-top: 40px; border: solid 1px #ccc">
         @csrf
         <input type="hidden" value="{{$user->id}}" name="id_geral" id="id_geral" />
         <div >
            <h4 class="py-1 mx-1 mb-0 font-medium-2">
               <i data-feather="users" class="font-medium-4 mr-25"></i>
               <span class="align-middle">Adicionar Dependentes</span>
            </h4>
            <div class="row" style="margin:0px">
               <div class="col-md-6" >
               <div class="form-group">
                  <label for="dep_nome">Nome</label>
                  <div class="input-group input-group-merge">
                     <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i data-feather='user'></i>
                        </span>
                     </div>
                     <input id="dep_nome" type="text" class="form-control" value="" name="dep_nome" />
                  </div>
               </div>
               </div>
               <div class="col-md-3" >
                  <div class="form-group">
                     <label for="dep_parentesco">Parentesco</label>
                     <select id="dep_parentesco" name="dep_parentesco" class="form-control select2">
                        
                        <option value="Pai">Pai</option>
                        <option value="Mãe">Mãe</option>
                        <option value="Irmão">Irmão</option>
                        <option value="Tio">Tio</option>
                        <option value="Amigo">Amigo</option>
                        <option value="Conjuge">Conjuge</option>
                        <option value="Filho(a)">Filho(a)</option>
                        <option value="Avô(a)">Avô(a)</option>
                        <option value="Neto(a)">Neto(a)</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-3">
               <label for="dep_dt_nascimento">Data de Nascimento</label>
               <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                     <span class="input-group-text">
                        <i data-feather='calendar'></i>
                     </span>
                  </div>
                  <input id="dep_dt_nascimento" type="text" class="form-control flatpickr-basic" style="background: #fff" value="" name="dep_dt_nascimento" />
               </div>
               </div>
               <div class="col-md-12">
                  @if (Auth::user()->use_perfil !== 12) <button type="submit" class="btn btn-outline-primary waves-effect">Adicionar</button> @endif
               <input type="hidden" value="dados-dependentes" name="salvarDados">
               </div>
            </div>
      
            <div style="height: 30px"></div>
      
      
            <table class="dependente-list-table table table-sm table-responsive-lg" >
               <thead class="thead-light">
               <tr>
                  <th></th>
                  <th>Nome</th>
                  <th>Parentesco</th>
                  <th>Data de nascimento</th>
                  <th></th>
               </tr>
               </thead>
            </table>
      
         </div>
      </form>
   </div>


</div>