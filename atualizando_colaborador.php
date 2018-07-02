<?php
include 'conn.php';

$id = filter_input(INPUT_POST, id);
$nome = filter_input(INPUT_POST, nome);
$email = filter_input(INPUT_POST, email);
$telefone = filter_input(INPUT_POST, telefone);
$grupo = filter_input(INPUT_POST, grupo);
$ativo = filter_input(INPUT_POST, ativo);

if($ativo == 1){
    $query = "UPDATE Auditor SET descricao='$nome', email='$email', telefone='$telefone', ativo='1' WHERE id='$id';";
}else{
    $query = "UPDATE Auditor SET descricao='$nome', email='$email', telefone='$telefone', ativo='0' WHERE id='$id';";
}



$insert = mysqli_query($connect, $query);

if ($insert) {
    echo"<script language='javascript' type='text/javascript'>alert('Atualizado!');window.location.href='colaborador.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar o cadastro');window.location.href='colaborador.php'</script>";
}
  