<?php

include 'conn.php';

$mes = filter_input(INPUT_POST, mes); //recebe mes para cadastrar agenda
$limit = filter_input(INPUT_POST, limit); //recebe valor que vai no limit do sql  (quantas lojas serão auditadas)

$qr_qtd_dias = "select  day(last_day('" . date('Y') . "-$mes-01')) as dias;";
$select_qtd_dias = mysqli_query($connect, $qr_qtd_dias) or die(msql_error());
$exibe_qtd_dias = mysqli_fetch_assoc($select_qtd_dias);
$qtd_dias = $exibe_qtd_dias['dias']; //Quantidade de dias no mês

for ($dia = 1; $dia <= $qtd_dias + 1; $dia++) {  //loop para cada dia do mês
    for ($turno = 1; $turno <= 3; $turno++) {  //loop para cada turno
        $query_agenda = "insert into Agenda (turno, data) values ($turno, '" . date('Y') . "-$mes-$dia');";  
        mysqli_query($connect, $query_agenda); //insere as datas na tabela Agenda

        $qr_maxid = "select max(id) as id_agenda from Agenda;"; //seleciona última agenda recem criada
        $select_maxid = mysqli_query($connect, $qr_maxid) or die(msql_error());
        $exibe_maxid = mysqli_fetch_assoc($select_maxid);
        $id_agenda = $exibe_maxid['id_agenda'];  //id da agenda
        
        //Selecionar Auditores disponiveis
        $query_select_auditor = "select a.id, a.descricao from Auditor a
                                    inner join Dia_Semana_Disponivel dd
                                    on dd.Auditor_id = a.id
                                    inner join Turno t
                                    on t.Auditor_id = a.id
                                    where dd.dia = (dayofweek('" . date('Y') . "-$mes-$dia')) and t.disponivel = $turno and
                                    a.id not in (select Auditor_id from Folga where folga = '" . date('Y') . "-$mes-$dia') and a.ativo =1"
                . "                 and
				    a.id not in (select aa.Auditor_id from Agenda_Auditor aa
                                    inner join Auditor a on a.id = aa.Auditor_id
                                    inner join Agenda ag on ag.id = aa.Agenda_id
                                    where ag.data = '" . date('Y') . "-$mes-$dia') "
                . "                 ORDER BY a.tipo_id desc, RAND() limit $limit ;";
        
        $select_auditor = mysqli_query($connect, $query_select_auditor) or die(msql_error());
        while ($row_auditor = mysqli_fetch_assoc($select_auditor)) {
            $qr_insert_agendamento = "insert into Agenda_Auditor (Agenda_id, Auditor_id) values ($id_agenda,$row_auditor[id]);";
            mysqli_query($connect, $qr_insert_agendamento);
        }
    }
}
echo"<script language='javascript' type='text/javascript'>
alert('Agendamento realizado!');
window.location.href='cadastrar_agendamento_data.php'</script>";