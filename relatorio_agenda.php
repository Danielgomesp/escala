<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escala</title>    
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

<html>
    <body>
<br><br><br><br>
<div class="container">
<div class="row">
                <div class="col-md-10">
                    <h4 class="mb-3">Calendário de Folga</h4>
                    <form method="post" action=""> 
                            <div class="col-8">
                             
                                <select class='custom-select w-100' name='mes' required>
                                    <option value="<?php echo date('m'); ?>" selected>Atual: <?php echo date('M'); ?></option>
                                    <option value='01'>Janeiro</option>
                                    <option value='02'>Fevereiro</option>
                                    <option value='03'>Março</option>
                                    <option value='04'>Abril</option>
                                    <option value='05'>Maio</option>
                                    <option value='06'>Junho</option>
                                    <option value='07'>Julho</option>
                                    <option value='08'>Agosto</option>
                                    <option value='09'>Setembro</option>
                                    <option value='10'>Outubro</option>
                                    <option value='11'>Novembro</option>
                                    <option value='12'>Dezembro</option>
                                </select>
                                <button class="btn btn-xs" type="submit">Selecionar</button>
                            </div> 
                    </form>
                </div>
    </div>
        <?php include './header.php';  //Cabeçalho ?>
        <br><br>
        <div class="container">
            <div class="py-5 text-center">
                <table class=" table-striped table table-bordered table-responsive table-condensed table-hover">
                    <?php
                    include './conn.php';
                    $mes = $_POST[mes];
                    $query_agenda = "select dayname(data) as dia_da_semana, date_format(data, '%d/%m/%y') as datam, data from Agenda where month(data) = $mes group by data order by data limit 31;";
                    $select_agenda = mysqli_query($connect, $query_agenda) or die(msql_error());                    
                    while ($row_agenda = mysqli_fetch_assoc($select_agenda)){
                        echo "<tr>";
                        echo "<td>";
                        echo "<b>$row_agenda[datam]</b> - (".$row_agenda[dia_da_semana].")";
                        echo "</td>";
                        echo "<td>1</td>";
                        echo "<td>2</td>";
                        echo "<td>3</td>";
                        echo "<td>4</td>";
                        echo "<td></td>";
                        echo "</tr>";
                            for($i = 1; $i <= 3; $i++){
                            echo "<tr>"; 
                            echo "<td>";
                            echo "Turno $i";
                            echo "</td>";
                            $query_auditor = "select ag.id as agenda, au.id as auditor, au.descricao as nome from Agenda ag
                                                inner join Agenda_Auditor aa
                                                on aa.Agenda_id = ag.id
                                                inner join Auditor au
                                                on au.id = aa.Auditor_id
                                                where ag.data = '$row_agenda[data]' and ag.turno = $i;";
                            $select_auditor = mysqli_query($connect, $query_auditor) or die(msql_error());                    
                            while ($row_auditor = mysqli_fetch_assoc($select_auditor)){
                               echo "<td>";
                                echo $row_auditor[nome];
                               echo "</td>"; 
                            }
                           
                            echo "</td>";
                            echo "</tr>";
                            }  //for3
                    } //while
                    ?>
                    
                </table> 
            </div>
        </div>

</div>
    </body>    
</html>
