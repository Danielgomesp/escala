<html>
       
<?php
echo "<body>";
include 'conn.php';
include './funcoes.php';

$mes = '08'; //recebe mes para cadastrar agenda
$ano = '2018';
$limit = '3';

$qr_qtd_dias = "select  day(last_day('" . date('Y') . "-$mes-01')) as dias;";
$select_qtd_dias = mysqli_query($connect, $qr_qtd_dias) or die(msql_error());
$exibe_qtd_dias = mysqli_fetch_assoc($select_qtd_dias);
$qtd_dias = $exibe_qtd_dias['dias']; //Quantidade de dias no mês

//Cadastrar Agendamento
for ($dia = 1; $dia <= $qtd_dias; $dia++) {  //loop para cada dia do mês
    $date = date_create("$ano-$mes-$dia"); //cria uma data
    $data = date_format($date, "Y-m-d");  //formata a data
    
 echo "Dia: ";    
 echo $dia;
 echo "<br>";
 
    $fds = diasemana($data); //retorna 1:sabado ou 2:domingo e 0 para o resto

    if ($fds == 2) {
        $qtd_turno = 2;
        echo $fds;
    }
    elseif ($fds == 1) {
        $qtd_turno = 2;  //Verifica se a data é no domingo: Nesse dia haverá somente 2 turnos
    }
    elseif ($fds == 0) {
        $qtd_turno = 3;  //Caso não seja domingo: Haverá 3 turnos.
    }

    for ($num_lojas = 1; $num_lojas <= $limit; $num_lojas++) { //repete o código até alcançar o número de lojas
        for ($turno = 1; $turno <= $qtd_turno; $turno++) {  //loop para cada turno
     
        }
    }
}
 
echo "</body>";
?>
    
</html>