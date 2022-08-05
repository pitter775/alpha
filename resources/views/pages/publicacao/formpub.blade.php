<section class="full-editor" >
   <div class="row">
      <div class="col-md-12">
  
            <div class="form-group">
              <label for="pub_titulo">Título</label>
              <input type="text" value="  {{$dados->pub_titulo ?? ''}}" class="form-control" name="pub_titulo" id="pub_titulo"rows="2" placeholder="Título da Publicação" name="salvarDados">
            </div>
      </div>
        <div class="col-md-8">
            <form method="post">
                <textarea id="mytextarea">{!! $dados->pub_texto ?? '' !!}</textarea>
            </form>
        </div>
        <div class="col-md-4" >
            <div class="card" style="padding: 20px" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pub_tipo">Tipo</label>
                            <select id="pub_tipo" name="pub_tipo" class="form-control select2">
                               <option value="Evento" @if (isset($dados->pub_tipo)) @if ($dados->pub_tipo == "Evento") selected @endif @endif>Evento</option>
                               <option value="Informe" @if (isset($dados->pub_tipo)) @if ($dados->pub_tipo == "Informe") selected @endif @endif>Informe</option>
                            </select>
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pub_status">Status</label>
                            <select id="pub_status" name="pub_status" class="form-control select2">
                               <option value="Inativo"  @if (isset($dados->pub_status)) @if ($dados->pub_status == "Inativo") selected @endif @endif >Inativo</option>
                               <option value="Ativo"  @if (isset($dados->pub_status)) @if ($dados->pub_status == "Ativo") selected @endif @endif>Ativo</option>
                            </select>
                         </div>
                    </div>
                    
                    <div class="col-12">
                        {{-- arquivos --}}
                        <form action="{{ route('dropzoneFileUpload') }}" class="dropzone" id="file-upload" enctype="multipart/form-data" style="height: 50px;">
                            @csrf
                            <div class="dz-message">
                                Clique ou solte os arquivos aqui.<br>
                            </div>
                            <input type="hidden" value="" name="id_geral" id="id_geral">                            
                            <input type="hidden" value="{{$dados->pub_codigo ?? ''}}" name="inputcodigo" id="inputcodigo">                            
                        </form>

                        <div class="card" style="padding-right: 0;">
                            <div id="cardArquivos">
                              
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-sm-row flex-column">
                        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 btsalvarpublicacao">Salvar Dados</button>
                        <input type="hidden" value="{{ url('/') }}" name="urljavas" id="urljavas">
                        <input type="hidden" value="conta" name="salvarDados">
                     </div>
                </div>
               
            </div>            
        </div>
    </div>

    <script async src="../../../app-assets/js/scripts/dropzone.min.js"></script>
    <script async src="../../../app-assets/js/scripts/forms/form-file-uploader.js"></script>

    <script>
        console.log('init tinymce');
        tinymce.init({
            selector: '#mytextarea',
            language: "pt_BR",
            height: 600,
            plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount',
            ],
            toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

        var numeros = [];
        var codigo = '';
        if($('#inputcodigo').val() == ''){
         while (numeros.length < 16) {
            var aleatorio = Math.floor(Math.random() * 100);

            if (numeros.indexOf(aleatorio) == -1)
                numeros.push(aleatorio);
            codigo = codigo + aleatorio;
        }
        $('#inputcodigo').val(codigo);
        }
        
    </script>
</section>