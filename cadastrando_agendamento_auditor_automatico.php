<?php

include 'conn.php';
include './funcoes.php';

$mes = filter_input(INPUT_POST, mes); //recebe mes para cadastrar agenda
$ano = '2018';
$limit = filter_input(INPUT_POST, limit); //recebe valor que vai no limit do sql  (quantas lojas serão auditadas)

$qr_qtd_dias = "select  day(last_day('" . date('Y') . "-$mes-01')) as dias;";
$select_qtd_dias = mysqli_query($connect, $qr_qtd_dias) or die(msql_error());
$exibe_qtd_dias = mysqli_fetch_assoc($select_qtd_dias);
$qtd_dias = $exibe_qtd_dias['dias']; //Quantidade de dias no mês

//Cadastrar Agendamento
for ($dia = 1; $dia <= $qtd_dias; $dia++) {  //loop para cada dia do mês
    $date = date_create("$ano-$mes-$dia"); //cria uma data
    $data = date_format($date, "Y-m-d");  //formata a data

    $fds = diasemana($data); //retorna 1:sabado ou 2:domingo e 0 para o resto

    if ($fds == 0) {
        $qtd_turno = 3; //semana: 3 turnos
    }
    elseif ($fds == 1) {
        $qtd_turno = 3;  //sábado: 3 turnos
    }
    elseif ($fds == 2) {
        $qtd_turno = 2;  //Domingo: 2 turnos
    }

    for ($num_lojas = 1; $num_lojas <= $limit; $num_lojas++) { //repete o código até alcançar o número de lojas
        for ($turno = 1; $turno <= $qtd_turno; $turno++) {  //loop para cada turno
            $query_agenda = "insert into Agenda (turno, data) values ($turno, '$data');";
            mysqli_query($connect, $query_agenda); //insere as datas na tabela Agenda

            $qr_maxid = "select max(id) as id_agenda from Agenda;"; //seleciona última agenda recem criada
            $select_maxid = mysqli_query($connect, $qr_maxid) or die(msql_error());
            $exibe_maxid = mysqli_fetch_assoc($select_maxid);
            $id_agenda = $exibe_maxid['id_agenda'];  //id da agenda


            if ($fds == 0) {
                $query_select_auditor = "select a.id, a.descricao from Auditor a
                                    inner join Dia_Semana_Disponivel dd
                                    on dd.Auditor_id = a.id
                                    inner join Turno t
                                    on t.Auditor_id = a.id
                                    where dd.dia = (dayofweek('$data')) and t.disponivel = $turno and
                                    a.id not in (select Auditor_id from Folga where folga = '$data') and a.ativo =1"
                        . "                 and
				    a.id not in (select aa.Auditor_id from Agenda_Auditor aa
                                    inner join Auditor a on a.id = aa.Auditor_id
                                    inner join Agenda ag on ag.id = aa.Agenda_id
                                    where ag.data = '$data') "
                        . "                 ORDER BY a.tipo_id desc, RAND() limit 1 ;";
            } elseif ($fds != 0) { // nos fins de semana não levamos em consideração o TURNO
                $query_select_auditor = "select a.id, a.descricao from Auditor a
                                    inner join Dia_Semana_Disponivel dd
                                    on dd.Auditor_id = a.id
                                    where dd.dia = (dayofweek('$data')) and
                                    a.id not in (select Auditor_id from Folga where folga = '$data') and a.ativo =1"
                        . "                 and
				    a.id not in (select aa.Auditor_id from Agenda_Auditor aa
                                    inner join Auditor a on a.id = aa.Auditor_id
                                    inner join Agenda ag on ag.id = aa.Agenda_id
                                    where ag.data = '$data') "
                        . "                 ORDER BY a.tipo_id desc, RAND() limit 1 ;";
            }

            $select_auditor = mysqli_query($connect, $query_select_auditor) or die(msql_error());
            while ($row_auditor = mysqli_fetch_assoc($select_auditor)) {
                $qr_insert_agendamento = "insert into Agenda_Auditor (Agenda_id, Auditor_id) values ($id_agenda,$row_auditor[id]);";
                mysqli_query($connect, $qr_insert_agendamento);
            }
        }
    }


//Cadastrar Apoio
    for ($dia_apoio = 01; $dia_apoio <= $qtd_dias; $dia_apoio++) {  //loop para cada dia do mês - apoio
        $date_apoio = date_create("$ano-$mes-$dia_apoio");
        $fds_apoio = diasemana('$date_apoio'); //retorna 1: sabado ou 2:domingo e 0 para o resto
        $data_apoio = date_format($date_apoio, "Y-m-d");
        for ($turno_apoio = 1; $turno_apoio <= $qtd_turno; $turno_apoio++) {  //loop para cada turno
            $qr_idagenda = "select ag.id from Agenda ag inner join Agenda_Auditor aa on aa.Agenda_id = ag.id
where ag.turno = $turno_apoio and ag.data = '$data_apoio' limit 1;";
            $select_idagenda = mysqli_query($connect, $qr_idagenda) or die(msql_error());
            $idagenda = mysqli_fetch_assoc($select_idagenda);


            //Selecionar Auditores disponiveis
            $query_select_apoio = "select a.id from Auditor a inner join Turno t on t.Auditor_id = a.id inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id
where a.id not in (select Auditor_id from Folga where folga = '$data_apoio')
and a.id not in (select Auditor_id from Agenda_Auditor aa inner join Agenda ag on ag.id = aa.Agenda_id where ag.data = '$data_apoio')
and t.disponivel = $turno_apoio and a.ativo =1  and dd.dia = (dayofweek('$data_apoio')) limit 1;";

            $select_apoio = mysqli_query($connect, $query_select_apoio) or die(msql_error());
            while ($row_apoio = mysqli_fetch_assoc($select_apoio)) {
                $qr_insert_agendamento = "insert into Agenda_Auditor (Agenda_id, Auditor_id) values ($idagenda[id],$row_apoio[id]);";
                mysqli_query($connect, $qr_insert_agendamento);
            }
        }
    }
    echo"<script language='javascript' type='text/javascript'>
alert('Agendamento realizado!');
window.location.href='cadastrar_agendamento_data_automatico.php?mes=$mes'</script>";
}