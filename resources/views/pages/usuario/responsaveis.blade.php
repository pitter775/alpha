<form class="form-responsavel" >
   @csrf
   <input type="hidden" value="{{$user->id}}" name="id_geral" id="id_geral" />
   <div >
      <h4 class="py-1 mx-1 mb-0 font-medium-2">
         <i data-feather="users" class="font-medium-4 mr-25"></i>
         <span class="align-middle">Adicionar Responsáveis</span>
      </h4>
      <div class="row" style="margin:0px">
         <div class="col-md-9" >
            <div class="form-group">
               <label for="resp_nome">Nome</label>
               <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                     <span class="input-group-text">
                     <i data-feather='user'></i>
                     </span>
                  </div>
                  <input id="resp_nome" type="text" class="form-control" value="" name="resp_nome" />
               </div>
            </div>
         </div>
         <div class="col-md-3" >
            <div class="form-group">
               <label for="resp_parentesco">Parentesco</label>
               <select id="resp_parentesco" name="resp_parentesco" class="form-control select2">
                  
                  <option value="Pai">Pai</option>
                  <option value="Padrasto">Padrasto</option>
                  <option value="Mãe">Mãe</option>
                  <option value="Madrasta">Madrasta</option>
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

         <div class="col-md-3" >
            <div class="form-group">
               <label for="resp_profissao">Profissão</label>
               <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                     <span class="input-group-text">
                     <i data-feather='user'></i>
                     </span>
                  </div>
                  <input id="resp_profissao" type="text" class="form-control" value="" name="resp_profissao" />
               </div>
            </div>
         </div>
         <div class="col-md-3" >
            <div class="form-group">
               <label for="resp_telefone">Contato</label>
               <div class="input-group input-group-merge">
                  <div class="input-group-prepend">
                     <span class="input-group-text">
                     <i data-feather='user'></i>
                     </span>
                  </div>
                  <input id="resp_telefone" type="text" class="form-control" value="" name="resp_telefone" />
               </div>
            </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
               <label class="d-block mb-1">Autorizacão para saída</label>                   
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="resp_autorizacao1" name="resp_autorizacao" value="1" class="custom-control-input"  checked />
                  <label class="custom-control-label check" for="resp_autorizacao1">Sim</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="resp_autorizacao0" name="resp_autorizacao" class="custom-control-input" value="0" />
                  <label class="custom-control-label check" for="resp_autorizacao0">Não</label>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            @if (Auth::user()->use_perfil !== 12) <button type="submit" class="btn btn-outline-primary waves-effect">Adicionar</button> @endif
         <input type="hidden" value="responsavel" name="salvarDados">
         </div>
      </div>

      <div style="height: 30px"></div>


      <table class="dependente-list-table table table-sm table-responsive-lg" >
         <thead class="thead-light">
         <tr>
            <th></th>
            <th>Nome</th>
            <th>Parentesco</th>
            <th>Contato</th>
            <th>Profissão</th>
            <th>Autorizacão para saída</th>
            <th></th>
         </tr>
         </thead>
      </table>

   </div>
</form>
