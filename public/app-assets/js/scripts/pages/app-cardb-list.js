/*=========================================================================================
    File Name: app-publicacao.js
    Description: criação edição dos usuários
    --------------------------------------------------------------------------------------
    autor: Pitter R. Bico
    contato: pitter775@gmail.com / 11-9 4950 6267
==========================================================================================*/
$(function() {
    'use strict';
    var isRtl = $('html').attr('data-textdirection') === 'rtl';

    console.log('dfadsfsa');

    
    var tableCardapio = false;



    $(document).on('click', '.btentrada ', function() {    
        let id = $(this).data('idaluno');
        let nome = $(this).data('nome');
        $.get('/usuario/card/entrada/' + id, function(retorno) {
            if(retorno == 'ok'){               
                window.open('sms:949506267?body=Olá! '+nome +', acabou de chegar na escola.', '_blank');
            }
        });
    });
    $(document).on('click', '.btsaida ', function() {    
        let id = $(this).data('idaluno');
        window.open('/usuario/card/saida/'+id, '_blank');
    });


    

    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });

});