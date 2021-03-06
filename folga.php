<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Folga</title>    
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
                <div class="col">
                    <h4>Cadastro de Folga</h4>
                    <br>
                </div>
            </div>


            <!-- Tela de Cadastro Individual-->
            <div class="row">
                <form method="post" action="cadastrar_folga.php">  
                    <div class="col-8">
                        <h5>Cadastro Individual</h5>
                        <?php
                        include 'conn.php';
                        $query_select_tipo = "select id, descricao from Auditor where ativo=1;";
                        $select_tipo = mysqli_query($connect, $query_select_tipo) or die(msql_error());
                        ?>
                        <select class='custom-select w-100' name='nome' required>
                            <option value=''>Escolha o Auditor</option> 
                            <?php
                            while ($row_tipo = mysqli_fetch_assoc($select_tipo)) {
                                echo" <option value='$row_tipo[id]'>$row_tipo[descricao]</option> ";
                            }
                            ?>   
                        </select>
                        <button class="btn btn-xs" type="submit">Selecionar</button>
                </form> 


            </div>
        </div>

            <br><br>
        <!--Selecionar mês -->
        <div class="row">
            <div class="col-8">
                <form method="post" action=""> 
                    <select class='custom-select w-100' name='mes' required>
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
                    <button class="btn btn-xs" type="submit">Selecionar mês</button>

            </div> 
        </form>
        <!-- Calendário -->
        <?php
        $mes = $_POST['mes'];
        include './calendario_por_data.php';
        MostreCalendario(date($mes));
        ?>
        </div> 
        
</div>
</div>   
</div>

</div>
</div>
</body>    
</html>
