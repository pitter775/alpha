/*=========================================================================================
    File Name: app-user.js
    Description: criação edição dos usuários
    --------------------------------------------------------------------------------------
    autor: Pitter R. Bico
    contato: pitter775@gmail.com / +55 11-94950 6267
==========================================================================================*/
$(function () {
    'use strict';
    var formLinkEmail = $('.form-link-email'); //formulario


    console.log('tesa');


   if (formLinkEmail.length) {
    formLinkEmail.validate({
        errorClass: 'error',
        rules: {
            'email': { required: true }
        }
    });

    formLinkEmail.on('submit', function (e) {
       e.preventDefault();
       var isValid = formLinkEmail.valid();
       if (isValid) {
          let serealize = formLinkEmail.serializeArray();
          console.log(serealize);

          $.ajax({
             type: "POST",
             url: '/matriculas/link',
             data: serealize,
             success: function (retorno) {
                console.log('submit');
                console.log(retorno);
                enviar_mail(retorno['email'], retorno['tipo-token']);

                // if (retorno['tipo-pj'] == 'novo') {
                //    $('#id_pj').val(retorno['id-pj'])
                //    $('.divaditivos').fadeIn(500);
                // }
                // var divcarduser = $('#divcarduser');
                // divcarduser.animate({
                //    opacity: 0,
                //    marginTop: "100px"
                // }, 500, "easeInQuart", function () {
                //    divUser();
                //    divcarduser.animate({
                //       opacity: 1,
                //       marginTop: "0"
                //    }, 500, "easeOutQuart", function () {
                //      //historyList();
                //    });
                // });
             }
          });
       }
    });
 }

    function enviar_mail(email, token){
        $.ajax({
            type: "GET",
            url: '/enviolink',
            data: {'email':email, 'token':token },
            success: function (retorno) {
               console.log('email enviado!');
               toastr['success']('👋 Link do cadastro enviado para o email.', 'Sucesso!', {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            });
            }
        });
    }

    

    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });
});
