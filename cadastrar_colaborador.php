<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Colaboradores</title>    
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
            <h2>Cadastro de Auditor</h2>
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
                        <h4 class="mb-3">Cadastro de Colaborador</h4>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome completo" required>
                            </div>      

                            <div class="col-md-6 mb-3">
                                <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                                <input type="email" class="form-control" name='email' id="email" placeholder="voce@email.com">
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="address">Telefone</label>
                            <input type="tel" class="form-control" name='telefone' id="telefone" placeholder="">                        
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="address2">Data de Nascimento </label>
                            <input type="date" class="form-control" name='data_nascimento' id="data_nascimento" placeholder="">
                            </div>
                        <br>
                        <div class="mb-3">
                            <label for="address2">Grupo de Funcionários </label> <Br>
                            <small class="text-muted">Utilizado para calculo automático de folga</small>
                            <?php
                            include './select_grupo.php';
                            ?> 
                        </div>
                        <br>
                        <div class="mb-3">
                            <?php
                            include 'conn.php';
                            $query_select_tipo = "select * from Tipo;";
                            $select_tipo = mysqli_query($connect, $query_select_tipo) or die(msql_error());

                            echo"        <div>";
                            echo"        <label for='country'>Tipo de Contrato</label> <br> ";
                            echo"           <select c class='form-control' name='tipo' id='tipo' required>";
                            echo"                <option value=''>Escolha</option> ";
                            while ($row_tipo = mysqli_fetch_assoc($select_tipo)) {
                                echo"   <option value='$row_tipo[id]'>$row_tipo[descricao]</option> ";
                            }
                            echo"            </select>  ";
                            echo"        </div>  ";
                            ?>                               
                        </div>
                        <div class="row">
                            <div class="mb-3"> 
                                <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
</body>    
</html>
