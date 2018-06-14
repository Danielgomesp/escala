<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escala - Cadastrar</title>    
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

        <?php include './header.php';  //Cabeçalho ?>
        <div class="py-5 text-center">
            <h2>Cadastro</h2>
            <p class="lead"></p>
        </div>


        <div class="container">
            <div class="row">
                <h4>Cadastro de Folga por Colaborador</h4>

                <?php include 'conn.php'; ?>

                <div class="col-sm-12">
                    <?php
                    $id = $_POST[nome]; //recebe id do colaborador
                    $query_select_auditor = "select a.id, a.descricao as nome, a.telefone, t.descricao as contrato from Auditor a inner join Tipo t on t.id = a.tipo_id where a.id = $id;";
                    $select_auditor = mysqli_query($connect, $query_select_auditor) or die(msql_error());
                    $auditor = mysqli_fetch_assoc($select_auditor);
                    ?>
                    <div class="row">
                        <div class="col">
                            <i class="material-icons">person</i> <!-- ICONE--> 
                            <b><?php echo $auditor['nome'] . "</b> (" . $auditor['contrato']; ?>)
                        </div>       
                        <div class="col">
                            Telefone: 
                            <?php echo $auditor['telefone']; ?>
                        </div>

                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                    <table class="table table-condensed table-responsive table-hover table-bordered table-striped">
                        <thead>
                        <th>Dias de folga</th>
                        </thead>
                        <?php
                        include './conn.php';
                        $qr_folga = "select date_format(folga, '%d/%m/%y') as data, dayname(folga) as dia_semana, folga from Folga where Auditor_id =" . $auditor['id'] . " order by folga desc;";
                        $select_folga = mysqli_query($connect, $qr_folga) or die(msql_error());
                        while ($folga = mysqli_fetch_assoc($select_folga)) {
                            echo "<tr><td>";
                            echo $folga['data'];
                            echo " - ";
                            echo $folga['dia_semana'];
                            echo "<a href =excluir_folga.php?auditor=" . $auditor['id'] . "&folga=" . $folga['folga'] . ">  (excluir)</a>";
                            echo " </td></tr>";
                        }
                        ?>  
                    </table>
                    <div class="col">
                        <form method="post" action="cadastrando_folga.php"> 
                            <input type="hidden" name="id_auditor" value="<?php echo $auditor['id']; ?>">
                            <input type="date" name="data">
                            <button class="btn btn-sm" type="submit">Cadastrar</button> 
                        </form>
                    </div>
                </div>
              
                
                <div class="col-sm-8">
                    <h4>Tabela Geral</h4>
                    <?php include './calendario_por_data_mes_atual.php'; ?>
                </div>  
            </div>
        </div>   
    </div>
</body>    
</html>
