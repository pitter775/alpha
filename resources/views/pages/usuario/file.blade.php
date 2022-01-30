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
      <a href="" data-id="{{$value->id}}" data-name="{{$value->name_arq}}" class="btn btn-outline-danger waves-effect btfechar">X</a>
      <div class="baixararquivo" data-url="{{$value->url}}" data-name="{{$value->name_arq}}" data-tipo="{{$value->tipo}}">
         <div class="card-img-top file-logo-wrapper" >
            <div class="d-flex align-items-center justify-content-center w-100">
               @switch( $value->tipo )
               @case('doc')
               <img src="../../../app-assets/images/icons/ico-word.png" alt="file-icon" height="35" />
               @break
               @case('docx')
               <img src="../../../app-assets/images/icons/ico-word.png" alt="file-icon" height="35" />
               @break
               @case('xls')
               <img src="../../../app-assets/images/icons/ico-excel.png" alt="file-icon" height="35" />
               @break
               @case('xlsx')
               <img src="../../../app-assets/images/icons/ico-excel.png" alt="file-icon" height="35" />
               @break
               @case('png')
               <img src="../../../app-assets/images/icons/ico-img.png" alt="file-icon" height="35" />
               @break
               @case('jpeg')
               <img src="../../../app-assets/images/icons/ico-img.png" alt="file-icon" height="35" />
               @break
               @case('jpg')
               <img src="../../../app-assets/images/icons/ico-img.png" alt="file-icon" height="35" />
               @break
               @case('tif')
               <img src="../../../app-assets/images/icons/ico-img.png" alt="file-icon" height="35" />
               @break
               @case('pdf')
               <img src="../../../app-assets/images/icons/ico-pdf.png" alt="file-icon" height="35" />
               @break
               @case('txt')
               <img src="../../../app-assets/images/icons/ico-txt.png" alt="file-icon" height="35" />
               @break
               @case('pptx')
               <img src="../../../app-assets/images/icons/ico-powerpoint.png" alt="file-icon" height="35" />
               @break
               @case('ppt')
               <img src="../../../app-assets/images/icons/ico-powerpoint.png" alt="file-icon" height="35" />
               @break
               @case('mp3')
               <img src="../../../app-assets/images/icons/ico-musica.png" alt="file-icon" height="35" />
               @break
               @case('mp4')
               <img src="../../../app-assets/images/icons/ico-video.png" alt="file-icon" height="35" />
               @break
               @case('zip')
               <img src="../../../app-assets/images/icons/ico-zip.png" alt="file-icon" height="35" />
               @break
               @default
               <img src="../../../app-assets/images/icons/ico-default.png" alt="file-icon" height="35" />
               @break
               @endswitch
            </div>
         </div>
         <div class="card-body">
            <div class="content-wrapper">
               <p class="card-text file-name mb-0">{{$value->name_arq}}</p>
            </div>
            <small class="file-accessed text-muted">{{$value->size}}</small>
            <small class="file-accessed text-muted" style="float: right;">{{ date( 'd/m/Y' , strtotime($value->created_at))}}</small>
         </div>
      </div>
   </div>
   @endforeach
</div>