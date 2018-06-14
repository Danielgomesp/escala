<?php
include 'conn.php';

$nome = filter_input(INPUT_POST, nome);
$email = filter_input(INPUT_POST, email);
$telefone = filter_input(INPUT_POST, telefone);
$tipo = filter_input(INPUT_POST, tipo);
$grupo = filter_input(INPUT_POST, grupo);
$data_nascimento = filter_input(INPUT_POST, data_nascimento);
$ativo = 1; //Usuário é cadastrado ativo.


//$nome = $_POST['nome'];

//Inserir no Banco MySQL
$query = "insert into Auditor (descricao, tipo_id, email, telefone, data_nascimento, ativo, Grupo_id) values ('$nome', $tipo, '$email', '$telefone', '$data_nascimento', $ativo, $grupo);";


$insert = mysqli_query($connect, $query);

if ($insert) {
    echo"<script language='javascript' type='text/javascript'>alert('Cadastro registrado com sucesso!');window.location.href='cadastrar_colaborador_variaveis.php'</script>";
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='cadastrar_colaborador.php'</script>";
}
  