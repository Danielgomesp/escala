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
        <title>Relatórios</title>    
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
        <?php
        include './header.php';  //Cabeçalho
        $today = date("Y-m-d");
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <p>Escolha mês para análise</p>
                    <form method="post" action=""> 
                        <select class='form-control' name='mes' id='mes'>
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
                        <button class="btn btn-success" type="submit">Selecionar</button>
                    </form>
                </div>

                <?php
                $mes = $_POST['mes'];
                ?>

            </div>
            <div class="row">
                <div class="col">

                    <?php
                    include 'conn.php';
                    ?>
                    <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
                        <tr>
                            <th class="col-lg-3">Nome</th>
                            <th class="col-lg-2">Contrato</th>
                            <th class="col-lg-1">Folgas</th>
                            <th class="col-lg-1">Dias Trabalhados</th>
                            <th class="col-lg-1">Folga no Domingo</th>
                            <th class="col-lg-1">Trabalha no Turno 1</th>
                            <th class="col-lg-1">Trabalha no Turno 2</th>
                            <th class="col-lg-1">Trabalha no Turno 3</th>
                        </tr>
                        <?php
                        //While para cada auditor
                        $qr_auditores = " select t.descricao as tipo, a.id, a.descricao from Auditor a inner join Tipo t on t.id = a.tipo_id where ativo =1;";
                        $sel_auditores = mysqli_query($connect, $qr_auditores) or die(msql_error());
                        while ($exibe_auditores = mysqli_fetch_assoc($sel_auditores)) {

                            //Conta a quantidade de folgas e trabalho por usuário para preencher a tabela.
                            $qfolgas_colaborador = "select count(f.folga) as total from Auditor a inner join Folga f on f.Auditor_id = a.id where a.id = $exibe_auditores[id] and month(f.folga) = $mes;";
                            $qfolgas_domingo = "select count(f.folga) as total from Auditor a inner join Folga f on f.Auditor_id = a.id where a.id = $exibe_auditores[id] and month(f.folga) = $mes and dayofweek(f.folga) = 1;";
                            $qtrabalho_colaborador = "select count(aa.Agenda_id) as total from Auditor a inner join Agenda_Auditor aa on aa.Auditor_id = a.id inner join Agenda ag on ag.id = aa.Agenda_id where a.id = $exibe_auditores[id] and month(ag.data)= $mes;";
                            $qr_conta_turno1 = "select count(*) as total from Auditor a inner join Agenda_Auditor aa on aa.Auditor_id = a.id inner join Agenda ag on ag.id = aa.Agenda_id where a.ativo =1 and a.id = $exibe_auditores[id] and ag.turno = 1;";
                            $qr_conta_turno2 = "select count(*) as total from Auditor a inner join Agenda_Auditor aa on aa.Auditor_id = a.id inner join Agenda ag on ag.id = aa.Agenda_id where a.ativo =1 and a.id = $exibe_auditores[id] and ag.turno = 2;";
                            $qr_conta_turno3 = "select count(*) as total from Auditor a inner join Agenda_Auditor aa on aa.Auditor_id = a.id inner join Agenda ag on ag.id = aa.Agenda_id where a.ativo =1 and a.id = $exibe_auditores[id] and ag.turno = 3;";
                            
                            $sel_folga = mysqli_query($connect, $qfolgas_colaborador) or die(msql_error());
                            $sel_domingo = mysqli_query($connect, $qfolgas_domingo) or die(msql_error());
                            $sel_trabalho = mysqli_query($connect, $qtrabalho_colaborador) or die(msql_error());
                            $sel_turno1 = mysqli_query($connect, $qr_conta_turno1) or die(msql_error());
                            $sel_turno2 = mysqli_query($connect, $qr_conta_turno2) or die(msql_error());
                            $sel_turno3 = mysqli_query($connect, $qr_conta_turno3) or die(msql_error());
                           
                            $result_folga = mysqli_fetch_assoc($sel_folga);
                            $result_domingo = mysqli_fetch_assoc($sel_domingo);
                            $result_trabalho = mysqli_fetch_assoc($sel_trabalho);
                            $total1 = mysqli_fetch_assoc($sel_turno1);
                            $total2 = mysqli_fetch_assoc($sel_turno2);
                            $total3 = mysqli_fetch_assoc($sel_turno3);

                            echo "<tr>";
                            echo "<td>" . $exibe_auditores[descricao] . "</td>";
                            echo "<td>" . $exibe_auditores[tipo] . "</td>";
                            echo "<td>" . $result_folga[total] . "</td>";
                            echo "<td>" . $result_trabalho[total] . "</td>";
                            if ($result_domingo[total] ==0){echo "<td><font style='color:red'>" . $result_domingo[total] ."</font></td>";}else{echo "<td>" . $result_domingo[total] ."</td>";}
                            echo "<td>" . $total1[total] ."</td>";
                            echo "<td>" . $total2[total] ."</td>";
                            echo "<td>" . $total3[total] ."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    
                </div>
            </div>
        </div>
    </body>    
</html>
