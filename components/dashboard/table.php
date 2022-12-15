<div class="container">

    <div class="col-12">
        <div class="row">

            <?php if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $domain_id = $row['id'];
                    $domain = $row['domain'];

                    $sql_count = "SELECT count(id) total FROM forms WHERE $date_today AND link='$domain'";
                    $result_count = mysqli_query($conn, $sql_count);
                    $total_registers_today = 0;
                    if (mysqli_num_rows($result_count) > 0) {
                        while ($row_count = mysqli_fetch_assoc($result_count)) {
                            $total_registers_today_ = $row_count['total'];

                            if ($total_registers_today_ == '0') {
                                $total_registers_today = '<span class="badge rounded-pill" style="background:silver;">0</span>';
                            } else {
                                $total_registers_today = '<span class="badge rounded-pill bg-success">'.$total_registers_today_.'</span>';

                            }
                        }
                    }
            ?>

                    <div class="card mb-2">
                        <div class="card-body">
                            <a href="#" onClick="openPage('analytics/report1','<?= $domain_id; ?>','<?= $domain; ?>')">
                                <h5 class="card-title"><?= $row['domain']; ?></h5>
                            </a>
                            Registros
                            Hoje: <?= $total_registers_today; ?>

                        </div>
                    </div>



            <?php }
            }
            ?>
        </div>

    </div>
</div>
</div>