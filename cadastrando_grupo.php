<?php
include 'conn.php';

$descricao = filter_input(INPUT_POST, descricao);
$data = filter_input(INPUT_POST, data); // recebe 01, 02, 03... 06.


//Inserir no Banco MySQL
$query ="insert into Grupo (descricao, data) values ('$descricao', '$data');";
$insert = mysqli_query($connect, $query);

if ($insert) {
    echo"<script language='javascript' type='text/javascript'>window.location.href='cadastrar_grupo.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='cadastrar_grupo.php'</script>";
}
  