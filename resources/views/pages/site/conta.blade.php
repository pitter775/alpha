<div class="row">
   <div class="col-md-7">
      <div class="media mb-2">
         <?php
         $use_foto = null;
         if(isset($user->use_foto)){
            $use_foto = $user->use_foto;
         }
         ?>
         @if($use_foto == null)
            <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" alt="users avatar" data-tipo="avatar" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="100" />
            <input type="hidden" value="naotem" name="temfoto" id="temfoto" />
         @endif
         @if($use_foto !== null)
            <img src="{{asset('arquivos').'/'.$use_foto}}" alt="users avatar" data-tipo="nova" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="100"  />
            <input type="hidden" value="tem" name="temfoto" id="temfoto" />
         @endif

         
         <div class="media-body mt-50">
            <h4>{{$user->name ?? ''}}</h4>
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
    

      <label for="fullname">Nome</label>
      <div class="input-group input-group-merge">
         <div class="input-group-prepend">
            <span class="input-group-text">
               <i data-feather='user'></i>
            </span>
         </div>
         <input id="fullname" type="text" class="form-control" value="{{$user->name ?? ''}}" name="fullname" />
      </div>
   </div>
   <div class="col-md-5">
      <div class="row" style="margin-top: 20px">
         <div class="col-12">
             <div class="card card-profile">
             <img
                 src="{{asset('app-assets/images/banner-escola.jpg')}}"
                 class="img-fluid card-img-top"
                 alt="Profile Cover Photo"
             />
             <div class="card-body">
                 <div class="profile-image-wrapper">
                 <div class="profile-image">
                     <div class="avatar">
                         <img src="{{asset('app-assets/images/escola-drummond.jpg')}}" />
                     </div>
                 </div>
                 </div>
                 <h3>Carlos Drummond de Andrade</h3>
                 <h6 class="text-muted">Centro Barueri - SP</h6>

             </div>
             </div>
         </div>        
     </div>
   </div>

   <div class="col-12 d-flex flex-sm-row flex-column mt-2">
      <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Dados</button>
      <input type="hidden" value="conta" name="salvarDados">
   </div>
</div>



