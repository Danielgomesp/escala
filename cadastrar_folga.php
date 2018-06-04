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


                <!-- Tela de Cadastro -->
                <form method="post" action="">  
                    <div class="col">
                        <h4>Cadastro de Folga por Colaborador</h4>

                        <div class="row">
                            <div class="col-8">
                                <?php
                                include 'conn.php';
                                $query_select_tipo = "select id, descricao from Auditor;";
                                $select_tipo = mysqli_query($connect, $query_select_tipo) or die(msql_error());
                                ?>
                                <label for='country'>Colaborador</label> <br> 
                                <select class='custom-select w-100' name='nome' required>
                                    <option value=''>Escolha</option> 
                                    <?php
                                    while ($row_tipo = mysqli_fetch_assoc($select_tipo)) {
                                        echo" <option value='$row_tipo[id]'>$row_tipo[descricao]</option> ";
                                    }
                                    ?>   
                                </select>
                                <button class="btn btn-xs" type="submit">Selecionar</button>
                            </div>
                            </form>

                            <div class="col col-lg-4">
                                <?php
                                $id = $_POST['nome']; //recebe id do colaborador
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

                                <br>

                                <form method="post" action="cadastrando_folga.php">  
                                    <div class="col">
                                        <input type="hidden" name="id_auditor" value="<?php echo $auditor['id']; ?>">
                                        <input type="date" name="data">
                                        <button class="btn btn-primary" type="submit">Cadastrar</button> 
                                    </div>
                                </form>
                            </div>
                            <div class="row-4">
                                <table class="table">
                                    <?php
                                    include './conn.php';
                                    $qr_folga = "select date_format(folga, '%d/%m/%y') as data, dayname(folga) as dia_semana from Folga where Auditor_id =" . $auditor['id'] . " order by folga desc;";
                                    $select_folga = mysqli_query($connect, $qr_folga) or die(msql_error());
                                    while ($folga = mysqli_fetch_assoc($select_folga)) {
                                        echo "<tr>
                                          <td>";
                                        echo $folga['data'];
                                        echo " - ";
                                        echo $folga['dia_semana'];
                                        echo " </td>
                                           </tr>";
                                    }
                                    ?>  
                                </table>
                            </div>
                        </div>   
                    </div>
            </div>
        </div>
    </body>    
</html>
