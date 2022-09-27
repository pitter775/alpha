/*=========================================================================================
    File Name: app-cardapio.js
    Description: criação edição dos usuários
    --------------------------------------------------------------------------------------
    autor:Bico Pitter R. 
    contato: pitter775@gmail.com / 11-9 4950 6267
==========================================================================================*/
$(function() {
    'use strict';
    var dtTableList = $('.cardapio-list-table'); //id da tabela q esta na div  
    var isRtl = $('html').attr('data-textdirection') === 'rtl';
    var newForm = $('.add-new-cardapio'); //formula 
    var modalForm = $('#modalLargo'); //formula 
    var table = false;

    listCardapio();


    function listCardapio() {
        if (table) {
            table.destroy();
        }
        // Datatable
        if (dtTableList.length) {

            var groupingTable = dtTableList.DataTable({
                //busca uma rota 
                // ajax: assetPath + 'data/cardapio-list.json', // JSON file to add data
                retrieve: true,

                ajax: { url: "/atendimento/all", dataSrc: "" },
                columns: [
                    // columns according to JSON
                    { data: 'id' },
                    { data: 'ate_nome' },
                    { data: 'ate_telefone' },
                    { data: 'ate_tipo' },
                    { data: 'ate_titulo' },
                    {
                        data: function(dados) {
                            if (dados.created_at) {
                                var datef = new Date(dados.created_at);
                                var dataFormatada = datef.toLocaleDateString('pt-BR', { timeZone: 'UTC' });
                                return dataFormatada;
                            } else {
                                return null;
                            }

                        }
                    },
                    
                    { data: 'ate_status' },
                    { data: '' }
                ],
                columnDefs: [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        // For Responsive
                        className: 'control',
                        orderable: false,
                        responsivePriority: 2,
                        targets: 7
                    },
                    {
                        // Actions
                        targets: 8,
                        title: 'Ação',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            // console.log(full);
                            var id = full['id'];
                            var nome = full['ate_titulo'];

                            return (
                                '<a href="javascript:;" class="item-edit delete-record" id="deletar_td" style="' + displayno + '" data-nome="' + nome + '"  data-id="' + id + '" style="color: #f54b20 !important">' +
                                feather.icons['x-circle'].toSvg({ class: 'font-small-4' }) +
                                '</a>'
                            );
                        }
                    }
                ],
                order: [
                    [2, 'desc']
                ],
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 50,
                lengthMenu: [50, 75, 100],
                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
                // Buttons with Dropdown
                buttons: [{
                        extend: 'collection',
                        className: 'btn btn-outline-secondary dropdown-toggle mr-2 waves-effect',
                        text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50 ' }) + 'Export',
                        buttons: [{
                                extend: 'print',
                                text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'Print',
                                className: 'dropdown-item',
                                exportOptions: { columns: [0, 1, 2] }
                            },
                            {
                                extend: 'csv',
                                text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Csv',
                                className: 'dropdown-item',
                                exportOptions: { columns: [0, 1, 2] }
                            },
                            {
                                extend: 'excel',
                                text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
                                className: 'dropdown-item',
                                exportOptions: { columns: [0, 1, 2] }
                            },
                            {
                                extend: 'copy',
                                text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Copy',
                                className: 'dropdown-item',
                                exportOptions: { columns: [0, 1, 2] }
                            }
                        ],
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');
                            setTimeout(function() {
                                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                            }, 50);
                        }
                    },
                    {
                        text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4 ' }) + 'Novo Atendimento',
                        className: 'create-new btn btn-primary waves-effect btnovoatendimento',
                        attr: {
                            'data-toggle': 'modal',
                            'data-target': '#modalLargo'
                        },
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    }
                ],

                language: {
                    "url": "/app-assets/pt_br.json",
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
            });
            setTimeout(function() {
                $('div.head-label').html('<h6 class="mb-0">Listando todas o atendimentos</h6>');
                console.log('foi');
            }, 1000);
            
        }
        table = groupingTable;
    }

    // Form Validation
    if (newForm.length) {
        newForm.validate({
            errorClass: 'error',
            rules: {
                'name': {
                    required: true
                }
            }
        });

        newForm.on('submit', function(e) {
            var isValid = newForm.valid();
            e.preventDefault();
            console.log('teste');

            if (isValid) {
                console.log('valido');
                let serealize = newForm.serializeArray();
                console.log(serealize);
                $.ajax({
                    type: "POST",
                    url: '/atendimento/cadastro',
                    data: serealize,
                    success: function(data) {
                        if(data == 'ok'){
                            modalForm.modal('hide');
                            toastr['success']('👋 Registro adicionado.', 'Sucesso!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: isRtl
                            });
                            listCardapio();
                        }else{
                            //mensagem
                            toastr['danger']('Não foi possivel registrar esse atendimento.', 'Erro!', {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: isRtl
                            });
                        }
                        //recarregar tabela
                    }
                });
            }
        });
    }

    $(document).on('click', '.btnovoatendimento', function() {
        $.ajax({
            type: "GET",
            url: '/atendimento/novo',
            data: { "_token": $('meta[name="csrf-token"]').attr('content') },
            success: function(retorno) {
                $('#novoAtendimento').html(retorno);
            }
        });
    });

    
    $(document).on('click', '#deletar_td', function() {
        var t = dtTableList.DataTable();
        var row = dtTableList.DataTable().row($(this).parents('tr')).node();
        var id = $(this).data('id');
        //mensagem de confirmar 
        Swal.fire({
            title: 'Remover Cardápio',
            text: $(this).data('nome') + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, pode deletar!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                $.get('/cardapio/delete/' + id, function(retorno) {
                    if (retorno == 'Erro') {
                        //mensagem
                        toastr['danger']('👋 Arquivo comprometido, não pode excluir.', 'Erro!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: isRtl
                        });
                    } else {
                        //animação de saida
                        $(row).css('background-color', '#fe7474');
                        $(row).css('color', '#fff');
                        $(row).animate({
                            opacity: 0,
                            left: "0",
                            backgroundColor: '#c74747'
                        }, 1000, "linear", function() {
                            var linha = $(this).closest('tr');
                            t.row(linha).remove().draw()
                        });
                        // mensagem info
                        toastr['success']('👋 Arquivo Removido.', 'Sucesso!', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: isRtl
                        });

                    }
                });
            }
        });


    });

    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });

});