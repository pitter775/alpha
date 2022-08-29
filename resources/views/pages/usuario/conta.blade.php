<div class="row">
   <div class="col-md-8">
      <div class="media mb-2">
         @if($user->use_foto == null)
         <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" alt="users avatar" data-tipo="avatar" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="100"  />
         <input type="hidden" value="naotem" name="temfoto" id="temfoto" />
         @endif
         @if($user->use_foto !== null)
         <img src="{{asset('arquivos').'/'.$user->use_foto}}" alt="users avatar" data-tipo="nova" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="100"  />
         <input type="hidden" value="tem" name="temfoto" id="temfoto" />
         @endif

         
         <div class="media-body mt-50">
            <h4 class="namefull">{{$user->name ?? ''}}</h4>
            <div class="col-12 d-flex mt-1 px-0">
               <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                  <span class="d-none d-sm-block btmudar">Mudar</span>
                  <input class="form-control" type="file" name="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" />
                  <span class="d-block d-sm-none">
                     <i class="mr-0" data-feather="edit"></i>
                  </span>
               </label>
               <button class="btn btn-outline-secondary btreset">Reset</button>
      
            </div>
         </div>
      </div>
   </div>


   <div class="col-md-7">
      <label for="fullname">Nome</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='user'></i>
            </span>
         </div>
         <input id="fullname" type="text" class="form-control" value="{{$user->name}}" name="fullname" />
      </div>
   </div>

   <div class="col-md-5" style="margin-bottom: 15px;">
      <label for="email">Email</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='mail'></i>
            </span>
         </div>
         <input id="email" type="text" class="form-control" value="{{$user->email}}" name="email" />
      </div>
   </div>



   <div class="col-md-4">
      <div class="form-group">
         <label for="use_perfil">Perfil</label>
         <select id="use_perfil" name="use_perfil" class="form-control select2">
            <option value="11" @if($user->use_perfil == 11) selected @endif>Aluno</option>
            <option value="12" @if($user->use_perfil == 12) selected @endif>Professor</option>
            <option value="17" @if($user->use_perfil == 17) selected @endif>Supervisor</option>
            <option value="10" @if($user->use_perfil == 10) selected @endif>ADM</option>
         </select>
      </div>
   </div>

   <div class="col-md-4">
      <label for="senha">Nova Senha</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='key'></i>
            </span>
         </div>
         <input id="senha" type="text" class="form-control" placeholder="Nova Senha" name="senha" />
      </div>
   </div>

   <div class="col-md-4">
      <div class="form-group">
         <label for="use_status">Status</label>
         <select id="use_status" name="use_status" class="form-control select2">
            <option value="1" @if($user->use_status == 1) selected @endif >Ativo</option>
            <option value="2" @if($user->use_status == 2) selected @endif >Inativo</option>
            <option value="3" @if($user->use_status == 3) selected @endif >Aguardando Vaga</option>
         </select>
      </div>
   </div>

   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="conta" name="salvarDados">
   </div>
</div>