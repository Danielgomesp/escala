<?php
include 'conn.php';
$query_select_grupo = "select * from Grupo;";
$select_grupo = mysqli_query($connect, $query_select_grupo) or die(msql_error());
echo"        <div>";
echo"        <select class='form-control' name='grupo' id='grupo' required>";
echo"        <option value=''>" . $exibe['grupo'] . "</option> ";
while ($row_grupo = mysqli_fetch_assoc($select_grupo)) {
    echo"   <option value='$row_grupo[id]'>$row_grupo[descricao]</option> ";
}
echo"    </select>  ";
echo"        </div>  ";
?> 