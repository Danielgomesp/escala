<?php

include 'conn.php';
$n = filter_input(INPUT_POST, numero_folgas); //número de loops folgas +1
$intervalo_incremento = filter_input(INPUT_POST, intervalo_incremento); //intervalo de dias entre as folgas
$mes_folga = filter_input(INPUT_POST, mes); //intervalo de dias entre as folgas

$qr_id = "select id, Grupo_id as grupo from Auditor where tipo_id = 1;"; //Seleicona somente auditores (sem menor aprendiz)
$select_id = mysqli_query($connect, $qr_id) or die(msql_error());
while ($exibe = mysqli_fetch_assoc($select_id)) { //cada loop com um id de auditor diferente
    $id = $exibe[id]; //id do auditor
    $grupo = $exibe[grupo]; // grupo de folga do auditor
    $intervalo = 0; // Valor inicial deve ser sempre 0

    for ($i = 0; $i <= $n; $i++) { //Adiciona n folgas
        $query_insert = "insert into Folga (folga, Auditor_id) values ((date_add('".date('Y')."-$mes_folga-$grupo', interval $intervalo day)),$id);";
        $insert = mysqli_query($connect, $query_insert);
        if ($insert) {
            echo"<script language='javascript' type='text/javascript'>alert('Cadastro registrado com sucesso!');window.location.href='folga_automatico.php'</script>";
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='folga_automatico.php'</script>";
        }
        $intervalo = ($intervalo +$intervalo_incremento);
    } //for
}



  