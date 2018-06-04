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
            <h2>Cadastro de Auditor</h2>
            <p class="lead"></p>
        </div>


        <div class="container">
            <div class="row">
                 <?php 
                include './tabela_lateral_colaboradores.php';
                ?>

                <!-- Tela de Cadastro -->
                <form method="post" action="cadastrando_colaborador_variaveis.php">
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Cadastro de  Variáveis Para o Colaborador: </h4>
                       
                            <div class="row">
                                <?php
                                $qr = "select a.id, a.descricao as nome, t.descricao as tipo, TIMESTAMPDIFF(YEAR,a.data_nascimento,CURDATE()) AS idade from Auditor a
                                        inner join Tipo t
                                        on t.id = a.tipo_id
                                        order by a.id desc limit 1;
                                        ";
                                        $select_id = mysqli_query($connect, $qr) or die(msql_error());
                                        $exibe = mysqli_fetch_assoc($select_id);
                                        
                                ?>
                                <input class="hidden" name="id_auditor" value="<?php echo $exibe[id];?>">
                                
                                <div class="col-md-3 mb-3">
                                    <label for="firstName">Nome</label>
                                    <p><?php echo $exibe[nome];?></p>
                                </div>      

                                <div class="col-md-3 mb-3">
                                    <label for="email">Contrato</label>
                                   <p><?php echo $exibe[tipo];?></p>
                                </div>
                                
                                <div class="mb-3">
                                <label for="address">Informações Adicionais:</label>
                                <p>
                                   <?php echo $exibe[idade];?> anos                                
                                </p>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <h4 class="mb-3">Disponibilidade Semanal</h4>
                            <p class='text-muted'>Selecione os dias em que o <b> <?php echo $exibe[nome];?> </b> poderá trabalhar.</p>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='dia[]' value='2'>
                                <label class="custom-control-label" for="same-address">Segunda-Feira</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='dia[]' value='3'>
                                <label class="custom-control-label" for="same-address">Terça-Feira</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='dia[]' value='4'>
                                <label class="custom-control-label" for="same-address">Quarta-Feira</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='dia[]' value='5'>
                                <label class="custom-control-label" for="same-address">Quinta-Feira</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='dia[]' value='6'>
                                <label class="custom-control-label" for="same-address">Sexta-Feira</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='dia[]' value='7'>
                                <label class="custom-control-label" for="same-address">Sábado</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name='dia[]' value='1'>
                                <label class="custom-control-label" for="same-address">Domingo</label>
                            </div>
                            <hr class="mb-4">
                    <button class="btn btn-primary btn-lg" type="submit">Cadastrar</button>

                    </div>

                    
                </form>
            </div>

        </div>
    </div>
</div>

</body>    
</html>
