<?php

include 'conn.php';

//Último relatório cadastrado
$query_select = "select max(id) as id from Agenda;";
$select =mysqli_query($connect, $query_select) or die (msql_error());
$id = mysqli_fetch_assoc($select);



//Limpar a variável para não pegar resultados antigos
$value = null;

//Todos os postos do FORM e seus respectivos valores recolhidos com Foreach
$arr_1 = $_POST;
foreach ($arr_1 as $key => $value) {
    $query = "insert into Agenda_Auditor (Agenda_id, Auditor_id)
    values ($id[id], $value);";


    $insert = mysqli_query($connect, $query);

    if ($insert) {
        echo"<script language='javascript' type='text/javascript'>alert('Sucesso!');window.location.href='cadastrar_agendamento_data.php'</script>";
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Erro id: $id[id]');window.location.href='cadastrar_agendamento_data.php'</script>";
    }
    $value = null;
}