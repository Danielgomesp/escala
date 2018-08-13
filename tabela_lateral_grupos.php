<!DOCTYPE html>

<html>
    <body>
        <div class="col-md-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Grupos Ativos</span>
                <span class="badge badge-secondary badge-pill"><!--número de colaboradores cadastrados -->
                    <?php
                    include 'conn.php';
                    $qr_count = "select count(*) as total from Grupo";
                    $select_count = mysqli_query($connect, $qr_count) or die(msql_error());
                    $exibe_count = mysqli_fetch_assoc($select_count);
                    echo $exibe_count[total];
                    ?>
                </span>                
            </h4>
            <ul class="list-group mb-6">

                <?php
                include './conn.php';
                $qr_user = "select * from Grupo";

                $select = mysqli_query($connect, $qr_user) or die(msql_error());
                while ($exibe = mysqli_fetch_assoc($select)) {
                    $qr = "select a.descricao as nome from Grupo g inner join Auditor a on a.Grupo_id = g.id where g.id = $exibe[id];";
                    $select2 = mysqli_query($connect, $qr) or die(msql_error());
                    echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>";
                    echo "<div>";
                    echo "<a href='grupos.php?id=" . $exibe[id] . "'> <b>$exibe[descricao]</b></a>";
                    while ($ver = mysqli_fetch_assoc($select2)) {
                        echo "<small class='text-muted'>  $ver[nome],  </small> <br>";
                    }
                    echo "</div>";
                    echo "</li>";
                }
                ?>
            </ul>


        </div>
    </body>    
</html>
