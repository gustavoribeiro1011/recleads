 <script>
   $(document).ready(function() {
     var table = $('#example').DataTable({      
       retrieve: true,
       paging: true,

       language: {
         url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json',
         searchPlaceholder: "Buscar por domínio",
         search: "",
       },

       ajax: '<?= BASEURL; ?>components/dashboard/ajax.php',
       columns: [{
         render: function(data, type, row, meta) {
           var html =
             '<div class="card shadow mb-2"><span style="display:none;">' + row[0] + '</span>' +
             '  <div class="row">' +
             '  <div class="col-md-4 col-7 col-xl-8 p-0">' +
             '   <div class="card-body mt-2">' +
             '     <h5 class="card-title" style="font-size:1rem; ">' +
             '     <a href="https://' + row[1] + '" class="btn-no-border" target="_blank" >' +
             row[1] + ' <i class="bi bi-arrow-up-right-square"></i></a>' +
             '    </h5>' +
             '     <p class="card-text">' + row[2] + '</p>' +
             '     <p class="card-text">' +
             '     <a href="javascript:void(0)" class="btn btn-success btn-sm" type="button"' +
             '     onClick="openPage(`analytics/report1/index.php?domain=' + row[1] + '`)">Ver leads</a>' +
             '     </p>' +
             '   </div>' +
             '  </div>' +
             ' </div>' +
             '</div>';
           return html;
         }
       }],
       rowGroup: {
         dataSrc: 0
       }
     });

   });
 </script>