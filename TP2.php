<!DOCTYPE html>
<html>
<head>
	<title>Carro - Pasión por su auto</title>
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

			$incremento_cliente = $Cliente + 1;

			$clientes = array("Juan Pereyra","Pedro Diaz","Martín fernandez");
			echo ("\n<br><br>$incremento_cliente");

			echo (" - ");

			echo $clientes[$Cliente];
			$Cliente++;
			}

			Funcion_clientes();
			Funcion_clientes();
			Funcion_clientes();

		 ?>
</body>
</html>