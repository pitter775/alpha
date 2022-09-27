<?php
    $fotouser = '/app-assets/images/avatars/avatar.png';
    if($user->use_foto){
        $fotouser = '/arquivos/'.$user->use_foto;
    }
?>
<style>
    
    body {width: 100%;height: 100%;margin: 0;padding: 0;font: 12pt "Tahoma"; print-color-adjust: exact; -webkit-print-color-adjust: exact;}
    * {box-sizing: border-box;-moz-box-sizing: border-box;}
    .page {width: 210mm;min-height: 297mm;padding: 10mm;margin: 5mm auto;border-radius: 5px;background: white;box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);}
    .subpage {padding: 0cm;/* border: 5px red solid; /height: 277mm;/ outline: 1cm #FFEAEA solid; */}
    .imgescola{ width: 80px; float: right; margin-left: 20px; margin-top: -10px;}
    .row{display: table; width: 100%}
    .col-left{float: left;}
    .col-right{float: right;}
    .aling-right{ text-align: right}
    .font-pequena { font-size: 12px}
    .prontuario{  font-size: 20px; margin-top: 0px; }
    .headescola{ font-size: 10px; text-align: right; float: right;}
    .headescola p{line-height: 15px;}
    .imgaluno{ margin-top: -5px; width: 130px; height: 130px; background-image: url("/arquivos/{{$user->use_foto}}");
        background-size: cover; background-position: center;        float: left; margin-right: 20px;        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgb(34 41 47 / 12%), 0 2px 4px 0 rgb(34 41 47 / 8%);  }
        
    .blocofoto2{ font-size: 14px; margin-top: 30px; line-height: 20px;}
    .blocofoto{ font-size: 13px; display: table; width: 100%;}
    .blocofoto p{ line-height: 20px;}
    .blocofoto2 p{ line-height: 20px;}
    .titi1{font-size: 18px; margin-bottom: 10px; }
    
    @page  {size: A4; margin: 0;}
    @media  print {html, body {width: 210mm; height: 297mm;}
        .page {margin: 0;border: initial;border-radius: initial;width: initial;min-height: initial;box-shadow: initial;background: initial;page-break-after: always;}
    }
</style>
<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <head >
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-left">
                            <p class="prontuario">PRONTUÁRIO ANO 2022</p>
                            {{-- <p style="margin-top: -20px"><b>RA </b> 3589547</p> --}}
                        </div>
                        <div class="headescola" style="width: 400px; margin-top: -10px;">
                            <img src="https://educacaofuturo.org.br/app-assets/images/escola-drummond.jpg" class="imgescola" />
                            <p><b>Carlos Drummond de Andrade</b> <br>
                            Rua Órbita 182 Chácara Solar Jaguari Santana do Parnaíba <br>
                            secretaria@educacaofuturo.org.br - 11 4257-2198</p>
                        </div>
                    </div>
                </head>
                <div class="blocofoto" >
                    <div class="imgaluno"></div>   
                    <p style="font-size: 20px; margin-bottom: 0px"><b>{{$user->name ?? ''}}</b></p>      
                    <p>                        
                        <b>Data de nascimento:</b> {{date( 'd/m/Y' , strtotime($user->use_dt_nascimento )) ?? '' }} <span style=" margin: 0 10px;">-</span>
                        <b>RG:</b> {{$user->use_rg ?? ''}}  <span style=" margin: 0 10px;">-</span>
                        <b>CPF:</b> {{$user->use_cpf ?? ''}}  <br/>
                        <b>Reg. nascimento:</b> {{$user->use_regiao_nascimento ?? ''}}  <span style=" margin: 0 10px;">-</span>
                        <b>Sexo:</b> {{$user->use_sexo ?? ''}}   <br>
                        <b>Raça / Cor definidas pelo IBGE:</b>{{$user->use_cor_pele ?? ''}}  <br>
                        ______________________________________________________________________________
                        <b>Tipo:</b> @if($user->mat_status == 1) Matriculado @else Inativo @endif <span style=" margin: 0 10px;">-</span>
                        <b>Professora:</b> {{$situacao->name_prof}}  <span style=" margin: 0 10px;">-</span>
                        <b>Serie:</b> {{$situacao->ser_nome}} - {{$situacao->ser_periodo}} - {{$situacao->ser_apelido}}  
                    </p>           
                </div>
                <div class="blocofoto2" >
                    <p class="titi1">Endereço</p> 
                    <b>Rua:</b> {{$user->end_rua ?? ''}}, {{$user->end_numero ?? ''}} <span style=" margin: 0 10px;">-</span>
                    <b>Complemento:</b> {{$user->end_complemento ?? ''}} <span style=" margin: 0 10px;">-</span>
                    <b>CEP:</b> {{$user->end_cep ?? ''}} <br>
                    <b>Bairro:</b> {{$user->end_bairro ?? ''}} <span style=" margin: 0 10px;">-</span>
                    <b>Cidade:</b> {{$user->end_cidade ?? ''}} <span style=" margin: 0 10px;">-</span>
                    <b>Estado:</b> {{$user->end_estado ?? ''}} 
                </div>
                <div class="blocofoto2" >
                    <p class="titi1">Responsáveis</p> 

                    @foreach ($dependentes as $dep )
                        {{$dep->resp_parentesco ?? ''}}  <span style=" margin: 0 10px;">-</span>  {{$dep->resp_nome ?? ''}} <span style=" margin: 0 10px;">-</span>    {{$dep->resp_telefone ?? ''}}   <br>
                    @endforeach
                        
                  
                   
                </div>
                <div class="blocofoto2" >
                    <p class="titi1">Autorização de Saída e Retirada do Aluno</p> 
                    @foreach ($dependentes as $dep )
                        @if($dep->resp_autorizacao == 1)
                            {{$dep->resp_parentesco ?? ''}}  <span style=" margin: 0 10px;">-</span>  {{$dep->resp_nome ?? ''}} <span style=" margin: 0 10px;">-</span>    {{$dep->resp_telefone ?? ''}}   <br>
                        @endif
                    @endforeach
                </div>
                <div class="blocofoto2" >
                    <p class="titi1">Saúde</p> 
                    <b>Cartão Nascional de Saúde - SUS: </b> {{$user->sau_sus ?? ''}}  <br>
                    <b>Alergia: </b> {{$user->sau_alergia_detalhe ?? ''}} <span style=" margin: 0 10px;">-</span> 
      
                </div>
                <div class="blocofoto2" >
                    @if($moviment->count() > 0)
                    <p class="titi1">Movimentação do Aluno</p> 
                    @endif

                    @foreach ($moviment as $mov )
                        
                        {{$mov->alt_tipo ?? ''}} <span style=" margin: 0 5px;"> </span>  
                        {{date( 'd/m/Y' , strtotime($mov->alt_data )) ?? '' }} <span style=" margin: 0 5px;"> </span>
                        {{$mov->ser_nome ?? ''}}   {{$mov->ser_periodo ?? ''}}  {{$mov->ser_apelido ?? ''}} <span style=" margin: 0 5px;"> </span> <br>
                  
                
                    @endforeach

                    
                </div>
                <div class="blocofoto2 aling-right" style="margin-top: 70px" >
                    <p class="titi1" > Tenho total conhecimento e com as quais concordo plenamente</p> 
                    <p style="margin-top: 40px">Santana do Parnaíba, <?php 
                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
echo strftime('%A, %d de %B de %Y', strtotime('today'));
                    ?></p>
                    <p style="margin-top: 70px"> Ass. ___________________________________________________________</p>
                </div>
                
    
            </div>    
        </div>
    </div>
</body>



<script>
 window.print();
</script>