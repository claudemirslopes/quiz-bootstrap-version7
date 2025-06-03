$(document).ready(function() {
    $('#quizTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
        },
        dom: 'Bfrtip',
        order: [[0, 'desc']], // Ordena pela coluna ID (mesmo oculta)
        columnDefs: [
            { targets: 0, visible: false, searchable: false } // Garante que a coluna ID está oculta mas disponível para ordenação
        ],
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-copy"></i> Copiar',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel"></i> Excel',
                className: 'btn btn-success btn-sm',
                exportOptions: { columns: ':visible:not(:last-child)' },
                title: 'Registros do Quiz de Dons Espirituais'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf"></i> PDF',
                className: 'btn btn-danger btn-sm',
                exportOptions: { columns: ':visible:not(:last-child)' },
                orientation: 'landscape',
                pageSize: 'A4',
                title: 'Registros do Quiz de Dons Espirituais'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> Imprimir',
                className: 'btn btn-warning btn-sm',
                exportOptions: { columns: ':visible:not(:last-child)' },
                title: 'Registros do Quiz de Dons Espirituais'
            }
        ]
    });
});
