<!DOCTYPE html>

<html>
    <body>

        <br><br>
        <div class="container">
            <div class="py-5 text-center">
                <table class=" table-striped table table-bordered table-responsive table-condensed table-hover">
                    <?php
                    include './conn.php';
                    $query_agenda = "select dayname(data) as dia_da_semana, date_format(data, '%d/%m/%y') as datam, data  from Agenda where month(data) = 07 group by data order by data limit 31;";
                    $select_agenda = mysqli_query($connect, $query_agenda) or die(msql_error());                    
                    while ($row_agenda = mysqli_fetch_assoc($select_agenda)){
                        echo "<tr>";
                        echo "<td>";
                        echo "<b>$row_agenda[datam]</b> - (".$row_agenda[dia_da_semana].")";
                        echo "</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                            for($i = 1; $i <= 3; $i++){
                            echo "<tr>"; 
                            echo "<td>";
                            echo "Turno $i";
                            echo "</td>";
                            echo "<td>";
                            $query_auditor = "select ag.id as agenda, au.id as auditor, au.descricao as nome from Agenda ag
                                                inner join Agenda_Auditor aa
                                                on aa.Agenda_id = ag.id
                                                inner join Auditor au
                                                on au.id = aa.Auditor_id
                                                where ag.data = '$row_agenda[data]' and ag.turno = $i;";
                            $select_auditor = mysqli_query($connect, $query_auditor) or die(msql_error());                    
                            while ($row_auditor = mysqli_fetch_assoc($select_auditor)){
                               echo "<td>";
                                echo $row_auditor[nome];
                               echo "</td>"; 
                            }
                           
                            echo "</td>";
                            echo "</tr>";
                            }  //for3
                    } //while
                    ?>
                    
                </table> 
            </div>
        </div>


    </body>    
</html>
