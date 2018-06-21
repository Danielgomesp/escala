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
        <br><br><br><br><br>
        <?php include './header.php';  //Cabeçalho ?>


        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Disponibilidade por dia da semana</h3>
                </div>
                <div class="col-lg-12">
                    <p>Esse relatório exibe a disponibilidade de cada auditor durante os dias da semana de acordo com o seu cadastro não levando em conta as folgas.</p>
                </div>
            </div>

            <div class="row">    
                <div class="col-md-12">
                    <b>Segunda-Feira</b>
                </div>

                <div class="col-md-8>">
                    <table class="table  table-bordered table-responsive table-striped table-hover">
                        <?php
                        include './conn.php';
                        $qr_seg_1 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 2 and t.disponivel = 1;";
                        $qr_seg_2 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 2 and t.disponivel = 2;";
                        $qr_seg_3 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 2 and t.disponivel = 3;";
                        
                        $select_seg_1 = mysqli_query($connect, $qr_seg_1) or die(msql_error());
                        $select_seg_2 = mysqli_query($connect, $qr_seg_2) or die(msql_error());
                        $select_seg_3 = mysqli_query($connect, $qr_seg_3) or die(msql_error());
                       
                        $total_seg_1 = mysqli_num_rows($select_seg_1);
                        $total_seg_2 = mysqli_num_rows($select_seg_2);
                        $total_seg_3 = mysqli_num_rows($select_seg_3);
                        ?>
                        <tr>
                            <td class="col-md-1">Turno 1</td>
                            <td class="col-md-1"><?php echo $total_seg_1; ?></td>
                            <td class="col-md-10"><?php while($exibe_seg_1 = mysqli_fetch_assoc($select_seg_1)){ echo $exibe_seg_1[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 2</td>
                            <td class="col-md-1"><?php echo $total_seg_2; ?></td>
                            <td class="col-md-10"><?php while($exibe_seg_2 = mysqli_fetch_assoc($select_seg_2)){ echo $exibe_seg_2[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 3</td>
                            <td class="col-md-1"><?php echo $total_seg_3; ?></td>
                            <td class="col-md-10"><?php while($exibe_seg_3 = mysqli_fetch_assoc($select_seg_3)){ echo $exibe_seg_3[descricao] .", "; } ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">    
                <div class="col-md-12">
                    <b>Terça-Feira</b>
                </div>

                <div class="col-md-8>">
                   <table class="table  table-bordered table-responsive table-striped table-hover">
                        <?php
                        include './conn.php';
                        $qr_ter_1 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 3 and t.disponivel = 1;";
                        $qr_ter_2 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 3 and t.disponivel = 2;";
                        $qr_ter_3 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 3 and t.disponivel = 3;";
                        
                        $select_ter_1 = mysqli_query($connect, $qr_ter_1) or die(msql_error());
                        $select_ter_2 = mysqli_query($connect, $qr_ter_2) or die(msql_error());
                        $select_ter_3 = mysqli_query($connect, $qr_ter_3) or die(msql_error());
                       
                        $total_ter_1 = mysqli_num_rows($select_ter_1);
                        $total_ter_2 = mysqli_num_rows($select_ter_2);
                        $total_ter_3 = mysqli_num_rows($select_ter_3);
                        ?>
                        <tr>
                            <td class="col-md-1">Turno 1</td>
                            <td class="col-md-1"><?php echo $total_ter_1; ?></td>
                            <td class="col-md-10"><?php while($exibe_ter_1 = mysqli_fetch_assoc($select_ter_1)){ echo $exibe_ter_1[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 2</td>
                            <td class="col-md-1"><?php echo $total_ter_2; ?></td>
                            <td class="col-md-10"><?php while($exibe_ter_2 = mysqli_fetch_assoc($select_ter_2)){ echo $exibe_ter_2[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 3</td>
                            <td class="col-md-1"><?php echo $total_ter_3; ?></td>
                            <td class="col-md-10"><?php while($exibe_ter_3 = mysqli_fetch_assoc($select_ter_3)){ echo $exibe_ter_3[descricao] .", "; } ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="row">    
                <div class="col-md-12">
                    <b>Quarta-Feira</b>
                </div>

                <div class="col-md-8>">
                    <table class="table  table-bordered table-responsive table-striped table-hover">
                        <?php
                        include './conn.php';
                        $qr_qua_1 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 4 and t.disponivel = 1;";
                        $qr_qua_2 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 4 and t.disponivel = 2;";
                        $qr_qua_3 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 4 and t.disponivel = 3;";
                        
                        $select_qua_1 = mysqli_query($connect, $qr_qua_1) or die(msql_error());
                        $select_qua_2 = mysqli_query($connect, $qr_qua_2) or die(msql_error());
                        $select_qua_3 = mysqli_query($connect, $qr_qua_3) or die(msql_error());
                       
                        $total_qua_1 = mysqli_num_rows($select_qua_1);
                        $total_qua_2 = mysqli_num_rows($select_qua_2);
                        $total_qua_3 = mysqli_num_rows($select_qua_3);
                        ?>
                        <tr>
                            <td class="col-md-1">Turno 1</td>
                            <td class="col-md-1"><?php echo $total_qua_1; ?></td>
                            <td class="col-md-10"><?php while($exibe_qua_1 = mysqli_fetch_assoc($select_qua_1)){ echo $exibe_qua_1[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 2</td>
                            <td class="col-md-1"><?php echo $total_qua_2; ?></td>
                            <td class="col-md-10"><?php while($exibe_qua_2 = mysqli_fetch_assoc($select_qua_2)){ echo $exibe_qua_2[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 3</td>
                            <td class="col-md-1"><?php echo $total_qua_3; ?></td>
                            <td class="col-md-10"><?php while($exibe_qua_3 = mysqli_fetch_assoc($select_qua_3)){ echo $exibe_qua_3[descricao] .", "; } ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="row">    
                <div class="col-md-12">
                    <b>Quinta-Feira</b>
                </div>

                <div class="col-md-8>">
                    <table class="table  table-bordered table-responsive table-striped table-hover">
                        <?php
                        include './conn.php';
                        $qr_qui_1 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 5 and t.disponivel = 1;";
                        $qr_qui_2 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 5 and t.disponivel = 2;";
                        $qr_qui_3 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 5 and t.disponivel = 3;";
                        
                        $select_qui_1 = mysqli_query($connect, $qr_qui_1) or die(msql_error());
                        $select_qui_2 = mysqli_query($connect, $qr_qui_2) or die(msql_error());
                        $select_qui_3 = mysqli_query($connect, $qr_qui_3) or die(msql_error());
                       
                        $total_qui_1 = mysqli_num_rows($select_qui_1);
                        $total_qui_2 = mysqli_num_rows($select_qui_2);
                        $total_qui_3 = mysqli_num_rows($select_qui_3);
                        ?>
                        <tr>
                            <td class="col-md-1">Turno 1</td>
                            <td class="col-md-1"><?php echo $total_qui_1; ?></td>
                            <td class="col-md-10"><?php while($exibe_qui_1 = mysqli_fetch_assoc($select_qui_1)){ echo $exibe_qui_1[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 2</td>
                            <td class="col-md-1"><?php echo $total_qui_2; ?></td>
                            <td class="col-md-10"><?php while($exibe_qui_2 = mysqli_fetch_assoc($select_qui_2)){ echo $exibe_qui_2[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 3</td>
                            <td class="col-md-1"><?php echo $total_qui_3; ?></td>
                            <td class="col-md-10"><?php while($exibe_qui_3 = mysqli_fetch_assoc($select_qui_3)){ echo $exibe_qui_3[descricao] .", "; } ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="row">    
                <div class="col-md-12">
                    <b>Sexta-Feira</b>
                </div>

                <div class="col-md-8>">
                    <table class="table  table-bordered table-responsive table-striped table-hover">
                        <?php
                        include './conn.php';
                        $qr_sex_1 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 6 and t.disponivel = 1;";
                        $qr_sex_2 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 6 and t.disponivel = 2;";
                        $qr_sex_3 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 6 and t.disponivel = 3;";
                        
                        $select_sex_1 = mysqli_query($connect, $qr_sex_1) or die(msql_error());
                        $select_sex_2 = mysqli_query($connect, $qr_sex_2) or die(msql_error());
                        $select_sex_3 = mysqli_query($connect, $qr_sex_3) or die(msql_error());
                       
                        $total_sex_1 = mysqli_num_rows($select_sex_1);
                        $total_sex_2 = mysqli_num_rows($select_sex_2);
                        $total_sex_3 = mysqli_num_rows($select_sex_3);
                        ?>
                        <tr>
                            <td class="col-md-1">Turno 1</td>
                            <td class="col-md-1"><?php echo $total_sex_1; ?></td>
                            <td class="col-md-10"><?php while($exibe_sex_1 = mysqli_fetch_assoc($select_sex_1)){ echo $exibe_sex_1[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 2</td>
                            <td class="col-md-1"><?php echo $total_sex_2; ?></td>
                            <td class="col-md-10"><?php while($exibe_sex_2 = mysqli_fetch_assoc($select_sex_2)){ echo $exibe_sex_2[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 3</td>
                            <td class="col-md-1"><?php echo $total_sex_3; ?></td>
                            <td class="col-md-10"><?php while($exibe_sex_3 = mysqli_fetch_assoc($select_sex_3)){ echo $exibe_sex_3[descricao] .", "; } ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
             
             <div class="row">    
                <div class="col-md-12">
                    <b>Sábado</b>
                </div>

                <div class="col-md-8>">
                    <table class="table  table-bordered table-responsive table-striped table-hover">
                        <?php
                        include './conn.php';
                        $qr_sab_1 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 7 and t.disponivel = 1;";
                        $qr_sab_2 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 7 and t.disponivel = 2;";
                        $qr_sab_3 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 7 and t.disponivel = 3;";
                        
                        $select_sab_1 = mysqli_query($connect, $qr_sab_1) or die(msql_error());
                        $select_sab_2 = mysqli_query($connect, $qr_sab_2) or die(msql_error());
                        $select_sab_3 = mysqli_query($connect, $qr_sab_3) or die(msql_error());
                       
                        $total_sab_1 = mysqli_num_rows($select_sab_1);
                        $total_sab_2 = mysqli_num_rows($select_sab_2);
                        $total_sab_3 = mysqli_num_rows($select_sab_3);
                        ?>
                        <tr>
                            <td class="col-md-1">Turno 1</td>
                            <td class="col-md-1"><?php echo $total_sab_1; ?></td>
                            <td class="col-md-10"><?php while($exibe_sab_1 = mysqli_fetch_assoc($select_sab_1)){ echo $exibe_sab_1[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 2</td>
                            <td class="col-md-1"><?php echo $total_sab_2; ?></td>
                            <td class="col-md-10"><?php while($exibe_sab_2 = mysqli_fetch_assoc($select_sab_2)){ echo $exibe_sab_2[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 3</td>
                            <td class="col-md-1"><?php echo $total_sab_3; ?></td>
                            <td class="col-md-10"><?php while($exibe_sab_3 = mysqli_fetch_assoc($select_sab_3)){ echo $exibe_sab_3[descricao] .", "; } ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
             <div class="row">    
                <div class="col-md-12">
                    <b>Domingo</b>
                </div>

                <div class="col-md-8>">
                    <table class="table  table-bordered table-responsive table-striped table-hover">
                        <?php
                        include './conn.php';
                        $qr_dom_1 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 1 and t.disponivel = 1;";
                        $qr_dom_2 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 1 and t.disponivel = 2;";
                        $qr_dom_3 = "select a.descricao from Auditor a inner join Dia_Semana_Disponivel dd on dd.Auditor_id = a.id inner join Turno t on t.Auditor_id = a.id where a.ativo = 1 and dd.dia = 1 and t.disponivel = 3;";
                        
                        $select_dom_1 = mysqli_query($connect, $qr_dom_1) or die(msql_error());
                        $select_dom_2 = mysqli_query($connect, $qr_dom_2) or die(msql_error());
                        $select_dom_3 = mysqli_query($connect, $qr_dom_3) or die(msql_error());
                       
                        $total_dom_1 = mysqli_num_rows($select_dom_1);
                        $total_dom_2 = mysqli_num_rows($select_dom_2);
                        $total_dom_3 = mysqli_num_rows($select_dom_3);
                        ?>
                        <tr>
                            <td class="col-md-1">Turno 1</td>
                            <td class="col-md-1"><?php echo $total_dom_1; ?></td>
                            <td class="col-md-10"><?php while($exibe_dom_1 = mysqli_fetch_assoc($select_dom_1)){ echo $exibe_dom_1[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 2</td>
                            <td class="col-md-1"><?php echo $total_dom_2; ?></td>
                            <td class="col-md-10"><?php while($exibe_dom_2 = mysqli_fetch_assoc($select_dom_2)){ echo $exibe_dom_2[descricao] .", "; } ?></td>
                        </tr>

                        <tr>
                            <td class="col-md-1">Turno 3</td>
                            <td class="col-md-1"><?php echo $total_dom_3; ?></td>
                            <td class="col-md-10"><?php while($exibe_dom_3 = mysqli_fetch_assoc($select_dom_3)){ echo $exibe_dom_3[descricao] .", "; } ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
        </div> 
    </body>    
</html>
