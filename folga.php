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
                <form method="post" action="cadastrar_folga.php">  
                    <div class="col">
                        <h4>Cadastro de Folga por Colaborador</h4>

                        <div class="row">
                            <div class="col-8">
                                <?php
                                include 'conn.php';
                                $query_select_tipo = "select id, descricao from Auditor;";
                                $select_tipo = mysqli_query($connect, $query_select_tipo) or die(msql_error());
                                ?>
                                <br> 
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
                            <br>
                            <?php
                            include './calendario_por_data.php';
                            ?>  

                        </div>
                    </div>   
            </div>
        </form> 
    </div>
</div>
</body>    
</html>
