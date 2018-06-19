<?php

include 'conn.php';
$n = filter_input(INPUT_POST, numero_folgas); //número de loops folgas +1
$intervalo_incremento = filter_input(INPUT_POST, intervalo_incremento); //intervalo de dias entre as folgas
$mes_folga = filter_input(INPUT_POST, mes); //intervalo de dias entre as folgas

$qr_id = "select id, Grupo_id as grupo from Auditor where tipo_id = 1 and ativo = 1;"; //Seleicona somente auditores (sem menor aprendiz)
$select_id = mysqli_query($connect, $qr_id) or die(msql_error());
while ($exibe = mysqli_fetch_assoc($select_id)) { //cada loop com um id de auditor diferente
    $id = $exibe[id]; //id do auditor
    $grupo = $exibe[grupo]; // grupo de folga do auditor
    $intervalo = 0; // Valor inicial deve ser sempre 0

    for ($i = 0; $i <= $n; $i++) { //Adiciona n folgas
        $date = date_create("2018-$mes_folga-$grupo");
        date_add($date, date_interval_create_from_date_string("$intervalo days"));
        
        $condicao = date_format($date, 'w'); // recebe dia da semana (0 dom, 1 seg... 6 sab)
        
        if ($condicao != 6){ //verifica dia da semana
        $data = date_format($date, "Y-m-d");
        $query_insert = "insert into Folga (folga, Auditor_id) values ('$data',$id);";
        $insert = mysqli_query($connect, $query_insert);
        if ($insert) {
            echo"<script language='javascript' type='text/javascript'>alert('Cadastro registrado com sucesso!');window.location.href='folga_automatico.php'</script>";
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='folga_automatico.php'</script>";
        }
        $intervalo = ($intervalo + $intervalo_incremento);
        }
        
//        elseif($condicao == 0){ // se for domingo, joga pra segunda
//        date_add($date, date_interval_create_from_date_string("1 days"));
//        $data = date_format($date, "Y-m-d");
//        $query_insert = "insert into Folga (folga, Auditor_id) values ('$data',$id);";
//        $insert = mysqli_query($connect, $query_insert);
//        if ($insert) {
//            echo"<script language='javascript' type='text/javascript'>alert('Cadastro registrado com sucesso!');window.location.href='folga_automatico.php'</script>";
//        } else {
//            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='folga_automatico.php'</script>";
//        }
//        $intervalo = ($intervalo + $intervalo_incremento);
//        }
        
        elseif($condicao == 6){ // se for sabado, joga pra sexta
        date_sub($date, date_interval_create_from_date_string("1 days"));
        $data = date_format($date, "Y-m-d");
        $query_insert = "insert into Folga (folga, Auditor_id) values ('$data',$id);";
        $insert = mysqli_query($connect, $query_insert);
        if ($insert) {
            echo"<script language='javascript' type='text/javascript'>alert('Cadastro registrado com sucesso!');window.location.href='folga_automatico.php'</script>";
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='folga_automatico.php'</script>";
        }
        $intervalo = ($intervalo + $intervalo_incremento);
        }
        
        
        
        
    } //for
}



  