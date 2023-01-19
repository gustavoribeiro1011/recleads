<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/recleads/config.php';

//Criar a conexão com o BD
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Faz a consulta SQL
$level = $_SESSION['level_' . $app_token];
$user_id = $_SESSION['userid_' . $app_token];

if ($level == "admin") {
    //lista geral
    $sql = "SELECT * FROM domains ORDER BY 3,1 DESC";
} else {
    $sql = "SELECT * FROM domains WHERE user = $user_id  ORDER BY 3,1 DESC";
}

//Definir range data atual (hoje)
$date_start = date("Y-m-d 00:00:00");
$date_end =  date("Y-m-d 23:59:59");
$date_today = "created BETWEEN '$date_start' AND '$date_end'";

$res = mysqli_query($conn, $sql);


if (mysqli_num_rows($res) > 0) {


    $rows = array();
    while ($row = mysqli_fetch_assoc($res)) { {



            $domain_id = $row['id'];
            $domain = $row['domain'];
            $primeiros_digitos_do_dominio = substr($domain, 0, 2);

            //Desconsiderar a exibição de domínios que começar com 2. ou 3. ou 4.
            if (
                !($primeiros_digitos_do_dominio == "2." ||
                    $primeiros_digitos_do_dominio == "3." ||
                    $primeiros_digitos_do_dominio == "4.")
            ) {

                $sql_count = "SELECT count(id) total FROM forms WHERE $date_today AND link LIKE '%$domain%'";
                $result_count = mysqli_query($conn, $sql_count);
                $total_registers_today = 0;
                if (mysqli_num_rows($result_count) > 0) {
                    while ($row_count = mysqli_fetch_assoc($result_count)) {
                        $total_registers_today_ = $row_count['total'];

                        if ($total_registers_today_ == '0') {
                            $total_registers_today = 'Leads Hoje <span class="badge rounded-pill" style="background:silver;">0</span>';
                        } else {
                            $total_registers_today = 'Leads Hoje <a href="https://wa.me/" target="_blank">';
                            $total_registers_today .= '<span class="badge rounded-pill bg-success">';
                            $total_registers_today .= $total_registers_today_ . '</a></span>';
                        }
                    }
                }


                $rows[] = array(
                    $row['id'], //1
                    $row['domain'], //2
                    $total_registers_today //3
                );
            }
        }

        $data = array("data" => $rows);
    }
}
echo json_encode($data);
