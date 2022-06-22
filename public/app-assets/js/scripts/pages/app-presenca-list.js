/*=========================================================================================
    File Name: app-cardapio.js
    Description: criação edição dos usuários
    --------------------------------------------------------------------------------------
    autor:Bico Pitter R. 
    contato: pitter775@gmail.com / 11-9 4950 6267
==========================================================================================*/
$(function() {
    'use strict';
    var password = true;
    var row_edit = '';
    var dtseriesTable = $('.serie-list-table'); //id da tabela q esta na div  
    var dtclasseTable = $('.classe-list-table');

    var isRtl = $('html').attr('data-textdirection') === 'rtl';
    var tableSeries = false;
    var tableClasse = false;





    var data = new Date();
    var dataFormatada = data.toLocaleDateString('pt-BR', { timeZone: 'UTC' });
    $('#dt_final').val(dataFormatada);
    $('#dt_final').trigger('change');

    var dt_inicial = $('#dt_inicial').val();
    var dt_final = $('#dt_final').val();
    totais(dt_inicial, dt_final);
    series(dt_inicial, dt_final);

    // listSeriesTab();


    function listSeriesTab(datajson) {
        //datajson = JSON.stringify(datajson);

        if (tableSeries) {
            tableSeries.destroy();
        }
        // Datatable
        if (dtseriesTable.length) {

            var groupingTable = dtseriesTable.DataTable({
                //busca uma rota 
                // ajax: assetPath + 'data/cardapio-list.json', // JSON file to add data
                retrieve: true,

                data: datajson,
                columns: [
                    // columns according to JSON
                    { data: 'id' },
                    { data: 'serie' },
                    { data: 'idserie' },
                    { data: 'professora' },
                    { data: 'falta' },
                    { data: 'presente' },
                    { data: 'total' },
                    { data: '' }
                ],
                columnDefs: [{
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [2],
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
                        targets: 7,
                        title: 'Ação',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            // console.log(full);
                            var id = full['id'];
                            var idserie = full['idserie'];

                            return (
                                '<a href="javascript:;" class="item-edit delete-record" id="open_serie" data-idserie="' + idserie + '"  data-id="' + id + '" style="color: #154778 !important">' +
                                feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
                                '</a>'
                            );
                        }
                    }
                ],
                order: [
                    [2, 'desc']
                ],
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100],
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
                    className: 'btn btn-outline-secondary dropdown-toggle  waves-effect',
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
                }],

                language: {
                    "url": "/app-assets/pt_br.json",
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
            });
            $('div.head-label').html('<h6 class="mb-0">Listando todas as cardapios</h6>');
        }
        tableSeries = groupingTable;
    }

    function listClasseTab(datajson) {
        //datajson = JSON.stringify(datajson);

        if (tableClasse) {
            tableClasse.destroy();
        }
        // Datatable
        if (dtclasseTable.length) {

            var groupingTable = dtclasseTable.DataTable({
                //busca uma rota 
                // ajax: assetPath + 'data/cardapio-list.json', // JSON file to add data
                retrieve: true,

                data: datajson,
                columns: [
                    // columns according to JSON
                    { data: 'id' },
                    { data: 'serie' },
                    { data: 'aluno' },
                    { data: 'falta' },
                    { data: 'presente' }
                ],
                columnDefs: [{
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }, {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                }],
                order: [
                    [3, 'desc']
                ],
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100],
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
                    className: 'btn btn-outline-secondary dropdown-toggle  waves-effect',
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
                }],

                language: {
                    "url": "/app-assets/pt_br.json",
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
            });
            $('div.head-label').html('<h6 class="mb-0">Listando todas as cardapios</h6>');
        }
        tableClasse = groupingTable;
    }


    function editarlinha(serealize, data) {
        $(row_edit).addClass('alteraressatr');
        //  var rowData = dtserieTable.DataTable().row($('.alteraressatr')).data();  //mostra todos os dados dessa tr;
        console.log('editar linha');
        console.log(serealize);
        dtserieTable.DataTable().row($('.alteraressatr')).data({
            "id": serealize[1]['value'],
            "ser_escolas_id": serealize[2]['value'],
            "ser_apelido": serealize[3]['value'],
            "ser_apelido": serealize[4]['value'],
            "ser_periodo": serealize[5]['value'],
            "": ""
        }).draw();

        $(row_edit).css('background-color', '#749efe');
        $(row_edit).css('color', '#fff');
        $(row_edit).animate({
            color: "#555",
            backgroundColor: 'transparent'
        }, 1000, "linear");
        $(row_edit).removeClass('alteraressatr');
        //mensagem
        toastr['success']('👋 Arquivo alterado.', 'Sucesso!', {
            closeButton: true,
            tapToDismiss: false,
            rtl: isRtl
        });
    }

    function addnovalinha(serealize, data) {
        console.log('addlinha');
        listTabSeries();
    }




    $(document).on('change', '#dt_final', function() {
        dt_inicial = $('#dt_inicial').val();
        dt_final = $('#dt_final').val();
        totais(dt_inicial, dt_final);
        series(dt_inicial, dt_final);
    });
    $(document).on('change', '#dt_inicial', function() {
        dt_inicial = $('#dt_inicial').val();
        dt_final = $('#dt_final').val();
        totais(dt_inicial, dt_final);
        series(dt_inicial, dt_final);
    });


    $(document).on('click', '#open_serie', function() {
        let idseries = $(this).data('idserie');
        console.log(idseries);
        $.ajax({
            type: "GET",
            url: '/presenca/seriesid',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'dt_final': dt_final,
                'dt_inicial': dt_inicial,
                'idserie': idseries
            },
            success: function(data) {
                console.log('listando...');
                console.log(data);
                listClasseTab(data);

            }
        });
    });
    $(document).on('click', '#editar_td', function() {
        $("#senha").prop('required', false);
        $(".ediadi").text('Editar');
        $("#senhalabel").text('Nova Senha');

        $('#id_geral').val($(this).data('id'));
        $('#ser_escolas_id').val($(this).data('ser_escolas_id'));
        $('#ser_apelido').val($(this).data('ser_apelido'));
        $('#ser_periodo').val($(this).data('ser_periodo'));
        $('#ser_apelido').val($(this).data('ser_apelido'));
        row_edit = dtserieTable.DataTable().row($(this).parents('tr')).node();
    });


    function totais(dt_inicial, dt_final) {
        $.ajax({
            type: "POST",
            url: '/presenca/totais',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'dt_final': dt_final,
                'dt_inicial': dt_inicial
            },
            success: function(data) {
                console.log(data.alunos);

                $('#totalpresentes').html(data.presentes[0]['total']);
                $('#totalfaltas').html(data.faltas[0]['total']);
                $('#totalOcorrencias').html(data.total[0]['total']);
                $('#totalAlunos').html(data.alunos);

            }
        });
    }

    function series(dt_inicial, dt_final) {
        $.ajax({
            type: "GET",
            url: '/presenca/series',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'dt_final': dt_final,
                'dt_inicial': dt_inicial
            },
            success: function(data) {
                console.log('listando...');
                console.log(data);
                listSeriesTab(data);

            }
        });
    }

    function contaChamada() {
        let presenca = 0;
        let falta = 0;

        $(".cardcardapio ").each(function() {
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