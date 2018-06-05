<?php

function MostreSemanas()
{
	$semanas = "DSTQQSS";

	for( $i = 0; $i < 7; $i++ )
	 echo "<th>".$semanas{$i}."</th>";

}

function GetNumeroDias( $mes )
{
	$numero_dias = array( 
			'01' => 31, '02' => 28, '03' => 31, '04' =>30, '05' => 31, '06' => 30,
			'07' => 31, '08' =>31, '09' => 30, '10' => 31, '11' => 30, '12' => 31
	);

	if (((date('Y') % 4) == 0 and (date('Y') % 100)!=0) or (date('Y') % 400)==0)
	{
	    $numero_dias['02'] = 29;	// altera o numero de dias de fevereiro se o ano for bissexto
	}

	return $numero_dias[$mes];
}



function MostreCalendario( $mes  )
{

	$numero_dias = GetNumeroDias( $mes );	// retorna o n�mero de dias que tem o mes desejado
	$diacorrente = 0;	

	$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 );	// fun��o que descobre o dia da semana

	echo "<table class='table table-condensed table-responsive table-hover table-bordered'>";
	
	 echo "<tr class = 'linha_semanas'>";
	   MostreSemanas();	// fun��o que mostra as semanas aqui
	 echo "</tr>";
	for( $linha = 0; $linha < 6; $linha++ )
	{


	   echo "<tr>";

	   for( $coluna = 0; $coluna < 7; $coluna++ )
	   {
		echo "<td width = 30 height = 30 ";

		  if( ($diacorrente == ( date('d') - 1) && date('m') == $mes) )
		  {	
			   echo " id = 'dia_atual' ";
		  }
		  else
		  {
			     if(($diacorrente + 1) <= $numero_dias )
			     {
			         if( $coluna < $diasemana && $linha == 0)
				 {
					echo " id = 'dia_branco' ";
				 }
				 else
				 {
				  	echo " id = 'dia_comum' ";
				 }
			     }
			     else
			     {
				echo " ";
			     }
		  }
		echo " >";


		   /* TRECHO IMPORTANTE: APARTIR DESTE TRECHO � MOSTRADO UM DIA DO CALEND�RIO (MUITA ATEN��O NA HORA DA MANUTEN��O) */

		      if( $diacorrente + 1 <= $numero_dias )
		      {
			 if( $coluna < $diasemana && $linha == 0)
			 {
			  	 echo " ";
			 }
			 else
			 {
                            // echo "<input type = 'button' id = 'dia_comum' name = 'dia".($diacorrente+1)."'  value = '".++$diacorrente."' onclick = \"acao(this.value)\">";

                            include './conn.php';
                            $qr_folga = "select count(folga) as total from Folga where folga = '".date('Y')."-$mes-".($diacorrente+1)."';";
                            $select_folga = mysqli_query($connect, $qr_folga) or die(msql_error());
                            $folga = mysqli_fetch_array($select_folga);

//                           

                            echo ++$diacorrente; //Restante dos dias aparecem normais.
                            if ($folga['total'] > 0){
                            echo "  (<a href = ".$_SERVER["PHP_SELF"]."?dia=".($diacorrente)."><font color='red'>".$folga['total']."</font></a>)";    
                            }else{
                            
                            }       
			 }
		      }
		      else
		      {
			break;
		      }

		   /* FIM DO TRECHO MUITO IMPORTANTE */



		echo "</td>";
	   }
	   echo "</tr>";
	}

	echo "</table>";
}

function MostreCalendarioCompleto()
{
	    echo "<table>";
	    $cont = 1;
	    for( $j = 0; $j < 4; $j++ )
	    {
		  echo "<tr>";
		for( $i = 0; $i < 3; $i++ )
		{
		 
		  echo "<td>";
			MostreCalendario( ($cont < 10 ) ? "0".$cont : $cont );  

		        $cont++;
		  echo "</td>";

	 	}
		echo "</tr>";
	   }
	   echo "</table>";
}

?>

<html>
 <head>

  <script src = "funcoes.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendário</title>    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <?php  /* include("info.php"); */ ?>

 </head>
              
 <body>


		<?php
		  MostreCalendario(date('m'));
                  
		?>


 </body>
</html>


