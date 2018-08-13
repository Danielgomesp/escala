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
        $id = $_GET[id]; //Recebe id do grupo
       
        include 'conn.php';
        $qr = "select a.id, a.ativo, a.descricao, a.email, a.telefone, TIMESTAMPDIFF(YEAR,a.data_nascimento,CURDATE()) AS idade from Auditor a
inner join Grupo g on g.id = a.Grupo_id
where a.id =$id;";
        $select = mysqli_query($connect, $qr) or die(msql_error());
        $exibe = mysqli_fetch_assoc($select);
        
        ?>

        <div class="container">
            <div class="row">

                <div class="col-md-10 order-md-1">
                    <h4 class="mb-3">Informações Detalhadas</h4>

                    <div class="col-md-12 mb-12">
                        <form method="post" action="atualizando_colaborador.php">
                            
                            <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                            
                                                       
                            
                        </form>
                    </div>


                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-md-10 order-md-10">
           
                </div>
            </div>
        </div>
 
   </body>    
</html>
