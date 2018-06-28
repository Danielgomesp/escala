<?php
//Recebe mês e id do funcionario por parâmetro.
//exibe o calendario com datas de folga e de agendamento do usuário escolhido

 function MostreSemanas() {
                            $semanas = "DSTQQSS";

                            for ($i = 0; $i < 7; $i++){
                            echo "<td>" . $semanas{$i} . "</td>";
                            
                            }
                        }

                        function GetNumeroDias($mes) {
                            $numero_dias = array(
                                '01' => 31, '02' => 28, '03' => 31, '04' => 30, '05' => 31, '06' => 30,
                                '07' => 31, '08' => 31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
                            );

                            if (((date('Y') % 4) == 0 and ( date('Y') % 100) != 0) or ( date('Y') % 400) == 0) {
                                $numero_dias['02'] = 29; // altera o numero de dias de fevereiro se o ano for bissexto
                            }

                            return $numero_dias[$mes];
                        }

                        function MostreCalendario($mes, $id) {

                            $numero_dias = GetNumeroDias($mes); // retorna o n�mero de dias que tem o mes desejado
                            $diacorrente = 0;

                            $diasemana = jddayofweek(cal_to_jd(CAL_GREGORIAN, $mes, "01", date('Y')), 0); // fun��o que descobre o dia da semana

                            echo "<table class='table table-striped table-condensed table-responsive table-hover table-bordered'>";

                            echo "<tr class = 'linha_semanas'>";
                            MostreSemanas(); // fun��o que mostra as semanas aqui
                            echo "</tr>";
                            for ($linha = 0; $linha < 6; $linha++) {


                                echo "<tr>";

                                for ($coluna = 0; $coluna < 7; $coluna++) {
                                    echo "<td width = 30 height = 30 ";

                                    if (($diacorrente == ( date('d') - 1) && date('m') == $mes)) {
                                        echo " id = 'dia_atual' ";
                                    } else {
                                        if (($diacorrente + 1) <= $numero_dias) {
                                            if ($coluna < $diasemana && $linha == 0) {
                                                echo " id = 'dia_branco' ";
                                            } else {
                                                echo " id = 'dia_comum' ";
                                            }
                                        } else {
                                            echo " ";
                                        }
                                    }
                                    echo " >";


                                    /* TRECHO IMPORTANTE: APARTIR DESTE TRECHO � MOSTRADO UM DIA DO CALEND�RIO (MUITA ATEN��O NA HORA DA MANUTEN��O) */

                                    if ($diacorrente + 1 <= $numero_dias) {
                                        if ($coluna < $diasemana && $linha == 0) {
                                            echo " ";
                                        } else {
                                            // echo "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."' onclick = \"acao(this.value)\">";

                                            include './conn.php';
                                            
                                            $qr_folga = "select date_format(folga, '%e') as data from Folga where Auditor_id = ".$id." and month(folga) = $mes;";
                                            $qr_trabalho = "select date_format(data, '%e') as trabalho from Auditor a inner join Agenda_Auditor aa on aa.Auditor_id = a.id inner join Agenda ag on ag.id = aa.Agenda_id where a.id = $id and month(data) = $mes;";
                                            $select_folga = mysqli_query($connect, $qr_folga) or die(msql_error());
                                            $select_trabalho = mysqli_query($connect, $qr_trabalho) or die(msql_error());
                                            while ($folga = mysqli_fetch_array($select_folga)) {
                                                $array_folga[] = $folga['data'];
                                            } //while folga
//                           
                                            while ($trabalho = mysqli_fetch_array($select_trabalho)) {
                                                $array_trabalho[] = $trabalho['trabalho'];
                                            } //while trabalho
                                            
                                            if (in_array($diacorrente + 1, $array_folga)) {  //Verifica se tem folga
                                                echo "[<b><font color='red'>" . ++$diacorrente . "</font></b>]";  //Se Tiver  folga, o dia aparece destacado.
                                            }elseif(in_array($diacorrente + 1, $array_trabalho)){
                                                echo "[<b><font color='navy'>" . ++$diacorrente . "</font></b>]";  //Se Tiver  folga, o dia aparece destacado.
                                            }else{
                                                echo  ++$diacorrente ; //Restante dos dias aparecem normais.
                                            }
                                        }
                                    } else {
                                        break;
                                    }

                                    /* FIM DO TRECHO MUITO IMPORTANTE */



                                    echo "</td>";
                                }
                                echo "</tr>";
                            }

                            echo "</table>";
                        }

                        function MostreCalendarioCompleto() {
                            echo "<table>";
                            $cont = 1;
                            for ($j = 0; $j < 4; $j++) {
                                echo "<tr>";
                                for ($i = 0; $i < 3; $i++) {

                                    echo "<td>";
                                    MostreCalendario(($cont < 10 ) ? "0" . $cont : $cont );

                                    $cont++;
                                    echo "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        ?>

                                <script src = "funcoes.js"></script>
                                <meta charset="UTF-8">
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <title>Calendário</title>    
                                <!-- Bootstrap -->
                                <link href="css/bootstrap.min.css" rel="stylesheet">
