<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>
	<?php

			define(Clientes_del_mes, "Clientes del mes de ");
		echo Clientes_del_mes;

			function mes($mostrarMes){
					$meses = array(
				    1 => "Enero",
				    2 => "Febrero",
					3 => "Marzo",
					4 => "Abril",
					5 => "Mayo",
					6 => "Junio",
					7 => "Julio",
					8 => "Agosto",
					9 => "Septiembre",
					10 => "Octubre",
					11 => "Noviembre",
					12 => "Diciembre");

				return $meses[$mostrarMes];
				}


			function Funcion_clientes($clientes,$gastos){

				static $Cliente = 0;




			for($i=0;$i<count($gastos);$i++){

				if ($gastos[$i] > 1000){
		
						$incremento_cliente = $Cliente + 1;
		
					echo ("\n<br><br>$incremento_cliente");
					echo (" - ");

				
					echo $clientes[$i][Apellido]." ".$clientes[$i][Nombre]."<br>".$clientes[$i][Localidad]; 
		
						$Cliente++;

		}
	}
}

			$clientes[0]["Apellido"]="Pereyra";
			$clientes[0]["Nombre"]="Juan";
			$clientes[0]["Localidad"]="Cap. Federal";
			$clientes[0]["Tel"]="4526-9865";

			$clientes[1]["Apellido"]="Diaz";
			$clientes[1]["Nombre"]="Pedro";
			$clientes[1]["Localidad"]="Haedo";
			$clientes[1]["Tel"]="3356-5899";

			$clientes[2]["Apellido"]="Fernandez";
			$clientes[2]["Nombre"]="Martín";
			$clientes[2]["Localidad"]="Cap. Federal";
			$clientes[2]["Tel"]="4525-5666";



			$gastos = array (126,1200,1578);



			$mostrarMes = 3;
			echo mes($mostrarMes);

			$var=Funcion_clientes;
			$var($clientes,$gastos);


			define("Mejor_cliente","El mejor cliente gastó: $");
				echo "<br>".Mejor_cliente;

			echo end($gastos);


	?>

</body>
</html>
