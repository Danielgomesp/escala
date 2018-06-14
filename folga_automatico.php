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

            <div class="row">
                <div class="col-8">
                    <h5>Cadastro Audomático</h5>
                    <form method="post" action="automatico_folga.php">  
                    <select class='custom-select w-100' name='numero_folgas' required>
                            <option value=''>Número de folgas</option> 
                            <option value='2'>3 Folgas</option>
                            <option value='3'>4 Folgas</option>
                            <option value='4'>5 Folgas</option>
                            <option value='5'>6 Folgas</option>
                    </select>
                    <select class='custom-select w-100' name='intervalo_incremento' required>
                            <option value=''>Intervalo entre as folgas</option> 
                            <option value='3'>3 Dias</option>
                            <option value='4'>4 Dias</option>
                            <option value='5'>5 Dias</option>
                            <option value='6'>6 Dias</option>
                    </select>   
                    <select class='custom-select w-100' name='mes' required>
                            <option value=''>Mês </option> 
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
                    <button class="btn btn-xs btn-success" type="submit">Automatizar</button>
                    (<a href="./apagatudo_folga.php">Apagar tudo</a>)*
                     </form>
                </div>
            </div>

            <br>
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
