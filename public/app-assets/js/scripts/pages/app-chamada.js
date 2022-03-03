/*=========================================================================================
    File Name: app-serie.js
    Description: criação edição dos usuários
    --------------------------------------------------------------------------------------
    autor: Pitter R. Bico
    contato: pitter775@gmail.com / 11-9 4950 6267
==========================================================================================*/
$(function() {
    'use strict';

    $(document).on('click', '.bt-presente ', function() {
        console.log('presente', $(this).data('userid'));
        let btclick = $(this);
        btclick.parents('div').eq(2).addClass('divpresente');
        btclick.parents('div').eq(2).removeClass('divfalta');
        $.ajax({
            type: "POST",
            url: '/presenca/cadastro',
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), iduser: $(this).data('userid'), datanaw: $(this).data('datanaw'), tipo: '1' },
            success: function(data) {

                console.log(data['cadastro']);
                console.log(data['cadastro-1']);
                contaChamada();
            }
        });
    });
    $(document).on('click', '.bt-falta', function() {
        console.log('falta');
        let btclick = $(this);
        btclick.parents('div').eq(2).addClass('divfalta');
        btclick.parents('div').eq(2).removeClass('divpresente');
        $.ajax({
            type: "POST",
            url: '/presenca/cadastro',
            data: { iduser: $(this).data('userid'), datanaw: $(this).data('datanaw'), tipo: '0', "_token": $('meta[name="csrf-token"]').attr('content') },
            success: function(data) {

                console.log(data['cadastro']);
                console.log(data['cadastro-1']);
                contaChamada();
            }
        });
    });
    $(document).on('click', '.btavataruser', function() {
        console.log('btavataruser');
        let iduser = $(this).data('iduser');
        window.location.href = "/usuario/detalhes/" + iduser;
    });

    function contaChamada() {
        let presenca = 0;
        let falta = 0;

        $(".cardserie ").each(function() {
            if ($(this).hasClass("divpresente")) {
                presenca = presenca + 1;
            }
            if ($(this).hasClass("divfalta")) {
                falta = falta + 1;
            }
        });

        $('.sppresente').text(presenca);
        $('.spfalta').text(falta);


    }
    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });

});