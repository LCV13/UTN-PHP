<html>
<head>
<title>CARRO – Pasión por su auto</title>
</head>

<body>
<div align="center">
	<h1>Carro - Pasión por su auto</h1>	
	</div>

	 	<?php 

		 	define(Clientes_del_mes, "Clientes del mes de ");
		 	echo Clientes_del_mes;

			 $meses = array(

	    	"primero" => "Enero",
	    	"segundo" => "Febrero",
			"tercero" => "Marzo",
			"cuarto" => "Abril",
			"quinto" => "Mayo",
			"sexto" => "Junio",
			"septimo" => "Julio",
			"octavo" => "Agosto",
			"noveno" => "Septiembre",
			"decimo" => "Octubre",
			"decimoPrimero" => "Noviembre",
			"decimoSegundo" => "Diciembre");

			echo $meses["tercero"];

			function Funcion_clientes(){

			static $Cliente = 0;

			$i=0;

			$clientes = array("Juan Pereyra", "Pedro Diaz", "Martín fernandez");
			$gastos = array (125, 1250, 1326);

			foreach ($gastos as $valor){
				if ($valor > 1000){
					$incremento_cliente=$Cliente + 1;
					echo ("\n<br><br>$incremento_cliente");
					echo (" - ");
					echo $clientes[$i];
					$Cliente++; 
					}
				$i++;
				}
			}
				
				Funcion_clientes();
        ?>

</body>
