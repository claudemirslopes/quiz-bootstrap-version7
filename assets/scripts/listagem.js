$(document).ready(function() {
    $('#quizTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
        },
        dom: 'Bfrtip',
        order: [[2, 'desc']], // Agora a coluna Data é a 3ª (índice 2)
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
