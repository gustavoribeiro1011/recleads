<?php

include('sql.php');

if ($result = mysqli_query($conn, $sql)) { ?>

  
        <!--Datatable-->
        <table id="dt" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Domínio</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch one and one row
                while ($row = mysqli_fetch_assoc($result)) {

                    $domain_id = $row['id'];
                    $domain = $row['domain'];
                    $primeiros_digitos_do_dominio = substr($domain, 0, 2);

                    //Desconsiderar a exibição de domínios que começar com 2. ou 3. ou 4.
                    if (
                        !($primeiros_digitos_do_dominio == "2." ||
                            $primeiros_digitos_do_dominio == "3." ||
                            $primeiros_digitos_do_dominio == "4.")
                    ) {


                        if ($row["status"] == "ativo") {
                            $domain_formatted = "<p class='text-success'>" . $domain . "</p>";
                            $status = "<p class='text-success'>ativo</p>";
                        } else {
                            $domain_formatted = "<p class='text-danger'>" . $domain . "</p>";
                            $status = "<p class='text-danger'>desativado</p>";
                        }
                ?>
                        <tr>
                            <td><?= $domain_formatted ?></td>
                            <td><?= $status; ?></td>
                        </tr>
                <?php  }
                }; ?>

            </tbody>
        </table>
        <!--</Datatable>-->

<?php } ?>