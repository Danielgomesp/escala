<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escala</title>    
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
        <?php include './header.php'; ?>
        <br><br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col">                    
                    Versão: Dev 1.0 <br>
                    Lançamento 14/06/2018 <br>
                </div>                    
            </div>
            <div class="row">
                <div class="col">                    
                    <br>Notas: <br> 
                    
                    <b>Alterações visuais: </b> <br>
                    <ul>
                        <li>Alterações na NAV (cabeçalho da página) que agora agrupa de maneira mais organizada e intuitiva os menus do sistema.</li>    
                        <li>Reorganizaçao nde elementos dentro das páginas: Cadastrar Agendamentos Manual e Automático, Folga Manual e Automático, Tabela de colaboradores ativos.</li>    
                    </ul>  
                  
                    <b>Correção de BUGs: </b> <br>
                    <ul>
                        <li>Melhoria no script que cadastra folga automaticamente. Estava duplicando.</li>
                        <li>Melhoria no script que cadastra agendamentos automaticamente, Estava cadastrando a mesma pessoa para mais de um turno no mesmo dia.</li>
                        <li>Correção no script SQL que busca os funcionários. Agora só exibe funcionários ativos.</li>
                    </ul>
                 
                    
                   
                    <b>Para futuras versões:</b> <br>
                    <ul>
                        <li>Editar informações de cada funcionário (Telefone, email, ativo)</li>
                        <li>Adicionar relatórios</li>
                        <li>Melhorar Script de agendamento: Menores Aprendizes não estão sendo escalados todos os dias.</li>
                        <li>Opção de limpar agendamento e folgas selecionando o mês desejado. Atualmente ele limpa a tabela inteira.</li>
                    </ul>
                  
                </div>                    
            </div>
        </div>

    </body>    
</html>
