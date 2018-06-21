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

    <body>
        <br><br><br><br><br>
        <?php include './header.php';  //Cabeçalho ?>


        <div class="container">
            <div class="row">
                <div class="col">
                    <form method="post" action="">  
                        <select class='custom-select w-100' name='mes' required>
                            <option value=''>Mês </option> 
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
                        <input type="text" value="<?php echo date('Y'); ?>" class="small" name="ano" id="ano"> 
                        <button class="btn btn-xs" type="submit">Selecionar</button>
                    </form>
                </div>
                <br>
                <div class="col">
                    <table class="table table-bordered table-condensed table-hover table-striped table-responsive">
                        <th>Dia</th>
                        <th>Auditores</th>
                        <th>Quantidade</th>
                        <?php
                        include './conn.php';
                        $mes = $_POST['mes'];   
                        $ano = $_POST['ano'];   


                        for ($dia = 01; $dia <= 31; $dia++) {
                            $date = date_create("$ano-$mes-$dia");
                            echo "<tr>";
                            echo "<td>";
                            echo date_format($date, "d/m/Y - l");
                            echo "</td>";
                            echo "<td>";

                            $query = "select dayname(f.folga) as semana, a.descricao from Folga f inner join Auditor a on a.id = f.Auditor_id
                            where month(folga)=$mes and year(folga)=$ano and day(folga)=$dia;";
                            $select = mysqli_query($connect, $query) or die(msql_error());
                            while ($row = mysqli_fetch_assoc($select)) {
                                echo $row[descricao] . ", ";
                            }
                            echo "</td>";
                            echo "<td>";
                            $query_qtd = "select count(*) as qtd from Folga f inner join Auditor a on a.id = f.Auditor_id
                            where month(folga)=$mes and year(folga)=2018 and day(folga)=$dia;";
                            $select_qtd = mysqli_query($connect, $query_qtd) or die(msql_error());
                            $exibe_qtd = mysqli_fetch_assoc($select_qtd);
                            echo $exibe_qtd[qtd];
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>



        <?php
        while ($row = mysqli_fetch_assoc($select)) {

            echo $row[descricao];
        }
        ?>
        <br>

    </body>    
</html>
