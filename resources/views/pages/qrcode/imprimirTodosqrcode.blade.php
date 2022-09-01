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
        .imgaluno{ margin-top: -5px;     float: left; margin-right: 20px;        border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgb(34 41 47 / 12%), 0 2px 4px 0 rgb(34 41 47 / 8%);  }
            
        .blocofoto2{ font-size: 14px; margin-top: 30px; line-height: 20px;}
        .blocofoto{ font-size: 13px; display: table; width: 100%;}
        .blocofoto p{ line-height: 20px;}
        .blocofoto2 p{ line-height: 20px;}
        .titi1{font-size: 18px; margin-bottom: 10px; }
        .btimprimirqr{ cursor: pointer;}
        
        @page  {size: A4; margin: 0;}
        @media  print {html, body {width: 210mm; height: 297mm;}
            .page {margin: 0;border: initial;border-radius: initial;width: initial;min-height: initial;box-shadow: initial;background: initial;page-break-after: always;}
        }
    </style>
    <body>
        <div class="book">
            <div class="page">
                <div class="subpage">
                    <table class="piloto-list-table table table-sm table-responsive-lg">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <TBOdy>
                            @foreach($users as $key => $tab)                                               
                            <tr style="margin-top: 60px">                                
                                <td style="padding: 10px">{!! QrCode::size(250)->generate('https://educacaofuturo.org.br/usuario/card/'.$tab->id.'') !!}</td>
                                <td>{{$tab->name}}</td>
                                <td>{{ $tab->ser_apelido . ' - ' . $tab->ser_nome}}</td>
                            </tr>                            
                            @endforeach
                        </TBOdy>
                </div>    
            </div>
        </div>
    </body>
    
    
    
    <script>
      window.print();
    </script>