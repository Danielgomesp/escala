<?php
include 'conn.php';

$id = $_POST['id_auditor'];


if ($_POST['dia']){
    foreach ($_POST['dia'] as $dia){
    $query = "insert into Dia_Semana_Disponivel (dia, Auditor_id)
    values ($dia,$id);";   //dia da semana, id do auditor
    $insert = mysqli_query($connect, $query);
    if ($insert) {
    echo"<script language='javascript' type='text/javascript'>window.location.href='cadastrar_colaborador_turno.php'</script>";
    } else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='cadastrar_colaborador.php'</script>";
    }
    }
    }else{
    echo "Isset não funcionou!";
    }
    







