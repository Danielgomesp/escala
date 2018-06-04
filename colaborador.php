<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escala - Cadastrar - Agendamento</title>    
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
            <h2>Colaborador</h2>
            <p class="lead"></p>
        </div>
<?php
$id = $_GET[id]; //Recebe id do colaborador

include 'conn.php';
$qr = "select descricao, email, telefone, TIMESTAMPDIFF(YEAR,data_nascimento,CURDATE()) AS idade from Auditor where id = $id;";
$select = mysqli_query($connect, $qr) or die(msql_error());
$exibe = mysqli_fetch_assoc($select);                            
?>

        <div class="container">
            <div class="row">
                <!-- Tela de Cadastro -->
              
                    <div class="col-md-10 order-md-1">
                        <h4 class="mb-3">Informações Detalhadas</h4>

                        <div class="col-md-3 mb-3">
                            <p>
                                <b><?php echo $exibe['descricao'];?></b><br>
                                <?php echo $exibe['email'];?><br>
                                <?php echo $exibe['telefone'];?><br>
                                <?php echo $exibe['idade'];?> anos<br>
                            </p>
                        </div>


                    </div>
                    <hr class="mb-4">
            </div>
            <br>
            <div class="row">
                <div class="col-md-10 order-md-1">
                    <h4 class="mb-3">Dias de Folga</h4>
                    <table class="table">
                        <?php
                        $qr_dias = "select date_format(f.folga, '%d/%m/%y') as folga, dayname(folga) as nome_dia from Auditor a inner join Folga f on f.Auditor_id = a.id 
                        where a.id =$id order by f.folga desc;";
                        $select_dias = mysqli_query($connect, $qr_dias) or die (msql_error());
                        while($exibe_dias = mysqli_fetch_assoc($select_dias)){
                            echo "<tr>";
                            echo "<td>";
                            echo $exibe_dias['folga'];
                            echo " - ".$exibe_dias['nome_dia'];
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    
                </div>
            </div>
        </div>
    </body>    
</html>
