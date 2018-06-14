<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escala - Cadastrar Grupos de Funcionários</title>    
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
            <h2>Cadastro de Grupos</h2>
            <p class="lead"></p>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Grupos de Funcionários</span>
                        <span class="badge badge-secondary badge-pill"><!--número de colaboradores cadastrados -->
                            <?php
                            include 'conn.php';
                            $qr_count = "select count(*) as total from Grupo;";
                            $select_count = mysqli_query($connect, $qr_count) or die(msql_error());
                            $exibe_count = mysqli_fetch_assoc($select_count);
                            echo $exibe_count[total];
                            ?>
                        </span>                
                    </h4>
                    <ul class="list-group mb-3">

                        <?php
                        include './conn.php';
                        $qr_user = "select * from Grupo";
                        $select = mysqli_query($connect, $qr_user) or die(msql_error());
                        while ($exibe = mysqli_fetch_assoc($select)) {
                            echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>";
                            echo "<div>";
                            echo "<h6 class=1my-01><b>$exibe[descricao]</b></h6>";
                            echo "</div>";
                            echo "</li>";
                        }
                        ?>
                    </ul>


                </div>


                <!-- Tela de Cadastro -->
                <form method="post" action="cadastrando_grupo.php">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Cadastro de Grupo</h4>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nome do Grupo</label>
                                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="" required>
                                <br>
                                <label for="firstName">Data de Folga do Grupo</label>
                                <br>
                                <small class="text-muted">Selecione o tipo de cálculo para esse grupo</small>
                                <select class='form-control' name='data' id='data'>
                                    <option value='01'>1</option>
                                    <option value='02'>2</option>
                                    <option value='03'>3</option>
                                    <option value='04'>4</option>
                                    <option value='05'>5</option>
                                    <option value='06'>6</option>
                                </select>
                                <br>
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>     
                        </div>
                    </div>

                    <hr class="mb-4">                    
                </form>
            </div>
        </div>
    </body>    
</html>
