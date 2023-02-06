<div class="container">
  <?php

  require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';

  //Parâmetros (Globais)
  $_GET['domain'] = (isset($_GET['domain'])) ? ($domain = $_GET['domain']) : null;
  $_GET['domain_id'] = (isset($_GET['domain_id'])) ? ($domain_id = $_GET['domain_id']) : null;

  //Parâmetros (Filtros)
  $_GET['dtin'] = (isset($_GET['dtin'])) ? ($dtin = $_GET['dtin']) : null; //data_inicial
  $_GET['dtfn'] = (isset($_GET['dtfn'])) ? ($dtfn = $_GET['dtfn']) : null; //data_final

  $date_interval = "";
  if (isset($dtin) && !isset($dt_fn)) {
    if (strlen($dtin) == 0 && strlen($dtfn) == 0) {
      $date_interval = " ";

    } else {
      $date_interval = " AND a.created BETWEEN '$dtin 00:00:00' AND '$dtin 23:59:59' ";
    }
  }
  // include("functions.php"); //funções relacionadas a esse relatório 
  ?>
  <div class="header-content"><?php
                              include("head.php");
                              include("filter.php");
                              ?>
  </div>

  <div class="table-content m-0 p-0"><?php
                                      include("sql.php"); //Datatable      
                                      include("table.php"); //Datatable
                                      include("script.php"); //Datatable 
                                      ?>
  </div>
</div>