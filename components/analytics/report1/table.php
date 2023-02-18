<div class="bg-light m-0 mt-2 p-2" style="border: 1px solid #DFDFDF;">
    <table id="example" class="table table-striped " style="width:100%;">
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


                    if ($dispositivo == "desktop") {
                        $nome_formatted = $row['nome'];
                    } else { //mobile
                        $nome_formatted = "";
                        $str_nome_limit = 20;
                        if (strlen($row['nome']) <= 10) {
                            $nome_formatted = $row['nome'];
                        } else {
                            $nome_formatted = substr($row['nome'], 0, $str_nome_limit) . "...";
                        }
                    }

                    $telefone_formatted = $row['telefone'];



                    //Formatar telefone para abrir API do Whatsapp
                    $telefone = str_replace("(", "", $telefone_formatted);
                    $telefone = str_replace(")", "", $telefone);
                    $telefone = str_replace("-", "", $telefone);
                    $telefone = str_replace(" ", "", $telefone);
                    $telefone = str_replace("(", "", $telefone);

                    $str = "+";
                    $pos = strpos($str, '1');

                    if ($pos >= 0) {
                        $telefone = substr($telefone, 1, 20);  //ignorar o primeiro dígito "+" Ex. +554399....
                    } else {
                        $telefone = "55" . $telefone;
                    }




                    // $origem_formatted = "";
                    // $str_origem_limit = 20;
                    // if (strlen(trim($row['origem'])) <= 10) {
                    //     $origem_formatted = $row['origem'];
                    // } else {
                    //     $origem_formatted = substr(trim($row['origem']), 0, $str_origem_limit) . "...";
                    // }

                    // $destino_formatted = "";
                    // $str_destino_limit = 20;
                    // if (strlen(trim($row['destino'])) <= 10) {
                    //     $destino_formatted = $row['destino'];
                    // } else {
                    //     $destino_formatted = substr(trim($row['destino']), 0, $str_destino_limit) . "...";
                    // }


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


                    if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) { //servidor hostinger
            ?>

                        <tr>
                            <td><?= $row['id_form']; ?></td>
                            <td><?= $row['origem']; ?></td>
                            <td><?= $row['destino']; ?></td>
                            <td><?= $nome_formatted; ?></td>
                            <td><?= $telefone_formatted; ?></td>
                            <td><?= $created_formatted; ?></td>
                            <td>
                                <?php include('button-action.php'); ?>
                            </td>
                        </tr>

                    <?php } else { //localhost

                    ?>

                        <tr>
                            <td><?= $row['id_form']; ?></td>
                            <td><?= utf8_encode($row['origem']); ?></td>
                            <td><?= utf8_encode($row['destino']); ?></td>
                            <td><?= utf8_encode($nome_formatted); ?></td>
                            <td><?= utf8_encode($telefone_formatted); ?></td>
                            <td><?= $created_formatted; ?></td>
                            <td>
                                <?php include('button-action.php'); ?>
                            </td>
                        </tr>

                    <?php } ?>
            <?php }
            } ?>

        </tbody>
    </table>
</div>