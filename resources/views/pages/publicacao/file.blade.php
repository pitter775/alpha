<style>
   .btfechar {
      position: absolute;
      right: -5px;
      top: -5px;
      padding: 5px 8px 5px 8px;
      background-color: #fff;
      opacity: 0;
      transition: 0.3s;
      box-shadow: 2px 3px 5px -2px rgb(0 0 0 / 35%) !important;
   }

   .btfechar:hover {
      color: #fff !important;
      background-color: #ff4444 !important;
   }

   .file-manager-item:hover {
      box-shadow: 5px 6px 10px -4px rgb(0 0 0 / 35%) !important;
      transition: 0.3s !important
   }

   .file-manager-item:hover>.btfechar {
      opacity: 1;
   }

   .file-manager-item {
      transition: 0.3s;
   }
</style>
<div class="view-container" style="margin-right: 0;">
   <h6 class="files-section-title mt-2 mb-75 pb-50">Todos os Arquivos</h6>

   @foreach($files as $key => $value)

   <div class="card file-manager-item file">
      <a href="" data-id="{{$value->id}}" data-name="{{$value->arq_name_arq}}" class="btn btn-outline-danger waves-effect btfechar">X</a>
      <div class="copiarEnd" data-url="{{$value->arq_url}}" data-name="{{$value->arq_name_arq}}" data-tipo="{{$value->arq_tipo}}">
         <div class="card-img-top file-logo-wrapper" >
            <div class="d-flex align-items-center justify-content-center w-100 copiarEnd">
               <?php
                  if($value->arq_tipo == 'pdf' || $value->arq_tipo == 'PDF'){
                     echo $value->arq_name_arq;
                  }else{ ?>
                     <img src="/arquivos/{{$value->arq_url}}" alt="file-icon" height="45" />
               <?php   } ?>
               
               
            </div>
         </div>
         
      </div>
   </div>
   @endforeach
</div>