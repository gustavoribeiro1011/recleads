<?php
if (mysqli_num_rows($resultCounter) > 0) {
    while ($rowCounter = mysqli_fetch_assoc($resultCounter)) { ?>
        <button type="button" class="btn btn-primary btn-sm position-relative">
            Leads Hoje
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?=$rowCounter['total'];?>
                <span class="visually-hidden">counter leads</span>
            </span>
        </button>
<?php }
}

?>