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
            <h2>Cadastro de Agendamento</h2>
            <p class="lead"></p>
        </div>


        <div class="container">

            <!-- Tela de Cadastro -->
            <form method="post" action="cadastrando_agendamento_auditor.php">
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Agendamento</h4>
                    <div class="col-md-10 order-md-1">


                        <?php
                        include 'conn.php';  //Seleciona e exibe data e turno
                        $numero = $_GET['id_agenda']; // recebe numero de selects que será exibido.

                        $qr_id = "SELECT data as datadia, id, turno, date_format(data, '%d/%m/%y') as data, dayname(data) as semana, dayofweek(data) as dia_semana FROM Agenda ORDER BY id DESC LIMIT 1;";
                        $select_id = mysqli_query($connect, $qr_id) or die(msql_error());
                        $exibe_id = mysqli_fetch_assoc($select_id);
                        $turno = $exibe_id[turno];
                        echo "Exibindo usuários disponíveis para a data: ";
                        echo "<b>" . $exibe_id[data] . "</b>";
                        echo " (" . $exibe_id[semana] . ")";
                        echo "<br>";
                        echo "Turno: ";
                        echo "<b>" . $turno . "</b>";
                        ?>

                        <table class="table-striped table-bordered table-responsive table-condensed">
                            <tr>
                                <?php
                                for ($i = 1; $i <= $numero; $i++) {
                                    echo "<td>";
                                    include 'conn.php';
                                    $query_select_auditor = "select a.id, a.descricao from Auditor a
                                    inner join Dia_Semana_Disponivel dd
                                    on dd.Auditor_id = a.id
                                    inner join Turno t
                                    on t.Auditor_id = a.id
                                    where dd.dia = (dayofweek('$exibe_id[datadia]')) and t.disponivel = $turno and
                                    a.id not in (select Auditor_id from Folga where folga = '$exibe_id[datadia]');";
                                    $select_auditor = mysqli_query($connect, $query_select_auditor) or die(msql_error());
                                    echo"  <select  class='form-control' name='auditor$i' id='auditor$i'>";
                                    echo"  <option value=''>Selecione $i</option> ";
                                    while ($row_auditor = mysqli_fetch_assoc($select_auditor)) {
                                        echo"  <option value='$row_auditor[id]'>$row_auditor[descricao]</option> ";
                                    }
                                    echo"  </select>  ";
                                    echo "</td>";
                                }
                                ?>
                                <td>
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                </td>

                            </tr>
                        </table>
                    </div> 
                </div>


            </form>
        </div>
        <div class="row">
            <?php include './tabela.php'; //tabela ?>
        </div>

    </div>
</div>
</div>

</body>    
</html>
