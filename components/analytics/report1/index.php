<div class="container">
  <?php

  $_GET['domain'] = (isset($_GET['domain'])) ? ($domain = $_GET['domain']) : null;
  $_GET['domain_id'] = (isset($_GET['domain_id'])) ? ($domain_id = $_GET['domain_id']) : null;

  include("sql.php");
  include("head.php");
  include("filter.php");
  include("table.php");
  include("script.php");

  ?>
</div>