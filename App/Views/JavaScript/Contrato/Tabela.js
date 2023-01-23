$(document).ready(async () => {
    await $('#contratosTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
        },
        dom: '<"d-flex justify-content-between align-items-center"fB>rt<"d-flex justify-content-between align-items-center"ilp>',
        buttons: [
            {
                extend:    'excel',
                text:      '<i class="bi bi-file-earmark-spreadsheet-fill"></i>  Excel',
                titleAttr: 'Excel',
                className: 'btn btn-excel'
            },
            {
                extend:    'pdf',
                text:      '<i class="bi bi-filetype-pdf"></i> PDF',
                titleAttr: 'Pdf',
                className: 'btn btn-pdf'
            }
        ]
    });
})