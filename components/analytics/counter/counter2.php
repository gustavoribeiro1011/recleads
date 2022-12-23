<?php
if (mysqli_num_rows($resultCounter) > 0) {
    while ($rowCounter = mysqli_fetch_assoc($resultCounter)) { ?>

Total de Leads Hoje <span class="badge rounded-pill bg-success"><?=$rowCounter['total'];?></span>
  
<?php }
}

?>