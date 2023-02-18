<div class="">
  <?php

  require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/recleads/api/ifMobileOrDesktop.php';

  //Parâmetros (Globais)
  $_GET['domain'] = (isset($_GET['domain'])) ? ($domain = $_GET['domain']) : null;
  $_GET['domain_id'] = (isset($_GET['domain_id'])) ? ($domain_id = $_GET['domain_id']) : null;

  //Parâmetros (Filtros)
  $date_interval = "";
  $_GET['dtin'] = (isset($_GET['dtin'])) ? ($dtin = $_GET['dtin']) : $dtin = ""; //data_inicial
  $_GET['dtfn'] = (isset($_GET['dtfn'])) ? ($dtfn = $_GET['dtfn']) : $dtfn = ""; //data_final

  //quando nao tem nenhuma data definida
  if (strlen($dtin) == 0 && strlen($dtfn) == 0) {
    $date_interval = " ";
  }
  //quando só tem a data inicial
  if (strlen($dtin) > 0 && strlen($dtfn) == 0) {
    $date_interval = " AND a.created BETWEEN '$dtin 00:00:00' AND '$dtin 23:59:59' ";
  }
  //quano tem as duas datas
  if (strlen($dtin) > 0 && strlen($dtfn) > 0) {
    $date_interval = " AND a.created BETWEEN '$dtin 00:00:00' AND '$dtfn 23:59:59' ";
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