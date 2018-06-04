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
            <h2>Cadastro</h2>
            <p class="lead"></p>
        </div>


        <div class="container">
            <div class="row">
                <!-- Tela de Cadastro -->
                <form method="post" action="cadastrando_agendamento_data.php">
                    <div class="col-md-10 order-md-1">
                        <h4 class="mb-3">Agendar Auditoria</h4>

                        <div class="col-md-3 mb-3">
                            <p>Escolha uma data:</p>
                            <input type='date' class='form-control' name='data' id='data' value=''>
                        </div>

                        <div class="col-md-3 mb-3">
                            <p>Escolha o turno:</p>
                            <select class='form-control' name='turno' id='turno'>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                            </select>
                        </div>



                        <div class="col-md-4 mb-3">
                            <p> Quantos auditores para esse turno?</p>
                            <select class='form-control' name='numero' id='numero'>
                                <option value='0'>0</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                            </select>
                        </div>

                        <div class="col-md-1 mb-3">
                            <p> <br></p>
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>

                    </div>
                    <hr class="mb-4">
                </form>                
            </div>
            <div class="row">
                <?php include './tabela.php'; //tabela ?>
            </div>

        </div>
    </body>    
</html>
