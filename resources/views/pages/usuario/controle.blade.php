<style>
   .cke2{ margin-top: 20px}
   .che2k{ margin-bottom: 0px !important}
</style>
<div class="row mt-1">
   <input type="hidden" value="{{$user->mat_escolas_id ?? ''}}" name="mat_escolas_id" id="mat_escolas_id">

   <div class="col-12">
      <h4 class="mb-1">
         <i data-feather='activity' class="font-medium-4 mr-25"></i>
         <span class="align-middle">Controle <span id="titcont"></span></span>
      </h4>
      <div class="divperfilAluno row" >
         <div class="col-md-10">
            <div class="form-group">
               <label for="mat_series_id">Selecione a Série do Aluno</label>
               <select id="mat_series_id" name="mat_series_id_alu" class="form-control select2">
                  <option value=""></option>
                  @foreach($series as $key => $value)
                     <option value="{{ $value->id }}" @if($user->mat_series_id == $value->id) selected @endif >{{ $value->ser_nome}} - {{ $value->ser_apelido}} - {{ $value->ser_periodo}}</option>
                  @endforeach
               </select>
            </div>
         </div>
      </div>
      <div class="divperfilProfessor row" >
         <div class="col-md-10">
            <div class="form-group">
               <label for="prof_series_id">Atribuir série ao Professor</label>
               <select id="prof_series_id" name="prof_series_id" class="form-control select2">
                     <option value=""></option>
                  @foreach($series as $key => $value)
                     <option value="{{ $value->id }}"  >{{ $value->ser_nome}} - {{ $value->ser_apelido}} - {{ $value->ser_periodo}}</option>
                  @endforeach
               </select>
            </div>
         </div>
      </div>
      <div class="divperfilOutro row"></div>
   </div>
   
  
   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="controle-aluno" id="salvarDados-cont" name="salvarDados">
   </div>
</div>