<!DOCTYPE html>
<html>
    <head>
    </header>
<body>
    <?php
    include("mpdf60/mpdf.php");
    include './conn.php';

//Código HTML da página a ser impressa 
//Cabeçalho

    
    $html = "
    <html>
    <body>
    <font size=55 face='Times New Roman'>";
    
    $html .= "<table style='width:100%'>";

    $mes = $_GET[mes];
    $query_agenda = "select dayname(data) as dia_da_semana, date_format(data, '%d/%m/%y') as datam, data from Agenda where month(data) = $mes group by data order by data limit 31;";
    $select_agenda = mysqli_query($connect, $query_agenda) or die(msql_error());
    while ($row_agenda = mysqli_fetch_assoc($select_agenda)) {
        $html .= "<tr>";
        $html .= "<td>";
        $html .= "<b>$row_agenda[datam]</b> - (" . $row_agenda[dia_da_semana] . ")";
        $html .= "</td>";
        $html .= "<td>1</td>";
        $html .= "<td>2</td>";
        $html .= "<td>3</td>";
        $html .= "<td>4</td>";
        $html .= "<td></td>";
        $html .= "</tr>";
        for ($i = 1; $i <= 3; $i++) {
            $html .= "<tr>";
            $html .= "<td>";
            $html .= "Turno $i";
            $html .= "</td>";
            $query_auditor = "select ag.id as agenda, au.id as auditor, au.descricao as nome from Agenda ag
                                                inner join Agenda_Auditor aa
                                                on aa.Agenda_id = ag.id
                                                inner join Auditor au
                                                on au.id = aa.Auditor_id
                                                where ag.data = '$row_agenda[data]' and ag.turno = $i;";
            $select_auditor = mysqli_query($connect, $query_auditor) or die(msql_error());
            while ($row_auditor = mysqli_fetch_assoc($select_auditor)) {
                $html .= "<td>";
                $html .= $row_auditor[nome];
                $html .= "</td>";
            }

            $html .= "</td>";
            $html .= "</tr>";
        }  //for3
    } //while
    
$html .= "</table> </font></body> </html>";



//Motor PDF
$mpdf = new mPDF();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("css/estilo.css");
$mpdf->WriteHTML($html);
$mpdf->Output();
?>


