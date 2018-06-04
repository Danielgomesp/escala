<!DOCTYPE html>

<html>
    <body>
         <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Colaboradoes cadastrados</span>
                        <span class="badge badge-secondary badge-pill"><!--número de colaboradores cadastrados -->
                            <?php
                            include 'conn.php';
                            $qr_count = "select count(*) as total from Auditor;";
                            $select_count = mysqli_query($connect, $qr_count) or die(msql_error());
                            $exibe_count = mysqli_fetch_assoc($select_count);
                            echo $exibe_count[total];
                            ?>
                        </span>                
                    </h4>
                    <ul class="list-group mb-3">

                        <?php
                        include './conn.php';
                        $qr_user = "select a.id, a.descricao as Nome,
                        TIMESTAMPDIFF(YEAR,a.data_nascimento,CURDATE()) AS Idade,
                        t.descricao as cargo
                        from Auditor a
                        inner join Tipo t
                        on t.id = a.tipo_id
                        ;";
                        
                        $select = mysqli_query($connect, $qr_user) or die (msql_error());
                        while($exibe = mysqli_fetch_assoc($select)){
                            echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>";
                            echo "<div>";
                            echo "<h6 class=1my-01><a href='colaborador.php?id=".$exibe[id]."'> <b>$exibe[Nome]</b> </a></h6>";
                            echo "<small class='text-muted'>$exibe[cargo]</small>";
                            echo "</div>";
                            echo "<span class='text-muted'>$exibe[Idade] anos </span>";
                            echo "</li>";
                        }
                        ?>
                     </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Procurar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
    </body>    
</html>
