<?php
include 'conn.php';

$data = filter_input(INPUT_POST, data);
$turno = filter_input(INPUT_POST, turno);
$numero = filter_input(INPUT_POST, numero);

//Inserir no Banco MySQL
$query ="insert into Agenda (turno, data) values ($turno, '$data');";


$insert = mysqli_query($connect, $query);

if ($insert) {
    echo"<script language='javascript' type='text/javascript'>window.location.href='cadastrar_agendamento_auditor.php?id_agenda=$numero'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Erro');window.location.href='cadastrar_agendamento_data.php'</script>";
}
  