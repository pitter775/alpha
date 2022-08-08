
<style>
    body {width: 100%;height: 100%;margin: 0;padding: 0;font: 12pt "Tahoma";}
    * {box-sizing: border-box;-moz-box-sizing: border-box;}
    .page {width: 210mm;min-height: 297mm;padding: 10mm;margin: 5mm auto;border-radius: 5px;background: white;box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);}
    .subpage {padding: 0cm;/* border: 5px red solid; */height: 277mm;/* outline: 1cm #FFEAEA solid; */}
    .imgescola{ width: 80px; float: right; margin-left: 20PX}
    .row{display: table; width: 100%}
    .col-left{float: left;}
    .col-right{float: right;}
    .aling-right{ text-align: right}
    .font-pequena { font-size: 12px}
    .prontuario{ font-weight: 700;}
    
    @page {size: A4; margin: 0;}
    @media print {html, body {width: 210mm; height: 297mm;}
        .page {margin: 0;border: initial;border-radius: initial;width: initial;min-height: initial;box-shadow: initial;background: initial;page-break-after: always;}
    }
</style>
<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <head>
                    <div class="row">
                        <div class="col-left">
                            <p class="prontuario">PRONTUÁRIO</p>
                        </div>
                        <div class="col-right aling-right font-pequena" style="width: 400px; ">
                            <img src="{{asset('app-assets/images/escola-drummond.jpg')}}" class="imgescola" />
                            <p>Carlos Drummond de Andrade</p>
                            <p>Chácara Solar Jaguari Santana do Parnaíba</p>
                        </div>
                    </div>
                </head>
                <div>
                    <p> Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba </p>
                </div>
                <div style="margin-top: 800px">
                    <p> Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba </p>
                    <p> Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba Chácara Solar Jaguari Santana do Parnaíba </p>
                </div>
                
    
            </div>    
        </div>
        <div class="page">
            <div class="subpage">Page 2/2</div>    
        </div>
    </div>
</body>



<script>
    // window.print();
</script>