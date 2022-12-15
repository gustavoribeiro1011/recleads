<table id="example" class="table table-striped" style="width:100%;">
    <thead>
        <tr>
            <th>Origem</th>
            <th>Destino</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {


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
                        <td><?= $row['origem']; ?></td>
                        <td><?= $row['destino']; ?></td>
                        <td><?= $row['nome']; ?></td>
                        <td><?= $row['telefone']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $created_formatted; ?></td>
                    </tr>

                <?php } else { ?>

                    <tr>
                        <td><?= utf8_encode($row['origem']); ?></td>
                        <td><?= utf8_encode($row['destino']); ?></td>
                        <td><?= utf8_encode($row['nome']); ?></td>
                        <td><?= utf8_encode($row['telefone']); ?></td>
                        <td><?= utf8_encode($row['email']); ?></td>
                        <td><?= $created_formatted; ?></td>
                    </tr>

                <?php } ?>
        <?php }
        } ?>

    </tbody>
</table>