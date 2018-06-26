<?php
include 'conn.php';
$agenda = $_GET['agenda'];
$auditor = $_GET['auditor'];

//Inserir no Banco MySQL
$query ="DELETE FROM `Agenda_Auditor` WHERE `Agenda_id`='$agenda' and`Auditor_id`='$auditor';";
$delete = mysqli_query($connect, $query);

if ($delete) {
    echo"<script language='javascript' type='text/javascript'>window.location.href='cadastrar_agendamento_data.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível deletar o cadastro');window.location.href='cadastrar_agendamento_data.php'</script>";
}
  