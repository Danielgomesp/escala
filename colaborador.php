<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Colaborador</title>    
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
            <h3>Colaborador</h3>
            <p class="lead"></p>
        </div>
        <?php
        $id = $_GET[id]; //Recebe id do colaborador
       
        include 'conn.php';
        $qr = "select a.id, a.ativo, a.descricao, a.email, a.telefone, TIMESTAMPDIFF(YEAR,a.data_nascimento,CURDATE()) AS idade from Auditor a
inner join Grupo g on g.id = a.Grupo_id
where a.id =$id;";
        $select = mysqli_query($connect, $qr) or die(msql_error());
        $exibe = mysqli_fetch_assoc($select);
        
        ?>

        <div class="container">
            <div class="row">
                <!-- Tela de Cadastro -->

                <div class="col-md-10 order-md-1">
                    <h4 class="mb-3">Informações Detalhadas</h4>

                    <div class="col-md-12 mb-12">
                        <form method="post" action="atualizando_colaborador.php">
                            
                            <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                            
                            <div class="col-md-4 mb-3">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $exibe['descricao']; ?>" required>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $exibe['email']; ?>" required>
                            </div>
                            
                            <div class="col-md-2 mb-3">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $exibe['telefone']; ?>" required>
                            </div>
                            
                            <div class="col-md-2 mb-3">
                                <label for="idade">Idade</label>
                                <input type="text" class="form-control" name="idade" id="idade" value="<?php echo $exibe['idade']; ?>" disabled="disabled">
                            </div>
                            <div class="col-md-1 mb-3">
                                <label for="idade">Ativo</label>
                                <input type="checkbox" class="form" name="ativo" id="ativo" value="1" <?php if($exibe[ativo] == 1){echo "checked";}; ?> > 
                           </div>
                            
                            
                            <div class="col-md-1 mb-3">
                                <label for="atualizar"> </label>
                            <button class="btn btn-primary" type="submit">Atualizar</button>
                            </div>
                        </form>
                    </div>


                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-md-10 order-md-10">
                    <h4 class="mb-3">Calendário de Folga</h4>
                    <form method="post" action=""> 
                            <div class="col-8">
                             
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
                                <button class="btn btn-xs" type="submit">Selecionar</button>
                            </div> 
                    </form>
                    
                    <table class="table">
                    
                        <?php 
                        include './calendario_por_usuario.php'; 
                        $mes_selecionado = $_POST['mes'];
                        MostreCalendario($mes_selecionado, $id); // mês e id
                        
                                                
                    $qr_trabalho = "select count(a.id) as qtd from Auditor a inner join Agenda_Auditor aa on aa.Auditor_id = a.id inner join Agenda ag on ag.id = aa.Agenda_id where a.id =$id and month(ag.data) = $mes_selecionado;";
                    $select_trabalho = mysqli_query($connect, $qr_trabalho) or die(msql_error());
                    $trabalho = mysqli_fetch_assoc($select_trabalho);
                    echo "<b><font color='navy'>▬</font></b> Dias de trabalho: ";
                    echo $trabalho['qtd'];
                    echo "<br><b><font color='red'>▬</font></b> Dias de folga $numero_de_folgas<br>";
                        ?>
                     
                    </table>

                </div>
            </div>
        </div>
 
   </body>    
</html>
