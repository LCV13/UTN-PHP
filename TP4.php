<!DOCTYPE html>
<html>
<head>
	<title>CARRO – Pasión por su auto</title>
</head>
<body>
	<div align="center">
	<h1>Carro - Pasión por su auto</h1>	
	</div>

		<?php 
		/*Mostrar el texto Clientes del mes de */
		define(Clientes_del_mes, "Clientes del mes de ");
		 	echo Clientes_del_mes;


			/*Función que devuelve el mes: Marzo*/
				function Funcion_mes(){
					
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

			return $meses["tercero"];
		}

			echo Funcion_mes();

		/*Bucle que recorre el array de Clientes*/
			function Funcion_clientes($clientes,$gastos){

			static $Cliente = 0;

			$i=0


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

			/*Crear arrays fuera de Funcion_clientes*/
			$clientes = array("Juan Pereyra","Pedro Diaz","Martín fernandez");
			$gastos = array (125,1250,1326);


		/*Llamar a la función con el concepto de funciones variables*/
		
			$var=Funcion_clientes;
			$var($clientes,$gastos);

			?>



</body>
</html>