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
                <div class="col-md-10 order-md-1">
                    <form method="post" action="cadastrando_agendamento_auditor_automatico.php">  
                    <h4 class="mb-3">Agendar Auditoria Automaticamente</h4>
                    
                    <div class="col-md-3 mb-6">
                    <p> Mês de agendamento</p>
                            <select class='form-control' name='mes' id='mes'>
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
                        </div>
                     <div class="col-md-3 mb-3">
                            <p> Quantas lojas serão auditadas?</p>
                            <select class='form-control' name='limit' id='limit'>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                            </select>
                        </div>
                    <div class="col-md-6 mb-3">
                         <p><br></p>
                        <button class="btn btn-primary" type="submit">Calcular</button>
                        (<a href="./apagatudo_agendamento.php">Apagar tudo</a>)*
                    </div>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <?php include './tabela.php'; //tabela ?>
            </div>
            

        </div>
    </body>    
</html>
