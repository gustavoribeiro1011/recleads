<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            retrieve: true,
            stateSave: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'
            },
            columnDefs: [{
                    target: 0,
                    visible: false,
                    searchable: false,
                },
                {
                    target: 1,
                    visible: true,
                },
                {
                    target: 2,
                    visible: true,
                },
                {
                    target: 3,
                    visible: true,
                },          
                {
                    target: 4,
                    visible: true,
                },
                {
                    target: 5,
                    visible: true,
                },
            ],
            "order": [
                [0, 'desc']
            ]
        });
    });
</script>