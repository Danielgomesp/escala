<?php

include 'conn.php';


$query = "truncate table Folga;";
$truncate = mysqli_query($connect, $query);
if ($truncate) {
echo"<script language='javascript' type='text/javascript'>alert('Todas as Folgas foram deletadas!');window.location.href='folga_automatico.php'</script>";
} else {
echo"<script language='javascript' type='text/javascript'>alert('Erro');window.location.href='folga_automatico.php'</script>";
}
$intervalo = ($intervalo +4);





  