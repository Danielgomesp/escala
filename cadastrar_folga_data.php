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
                <?php 
                include './tabela_lateral_colaboradores.php';
                ?>

                <!-- Tela de Cadastro -->
                <form method="post" action="cadastrando_colaborador.php">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Cadastro de Folga por Colaborador</h4>
                      
                            <div class="row">
                                
                            <div class="mb-3">
                                <label for="address2">Data de Nascimento </label>
                                <input type="date" class="form-control" name='data_nascimento' id="data_nascimento" placeholder="">
                            </div>

                            <div class="row">
                                <?php
                                include 'conn.php';
                                $query_select_tipo = "select * from Tipo;";
                                $select_tipo = mysqli_query($connect, $query_select_tipo) or die(msql_error());

                                echo"        <div class='col-md-5 mb-3'>";
                                echo"        <label for='country'>Tipo de Contrato</label> <br> ";
                                echo"           <select class='custom-select d-block w-100' name='tipo' id='tipo' required>";
                                echo"                <option value=''>Escolha</option> ";
                                while ($row_tipo = mysqli_fetch_assoc($select_tipo)) {
                                    echo"                <option value='$row_tipo[id]'>$row_tipo[descricao]</option> ";
                                }
                                echo"            </select>  ";
                                echo"        </div>  ";
                                ?>                               
                            </div>

                        <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>
                                                    
                    </div>

                  
               
                </form>
            </div>

        </div>
    </div>
</div>

</body>    
</html>
