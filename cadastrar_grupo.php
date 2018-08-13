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
                <div class="col-md-6">
                    <?php
                    include './conn.php';
                    include './tabela_lateral_grupos.php';
                    ?>
                </div>


                <!-- Tela de Cadastro -->
                <form method="post" action="cadastrando_grupo.php">
                    <div class="col-md-6 order-md-1">
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
