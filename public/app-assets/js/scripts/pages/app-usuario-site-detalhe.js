/*=========================================================================================
    File Name: app-user.js
    Description: criação edição dos usuários
    --------------------------------------------------------------------------------------
    autor: Pitter R. Bico
    contato: pitter775@gmail.com / +55 11-94950 6267
==========================================================================================*/
$(function () {
   'use strict';

   var changePicture = $('#change-picture'),
      userAvatar = $('.user-avatar');
   var formConta = $('.form-conta'); //formulario
   var formPessoais = $('.form-pessoais'); //formulario
   var formEndereco = $('.form-endereco'); //formulario
   var formResponsavel = $('.form-responsavel'); //formulario
   var formSaude = $('.form-saude'); //formulario
   var formAlimento = $('.form-alimentares'); //formulario
   var iduser = $('#iduser').val();

   divUser();

   if ($('#hempresa').val() == '') {
      $('#empresa').val(0); $('#empresa').trigger('change');
   }
   var data = new Date();
   var dataFormatada = data.toLocaleDateString('pt-BR', { timeZone: 'UTC' });
   $('#alteracao').val(dataFormatada); $('#alteracao').trigger('change');
   $('#alteracao2').val(dataFormatada); $('#alteracao2').trigger('change');


   $('#fotoUser').on('change', function (e) {
      console.log($('#fotoUser').val());
   });
   // Change user profile picture
   if (changePicture.length) {
      $(changePicture).on('change', function (e) {

         var reader = new FileReader(),
            files = e.target.files;
         reader.onload = function () {
            if (userAvatar.length) {
               userAvatar.attr('src', reader.result);
            }
         };
         reader.readAsDataURL(files[0]);
      });
   }

   function divUser() {
      console.log('divuser');
      $.get('/matriculas/getuser/' + iduser, function (retorno) {
         $('#divcarduser').html(retorno);
      });
   }

   // To initialize tooltip with body container
   $('body').tooltip({
      selector: '[data-toggle="tooltip"]',
      container: 'body'
   });
   $(document).on('click', '.btmudar', function () {
      $('#fotouser').data('tipo', 'nova');
      $('#temfoto').val('tem');
   });
   $(document).on('click', '.btreset', function (e) {
      e.preventDefault();
      $('#fotouser').data('tipo', 'avatar');

      var img = document.querySelector("#fotouser");
      img.setAttribute('src', '/app-assets/images/avatars/avatar.png');
      $('#temfoto').val('naotem');
   });
   // Form Conta
   if (formConta.length) {
      formConta.validate({
         errorClass: 'error',
         rules: {
            'fullname': { required: true },
            'email': { required: true },
            'status': { required: true },
            'perfil': { required: true }
         }
      });

      formConta.on('submit', function (e) {
         e.preventDefault();
         var isValid = formConta.valid();
         var fototipo = $('#fotouser').data('tipo');
         if (fototipo == 'nova') {
            var url = document.getElementById("fotouser").getAttribute("src");

         }

         if (isValid) {
            //let serealize = formConta.serializeArray();
            var serealize = new FormData(formConta[0]);
            //serealize.push({ name: "file", value: new FormData(formConta[0]) });
            console.log(serealize);

            $.ajax({
               type: "POST",
               url: '/matriculas/cadastro',
               data: serealize,
               processData: false,
               contentType: false,
               success: function (data) {
                  
                  console.log('conta');

                  // var divcarhistory = $('#divcarhistory');
                  // divcarhistory.animate({ opacity: 0, marginTop: "100px" }, 500, "easeInQuart", function () {
                  //    //historyList();
                  //    divcarhistory.animate({ opacity: 1, marginTop: "0" }, 500, "easeOutQuart", function () { });
                  // });

                  var divcarduser = $('#divcarduser');
                  divcarduser.animate({ opacity: 0, marginTop: "100px" }, 500, "easeInQuart", function () {
                     console.log('animando');
                     divUser();
                     console.log('trocou');
                     divcarduser.animate({ opacity: 1, marginTop: "0" }, 500, "easeOutQuart", function () { });
                  });


               }
            });
         }
      });
   }
   // Form Pessoal
   if (formPessoais.length) {
      formPessoais.validate({
          errorClass: 'error',
          rules: {
              'use_cor_pele': { required: true },
              'sexo': { required: true }
          }
      });

      formPessoais.on('submit', function (e) {
         e.preventDefault();
         var isValid = formPessoais.valid();
         let serealize = formPessoais.serializeArray();

         if (isValid) {
            let serealize = formPessoais.serializeArray();
            console.log(serealize);

            $.ajax({
               type: "POST",
               url: '/matriculas/cadastro',
               data: serealize,
               success: function (data) {
                  var divcarduser = $('#divcarduser');
                  divcarduser.animate({
                     opacity: 0,
                     marginTop: "100px"
                  }, 500, "easeInQuart", function () {
                     divUser();
                     divcarduser.animate({
                        opacity: 1,
                        marginTop: "0"
                     }, 500, "easeOutQuart", function () {
                        //historyList();
                     });
                  });
               }
            });
         }
      });
   }
   // Form Endereco
   if (formEndereco.length) {
      formEndereco.validate({
          errorClass: 'error',
          rules: {
              'end_rua': { required: true },
              'end_numero': { required: true },
              'end_cep': { required: true }
          }
      });

      formEndereco.on('submit', function (e) {
         e.preventDefault();
         var isValid = formEndereco.valid();
         let serealize = formEndereco.serializeArray();

         if (isValid) {
            let serealize = formEndereco.serializeArray();
            console.log(serealize);

            $.ajax({
               type: "POST",
               url: '/matriculas/cadastro',
               data: serealize,
               success: function (data) {
                  var divcarduser = $('#divcarduser');
                  divcarduser.animate({
                     opacity: 0,
                     marginTop: "100px"
                  }, 500, "easeInQuart", function () {
                     divUser();
                     divcarduser.animate({
                        opacity: 1,
                        marginTop: "0"
                     }, 500, "easeOutQuart", function () {
                        //historyList();
                     });
                  });
               }
            });
         }
      });
   }
   // Form Responsavel
   if (formResponsavel.length) {
      formResponsavel.validate({
            errorClass: 'error',
            rules: {
            //   'end_rua': { required: true },
            //   'end_numero': { required: true },
            //   'end_cep': { required: true }
            }
      });

      formResponsavel.on('submit', function (e) {
         e.preventDefault();
         var isValid = formResponsavel.valid();

         if (isValid) {
            let serealize = formResponsavel.serializeArray();
            console.log(serealize);

            $.ajax({
               type: "POST",
               url: '/matriculas/cadastro',
               data: serealize,
               success: function (data) {
                  var divcarduser = $('#divcarduser');
                  divcarduser.animate({
                     opacity: 0,
                     marginTop: "100px"
                  }, 500, "easeInQuart", function () {
                     divUser();
                     divcarduser.animate({
                        opacity: 1,
                        marginTop: "0"
                     }, 500, "easeOutQuart", function () {
                        //historyList();
                     });
                  });
               }
            });
         }
      });
   }
   // Form Saude
   if (formSaude.length) {
      formSaude.validate({
          errorClass: 'error',
          rules: {
            //   'end_rua': { required: true },
            //   'end_numero': { required: true },
            //   'end_cep': { required: true }
          }
      });

      formSaude.on('submit', function (e) {
         e.preventDefault();
         var isValid = formSaude.valid();

         if (isValid) {
            let serealize = formSaude.serializeArray();
            console.log(serealize);

            $.ajax({
               type: "POST",
               url: '/matriculas/cadastro',
               data: serealize,
               success: function (data) {
                  var divcarduser = $('#divcarduser');
                  divcarduser.animate({
                     opacity: 0,
                     marginTop: "100px"
                  }, 500, "easeInQuart", function () {
                     divUser();
                     divcarduser.animate({
                        opacity: 1,
                        marginTop: "0"
                     }, 500, "easeOutQuart", function () {
                        //historyList();
                     });
                  });
               }
            });
         }
      });
   }
   // Form Alimentares
   if (formAlimento.length) {
      formAlimento.validate({
          errorClass: 'error',
          rules: {
            //   'end_rua': { required: true },
            //   'end_numero': { required: true },
            //   'end_cep': { required: true }
          }
      });

      formAlimento.on('submit', function (e) {
         e.preventDefault();
         var isValid = formAlimento.valid();

         if (isValid) {
            let serealize = formAlimento.serializeArray();
            console.log(serealize);

            $.ajax({
               type: "POST",
               url: '/matriculas/cadastro',
               data: serealize,
               success: function (data) {
                  var divcarduser = $('#divcarduser');
                  divcarduser.animate({
                     opacity: 0,
                     marginTop: "100px"
                  }, 500, "easeInQuart", function () {
                     divUser();
                     divcarduser.animate({
                        opacity: 1,
                        marginTop: "0"
                     }, 500, "easeOutQuart", function () {
                        //historyList();
                     });
                  });
               }
            });
         }
      });
   }






});
