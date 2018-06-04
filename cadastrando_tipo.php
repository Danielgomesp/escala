<?php
include 'conn.php';

$descricao = filter_input(INPUT_POST, descricao);


//Inserir no Banco MySQL
$query ="insert into Tipo (descricao) values ('$descricao');";


$insert = mysqli_query($connect, $query);

if ($insert) {
    echo"<script language='javascript' type='text/javascript'>alert('Cadastro registrado com sucesso!');window.location.href='cadastrar_tipo.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='cadastrar_tipo.php'</script>";
}
  