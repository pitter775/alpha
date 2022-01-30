/*=========================================================================================
    File Name: app-user.js
    Description: criação edição dos usuários
    --------------------------------------------------------------------------------------
    autor: Pitter R. Bico
    contato: pitter775@gmail.com / +55 11-94950 6267
==========================================================================================*/
$(function () {
    'use strict';
    var password = true;
    var row_edit = '';
    var confirmText = $('#confirm-text');
    var dtUserTable = $('.user-list-table');
    var dtUserHistoryTable = $('.history-list-table'),//id da tabela q esta na div  
        newUserSidebar = $('.new-user-modal'), //nome do modal
        isRtl = $('html').attr('data-textdirection') === 'rtl',
        newUserForm = $('.add-new-user'); //formula
    var tableHistory = false;
    var tableUser = false;

    flatpickr('.flatpickr-basic', {
        "dateFormat": 'd/m/Y' // locale for this instance only
    });

    // Datatable - history
    function historyList() {
        var iduser = $('#id_geral').val();
        var groupColumn = 3;

        if (tableHistory) {
            tableHistory.destroy();
        }

        if (dtUserHistoryTable.length) {
            var groupingTable = dtUserHistoryTable.DataTable({
                // ajax: assetPath + 'data/table-datatable.json',
                retrieve: true,
                ajax: {
                    url: "/historico/user/" + iduser, dataSrc: ""
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'valor' },
                    { data: 'data' },
                    { data: '' }
                ],
                columnDefs: [
                    {

                        // For Responsive
                        className: 'control',
                        orderable: false,
                        responsivePriority: 2,
                        targets: 0
                    },
                    {
                        // Actions<i data-feather='x-circle'></i>
                        targets: 4,
                        title: 'Ação',
                        orderable: false,
                        render: function (data, type, full, meta) {
                            var name = full['name'];
                            var valor = full['valor'];
                            var id = full['id'];
                            return (
                                '<a href="javascript:;" class="item-edit deletar_td_history" data-name="' + name + ': ' + valor + ' " data-id="' + id + '" style="color: #f54b20 !important">' +
                                feather.icons['x-circle'].toSvg({ class: 'font-small-4' }) +
                                '</a>'
                            );
                        }
                    }
                ],
                order: [[1, 'asc']],
                dom:
                    '<"d-flex justify-content-between align-items-center mx-0">',
                displayLength: 1000,
                lengthMenu: [7, 10, 25, 50, 75, 100],


                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                }
            });

            // Order by the grouping
            $('.dt-row-grouping tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                    groupingTable.order([groupColumn, 'desc']).draw();
                } else {
                    groupingTable.order([groupColumn, 'asc']).draw();
                }
            });
        }
        tableHistory = groupingTable;
    }

    datauser();
    // Datatable - user
    function datauser() {
        if (tableUser) {
            tableUser.destroy();
            $('.user_role').html('');
            $('.user_plan').html('');
            $('.user_status').html('');
        }
        if (dtUserTable.length) {
            var groupingTable = dtUserTable.DataTable({
                retrieve: true,
                //busca uma rota 
                // ajax: assetPath + 'data/user-list.json', // JSON file to add data
                ajax: { url: "/usuario/all", dataSrc: "" },
                columns: [
                    // columns according to JSON

                    { data: 'id' },
                    // { data: 'foto' }, //<img src="../../../app-assets/images/icons/angular.svg" class="mr-75" height="20" width="20" alt="Angular" />      
                    {
                        data: function (dados) {
                            let image = '';
                            if (dados.foto !== '' && dados.foto !== null){
                                image = '<img src="/arquivos/'+dados.foto+'" alt="Avatar" height="26" width="26"/>'
                            }else{
                                image = '<img src="/app-assets/images/avatars/avatar.png" alt="Avatar" height="26" width="26" />'
                            }
                            return '<div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="'+dados.name+'">'
                                + image + '</div>';
                        }
                    },
                    { data: 'name' },
                    { data: 'email' },
                    // { data: 'perfil' },
                    { //format perfil
                        data: function (dados) {
                            if (dados.perfil == 1) { return 'Usuario'; }
                            if (dados.perfil == 10) { return 'ADM'; }
                        }
                    },
                    {
                        data: function (dados) {
                            if (dados.status == 2) { return '<span class="badge bg-light-danger">Inativo</span>'; }
                            if (dados.status == 1) { return '<span class="badge bg-light-success">Ativo</span>'; }
                        }
                    },
                    { data: 'salario' },
                    { //formatando a data para pt-br
                        data: function (dados) {
                            if (dados.admissao) {
                                var datef = new Date(dados.admissao);
                                var dataFormatada = datef.toLocaleDateString('pt-BR', { timeZone: 'UTC' });
                                return dataFormatada;
                            } else {
                                return null;
                            }

                        }
                    },
                    { data: 'tarifa' },
                    { data: 'supervisao' },
                    { data: 'setor' },
                    { data: 'alocacao' },
                    { data: 'frente' },
                    { data: 'cargo' },
                    { data: 'regime' },
                    { data: 'empresa' }

                ],
                columnDefs: [
                    // {
                    //     "targets": [ 0 ],
                    //     "visible": false,
                    //     "searchable": false
                    // },
                    {
                        // para responsividade
                        className: 'control',
                        orderable: false,
                        responsivePriority: 2,
                        targets: 0
                    },
                    {
                        // Actions
                        targets: 0,
                        title: 'Ação',
                        orderable: false,
                        render: function (data, type, full, meta) {
                            var $id = full['id'],
                                $name = full['name'],
                                $email = full['email'],
                                $perfil = full['perfil'],
                                $status = full['status'],
                                $salario = full['salario'],
                                $admissao = dataBR(full['admissao']),
                                $tarifa = full['tarifas_id'],
                                $supervisao = full['supervisaos_id'],
                                $setor = full['setors_id'],
                                $alocacao = full['alocacaos_id'],
                                $frente = full['frentes_id'],
                                $cargo = full['cargos_id'],
                                $regime = full['regime'],
                                $empresa = full['empresas_id'];

                            return (
                                '<div class="btn-group">' +
                                '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                                feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-right">' +
                                '<a class="dropdown-item" href="usuario/detalhes/' + $id + '">' + feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Detalhes</a>' +
                                '<a href="javascript:;" class="dropdown-item delete-record" data-id="' + $id + '" data-name="' + $name + '"  id="deletar_td">' + feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) + 'Deletar</a></div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }
                ],
                order: [[1, 'asc']],
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100],
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json",
                    paginate: {
                        // remove previous & next text da pagina
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
                // Buttons with Dropdown
                buttons: [
                    {
                        extend: 'collection',
                        className: 'btn btn-outline-secondary dropdown-toggle mr-2 waves-effect',
                        text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50 ' }) + 'Export',
                        buttons: [
                            {
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
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');
                            setTimeout(function () {
                                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                            }, 50);
                        }
                    },
                    {
                        text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4 ' }) + 'Novo usuário',
                        className: 'create-new btn btn-primary waves-effect',
                        attr: {
                            'data-toggle': 'modal',
                            'data-target': '#modals-slide-in'
                        },
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    }
                ],

                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json",
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
                initComplete: function () {
                    // Adding role filter once table initialized
                    this.api()
                        .columns(12)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="UserRole" class="form-control select2 "><option value=""> Frente </option></select>'
                            )
                                .appendTo('.user_role')
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                });
                        });
                    // Adding plan filter once table initialized
                    this.api()
                        .columns(14)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="UserPlan" class="form-control select2"><option value=""> Regime </option></select>'
                            )
                                .appendTo('.user_plan')
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                });
                        });
                    // Adding status filter once table initialized

                    this.api()
                        .columns(11)
                        .every(function () {
                            var column = this;
                            var select = $(
                                '<select id="UserStatus" class="form-control select2"><option value=""> Alocação </option></select>'
                            )
                                .appendTo('.user_status')
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function (d, j) {
                                    select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
                                });
                        });
                    // Adding status filter once table initialized

                }
            });
            $('div.head-label').html('<h6 class="mb-0">Todos os Usuários</h6>');
        }
        tableUser = groupingTable;
    }


    function dataBR(data) {
        //do americano para portugues
        let datef = new Date(data);
        let dataFormatada = datef.toLocaleDateString('pt-BR', { timeZone: 'UTC' });
        return dataFormatada
    }

    function dataUS(data) {
        //do portugues para o americano
        let dataFormatada = data.split('/').reverse().join('-');
        return dataFormatada
    }

    // Check Validity
    function checkValidity(el) {
        if (el.validate().checkForm()) {
            submitBtn.attr('disabled', false);
        } else {
            submitBtn.attr('disabled', true);
        }
    }
    // Form Validation
    if (newUserForm.length) {
        newUserForm.validate({
            errorClass: 'error',
            rules: {
                'fullname': { required: true },
                'email': { required: true },
                'status': { required: true }
            }
        });

        newUserForm.on('submit', function (e) {
            var isValid = newUserForm.valid();
            e.preventDefault();
            if (isValid) {
                let serealize = newUserForm.serializeArray();
                $.ajax({
                    type: "POST",
                    url: '/usuario/cadastro',
                    data: serealize,
                    success: function (data) {
                        if(data['tipo-geral'] == 'novo'){
                            window.location.href = "/usuario/detalhes/"+data['id-geral'];
                        }
                        if(data['tipo-geral'] == 'editado'){
                            editarlinha(serealize, data);
                            newUserSidebar.modal('hide');
                        }
                    }
                });
            }
        });
    }

    function editarlinha(serealize, data) {
        datauser();
        //mensagem
        toastr['success']('👋 Arquivo alterado.', 'Sucesso!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
        });
    }
    function addnovalinha(serealize, data) {
        console.log(serealize);
        var t = dtUserTable.DataTable();
        var rowNode = t
            .row.add({
                "id": data,
                "email": serealize[5]['value'],
                "name": serealize[2]['value'],
                "perfil": serealize[4]['value'],
                "status": serealize[3]['value'],
                "salario": null,
                "admissao": null,
                "alocacao": null,
                "cargo": null,
                "empresa": null,
                "frente": null,
                "regime": null,
                "setor": null,
                "supervisao": null,
                "tarifa": null,
                "": ""
            }).draw().node();



        // $('.editar_td').each(function(index) { 
        //   if($(this).attr('data-id') == data)
        //   {
        //     $(this).attr('data-tarifa', null);
        //     $(this).attr('data-status', serealize[3]['value']);
        //     $(this).attr('data-admissao', null);
        //     $(this).attr('data-supervisao', null);
        //     $(this).attr('data-setor', null);
        //     $(this).attr('data-alocacao', null);
        //     $(this).attr('data-frente', null);
        //     $(this).attr('data-cargo', null);
        //     $(this).attr('data-regime', null);
        //     $(this).attr('data-empresa', null);    
        //   }
        // });


        $(rowNode).css('opacity', '0');
        $(rowNode).css('background-color', '#71c754');
        $(rowNode).animate({
            opacity: 1,
            left: "0",
            backgroundColor: '#fff'
        }, 1000, "linear");
    }
    $(document).on('click', '.create-new', function () {
        $("#senha").prop('required', true);
        $(".ediadi").text('Adicionar');
        $("#senhalabel").text('Senha');
        $(".btdetalhe").hide();

        $('#id_geral').val('');
        $('#fullname').val('');
        $('#email').val('');
        $('#salario').val('');
        $('#admissao').val('');

        $('#alocacao').val(0);
        $('#alocacao').trigger('change');

        $('#tarifa').val(0);
        $('#tarifa').trigger('change');

        $('#supervisao').val(0);
        $('#supervisao').trigger('change');

        $('#setor').val(0);
        $('#setor').trigger('change');

        $('#frente').val(0);
        $('#frente').trigger('change');

        $('#cargo').val(0);
        $('#cargo').trigger('change');

        $('#regime').val(0);
        $('#regime').trigger('change');

        $('#empresa').val(0);
        $('#empresa').trigger('change');

    });


    $(document).on('click', '#deletar_td', function () {
        var t = dtUserTable.DataTable();
        var row = dtUserTable.DataTable().row($(this).parents('tr')).node();
        var id = $(this).data('id');
        //mensagem de confirmar 
        Swal.fire({
            title: 'Remover o Usuário',
            text: $(this).data('name') + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, pode deletar!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.get('/usuario/delete/' + id, function (retorno) {
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
                        }, 1000, "linear", function () {
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

    $(document).on('click', '.deletar_td_history', function () {
        var t = dtUserHistoryTable.DataTable();
        var row = dtUserHistoryTable.DataTable().row($(this).parents('tr')).node();
        var id = $(this).data('id');
        //mensagem de confirmar 
        Swal.fire({
            title: 'Remover do Histórico',
            text: $(this).data('name') + '?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, pode deletar!',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.get('/historico/delete/' + id, function (retorno) {
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
                        }, 1000, "linear", function () {
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
