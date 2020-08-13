<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	
    <?php

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
function Funcion_clientes($clientes, $gastos, $clieimp, $cantcuo){
static $Cliente = 0;// cuenta de los clientes

/* Recorrer el array  $gastos*/
for($i=0;$i<sizeof($gastos);$i++){
	if ($gastos[$i] > 1000){ 
		$apedeu = $clientes[$i]["Apellido"];
		if (in_array($apedeu, $clieimp)==false){
			$incremento_cliente=$Cliente + 1;
			echo ("\n<br><br>$incremento_cliente");
			echo (" - ");
			echo $clientes[$i][Apellido]." ".$clientes[$i][Nombre]."<br>".$clientes[$i][Localidad]; 
			$Cliente++;
		}
		else{
			$incremento_cliente = $Cliente + 1;
			echo ("\n<br><br>$incremento_cliente");
			echo (" - ");
			echo $clientes[$i][Apellido]." ".$clientes[$i][Nombre]."<br>"."Pero Debe"." ".$cantcuo[$i]." "."cuotas"; 
			$Cliente++; 
		}
		}
	}
}

/* array de clientes*/

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

/* array de gastos*/
$gastos = array (126,1220,1178);

/*CLIENTES CON CUOTAS IMPAGAS */
$clieimp = array (2 => "Fernandez", 0 => "Pereyra");

/* CANTIDAD DE CUOTAS IMPAGAS */
$cantcuo = array(0 => 3,2 => 2);



/* texto Clientes del mes de */
define("clienteDelMes","Clientes del mes de ");
echo clienteDelMes;

/* MARZO */
$mostrarMes = 3;
echo mes($mostrarMes);

/* LLAMAMOS A LA FUNCION QUE MUESTRA LOS NUMEROS Y LOS CLIENTES */
$var="Funcion_clientes";
$var($clientes,$gastos,$clieimp,$cantcuo);

/*El gasto del mejor cliente */
define("mejorGasto","El mejor cliente gastó: $");
echo "<br><br>".mejorGasto;
sort($gastos);
echo end($gastos);

?>
</body>
</html>