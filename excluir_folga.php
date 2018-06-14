<?php
include 'conn.php';
$auditor = $_GET['auditor'];
$folga = $_GET['folga'];

//Inserir no Banco MySQL
$query ="DELETE FROM `Escala_Auditoria`.`Folga` WHERE `Auditor_id`='$auditor'  and folga = '$folga';";
$delete = mysqli_query($connect, $query);

if ($delete) {
    echo"<script language='javascript' type='text/javascript'>window.location.href='folga.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível deletar');window.location.href='folga.php'</script>";
}
  