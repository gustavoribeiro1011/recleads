<table id="example" class="table table-striped" style="width:100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $nome_formatted = "";
                $str_nome_limit = 15;
                if (strlen($row['nome']) <= 10) {
                    $nome_formatted = $row['nome'];
                } else {
                    $nome_formatted = substr($row['nome'], 0, $str_nome_limit) . "...";
                }

                $origem_formatted = "";
                $str_origem_limit = 20;
                if (strlen(trim($row['origem'])) <= 10) {
                    $origem_formatted = $row['origem'];
                } else {
                    $origem_formatted = substr(trim($row['origem']), 0, $str_origem_limit) . "...";
                }

                $destino_formatted = "";
                $str_destino_limit = 20;
                if (strlen(trim($row['destino'])) <= 10) {
                    $destino_formatted = $row['destino'];
                } else {
                    $destino_formatted = substr(trim($row['destino']), 0, $str_destino_limit) . "...";
                }



                $data_ida =  str_replace("/", "-", $row["data_ida"]); // dd-mm-aaaa
                $data_volta = str_replace("/", "-", $row["data_volta"]); // dd-mm-aaaa
                $created = strtotime($row['created']);


                $data_volta_formatted = date('d/m/y', strtotime($data_volta)); // dd/mm/aa
                $created_formatted = date("d/m/y H:i", $created); // dd/mm/aa

                if (strtotime($data_ida) == true) {
                    $data_ida_formatted = date('d/m/y', strtotime($data_ida));
                } else {
                    $data_ida_formatted = "";
                }

                if (strtotime($data_volta) == true) {
                    $data_volta_formatted = date('d/m/y', strtotime($data_volta));
                } else {
                    $data_volta_formatted = "";
                }


                if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) { ?>

                    <tr>
                        <td><?= $row['id_form']; ?></td>
                        <td><?= $origem_formatted; ?></td>
                        <td><?= $destino_formatted; ?></td>
                        <td><?= $nome_formatted; ?></td>
                        <td><?= $row['telefone']; ?></td>
                        <td><?= $created_formatted; ?></td>
                        <td>[]</td>
                    </tr>

                <?php } else {


                ?>

                    <tr>
                        <td><?= $row['id_form']; ?></td>
                        <td><?= utf8_encode($origem_formatted); ?></td>
                        <td><?= utf8_encode($destino_formatted); ?></td>
                        <td><?= utf8_encode($nome_formatted); ?></td>
                        <td><?= utf8_encode($row['telefone']); ?></td>
                        <td><?= $created_formatted; ?></td>
                        <td class="inline">

                            <button class="btn btn-sm bt-light" style="display: inline-block;"><i class="bi bi-search"></i></button>
                            <button class="btn btn-sm bt-danger" style="display: inline-block;"><i class="bi bi-trash3"></i></button>

                        </td>
                    </tr>

                <?php } ?>
        <?php }
        } ?>

    </tbody>
</table>