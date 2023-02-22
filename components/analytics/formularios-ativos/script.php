<script>
    $(document).ready(function() {
        $('#dt').DataTable({

            dom: 'Bfrtip',
            language: {
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json',
                searchPlaceholder: "Buscar por domínio",
                search: "",
            },
            buttons: [{
                extend: 'excelHtml5',
                autoFilter: true,
                filename: 'Dominios',
                sheetName: 'Dominios',
                title: '',
                exportOptions: {
                    orthogonal: 'export',
                }
            }, ]
        });
    });
</script>