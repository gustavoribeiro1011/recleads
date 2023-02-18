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

            <form class="form-inline col-12 col-xl-2 col-xxl-1">
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

     

          if ( isDate($("#dt_in").val($.urlParam('dtin')).val()) ) {
              console.log("date is valid: " + $.urlParam('dtin'));
            }


            $("#dt_fn").val($.urlParam('dtfn'));


          });
  </script>