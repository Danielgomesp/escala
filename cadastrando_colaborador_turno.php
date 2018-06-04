<?php

include 'conn.php';

$id = $_POST['id_auditor'];


if ($_POST['turno']) {
    foreach ($_POST['turno'] as $turno) {
        $query = "insert into Turno (disponivel, Auditor_id) values ($turno,$id);";
        $insert = mysqli_query($connect, $query);
        if ($insert) {
            echo"<script language='javascript' type='text/javascript'>alert('Sucesso!');window.location.href='cadastrar_colaborador.php'</script>";
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível realizar o cadastro');window.location.href='cadastrar_colaborador_turno.php'</script>";
        }
    }
} else {
    echo "Isset não funcionou!";
}
    







