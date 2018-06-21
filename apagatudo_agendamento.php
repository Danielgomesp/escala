<?php

include 'conn.php';


$query = "truncate table Agenda_Auditor;";
$truncate = mysqli_query($connect, $query);
if ($truncate) {
echo"<script language='javascript' type='text/javascript'>alert('Todas as agendas foram deletadas!');window.location.href='cadastrar_agendamento_data_automatico.php'</script>";
} else {
echo"<script language='javascript' type='text/javascript'>alert('Erro');window.location.href='cadastrar_agendamento_data_automatico.php'</script>";
}
$intervalo = ($intervalo +4);





  