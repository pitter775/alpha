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

    var telefone = $('#telresp').val();

    if(telefone == ''){
        alert('Aluno sem número de telefone');
        telefone = false;
    }else{
        telefone.replace('-', ''); 
        telefone.replace('(', ''); 
        telefone.replace(')', ''); 
        telefone.replace(' ', ''); 
    }



    $(document).on('click', '.btentrada ', function() {    
        let id = $(this).data('idaluno');
        let nome = $(this).data('nome');
        let serid = $(this).data('serid');
        let sername = $(this).data('sername');
        $.ajax({
            type: "POST",
            url: '/usuario/card/entrada/',
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), 
                id: id, 
                nome: nome, 
                serid: serid 
            },
            success: function(data) {
                if(data == 'ok'){   
                    if(telefone) {            
                        window.open('sms:'+telefone+'?body=Olá! '+nome +', da turma '+sername+', esta entrando na escola. 🥰', '_blank');
                    }
                }
            }
        });
    });

    $(document).on('click', '.btsaida ', function() {    
        let id = $(this).data('idaluno');
        let nome = $(this).data('nome');
        let serid = $(this).data('serid');
        let sername = $(this).data('sername');
        $.ajax({
            type: "POST",
            url: '/usuario/card/saida/',
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), 
                id: id, 
                nome: nome, 
                serid: serid 
            },
            success: function(data) {
                if(data == 'ok'){    
                    if(telefone) {
                        window.open('sms:'+telefone+'?body=Olá! '+nome +', da turma '+sername+', esta saindo da escola. 🥰', '_blank');
                    }          
                    
                }
            }
        });        
    });


    

    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });

});