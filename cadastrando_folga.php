<?php
include 'conn.php';

$id_auditor = filter_input(INPUT_POST, id_auditor);
$data = filter_input(INPUT_POST, data);

//Inserir no Banco MySQL
$query ="insert into Folga (folga, Auditor_id) values ('$data', $id_auditor);";


$insert = mysqli_query($connect, $query);

if ($insert) {
    echo"<script language='javascript' type='text/javascript'>alert('Cadastro registrado com sucesso!');window.location.href='cadastrar_folga.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Erro');window.location.href='cadastrar_folga.php'</script>";
}
  