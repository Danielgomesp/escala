<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
   
</head>


    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">            
                <a class="navbar-brand" href="./index.php">Escala de Trabalho</a>          
            </div>
            <!--Header-->
            <div id="navbar" class="collapse navbar-collapse dropdown">

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agendamentos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./cadastrar_agendamento_data.php">Agendamento Manual</a></li>
                            <li><a href="./cadastrar_agendamento_data_automatico.php">Agendamento Automático</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="./cadastrar_colaborador.php">Colaboradores</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Folga<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./folga.php">Cadastrar Manualmente</a></li>
                            <li><a href="./folga_automatico.php">Cadastrar Automaticamente</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./cadastrar_posto.php">Postos</a></li>
                            <li><a href="./cadastrar_grupo.php">Grupos</a></li>
                            <li><a href="./cadastrar_tipo.php">Tipo de Contrato</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./relatorio.php">Agendamento e Folgas por Auditor</a></li>
                            <li><a href="./relatorio_folga.php">Folgas por dia</a></li>
                            <li><a href="./disponibilidade_semanal.php">Disponibilidade Semanal</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="./sobre.php">Sobre</a></li>
                        </ul>
                    </li>

                </ul>
            </div>   <!--/.nav-collapse -->     
        </div>  <!-- container --> 
    </nav>   


 <!--Funcionamento do DROPDOWN Menu-->
    <!--<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>-->
    <!--<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>-->
    <script src='./js/jquery2.1.3.min.js'></script>
    <script src='./js/dropdown1.js'></script>
    <script>
        $(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>