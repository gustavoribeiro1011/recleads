  <p class="m-0 p-0 mt-2 mb-1">
    <button class="btn btn-light dropdown-toggle border no-focus" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseExample">
      <i class="bi bi-funnel-fill"></i> Filtros
    </button>
  </p>
  <div class="collapse" id="collapseFilter">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body float-left w-100">

            <form class="form-inline col-12 col-xl-4">
              <div class="form-group mb-2">
                <label class="form-check-label"><b>Data Inicial: </b></label>
                <input type="date" class="form-control" max="9999-12-31" id="dt_in">
              </div>

              <div class="form-group">
                <label class="form-check-label"><b>Data Final: </b></label>
                <input type="date" class="form-control" max="9999-12-31" id="dt_fn">
              </div>

            </form>


          </div>
          <div class="card-footer float-left w-100 bg-white">

            <form class="form-inline">
              <div class="form-group col-12">
                <button class="btn btn-light bg-white ml-2 border" type="button" onClick="clearFilter()">Limpar filtros</button>
                <button class="btn btn-success" type="button" onClick="applyFilter()">Aplicar filtros</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>




  </div>
  <script>
    $(document).ready(function() {

      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today =  yyyy + "-" + mm + "-" + dd;

      if ($("#dt_in").val($.urlParam('dtin')).length > 0 && $("#dt_in").val($.urlParam('dtin')) !== "null") {
        $("#dt_in").val($.urlParam('dtin'));
        console.log("DTIN:" + $.urlParam('dtin'));  
      } else {
        $("#dt_in").val(today);
      }


        $("#dt_fn").val($.urlParam('dtfn'));        
      

    });
  </script>