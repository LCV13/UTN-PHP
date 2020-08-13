<html>
<head>
<title>Document</title>
</head>

<body>
<div align="center">
  <h1>Carro - Pasion por su auto </h1>
</div>

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
	
	function cadenafecha($fechaActual){
    //Separar la fecha 
    $fecha = split("/", $fechaActual);
    //el mes a entero
    $mesActual = (intval($fecha[1]));
    $mesActual = strtolower(mes($mesActual));
    return "{$fecha[0]} de $mesActual de {$fecha[2]}";
}
	function Funcion_clientes($clientes, $gastos, $clieimp, $cantcuo){
    static $Cliente=0;
    /*Recorre el array $gastos*/
    for($i=0;$i<sizeof($gastos);$i++){
        if ($gastos[$i] > 1000){ 
            $apedeu = $clientes[$i]["Apellido"];
            $Cliente++; 
            echo ("\n<br><br>$Cliente - {$clientes[$i][Apellido]} {$clientes[$i][Nombre]}<br>{$clientes[$i][Localidad]}<br>");
            if (in_array($apedeu, $clieimp)!=false){
                echo "<span>Pero debe {$cantcuo[$i]} cuotas</span>";
            }
        }
    }
}


function formatCliente($indCliente){
    global $clientes;
    //ucfirst 
    $clientes[$indCliente]["Apellido"]=ucfirst($clientes[$indCliente]["Apellido"]);
    $clientes[$indCliente]["Nombre"]=ucfirst($clientes[$indCliente]["Nombre"]);
    //ucwords
    $clientes[$indCliente]["Localidad"]=ucwords($clientes[$indCliente]["Localidad"]);
}
	
	function cargarDatos($conexion){
		global $clientes, $gastos, $clieimp, $cantcuo;
		$sqltxt = "SELECT * FROM clientes";
		$resultado = mysql_query($sqltxt, $conexion);
		while($registro=mysql_fetch_array($resultado)){
			$clientes[$registro["indice"]]["Apellido"]=$registro["apellido"];
			$clientes[$registro["indice"]]["Nombre"]=$registro["nombre"];
			$clientes[$registro["indice"]]["Localidad"]=$registro["localidad"];
			$clientes[$registro["indice"]]["Telefono"]=$registro["telefono"];
		}
		$sqltxt = "SELECT * FROM gastos";
		$resultado = mysql_query($sqltxt, $conexion);
		while($registro=mysql_fetch_array($resultado)){
			$gastos[$registro["indice"]]=$registro["gasto"];
		}
		$sqltxt = "SELECT * FROM clieimp";
		$resultado = mysql_query($sqltxt, $conexion);
		while($registro=mysql_fetch_array($resultado)){
			$clieimp[$registro["indice"]]=$registro["nombre"];
		}
		$sqltxt = "SELECT * FROM cantcuo";
		$resultado = mysql_query($sqltxt, $conexion);
		while($registro=mysql_fetch_array($resultado)){
			$cantcuo[$registro["indice"]]=$registro["cantidadCuotas"];
		}		
	}
	
	function vaciarTablas($conexion){
		$sqltxt="DELETE FROM gastos";
		mysql_query($sqltxt, $conexion);
		$sqltxt="DELETE FROM clieimp";
		mysql_query($sqltxt, $conexion);
		$sqltxt="DELETE FROM cantcuo";
		mysql_query($sqltxt, $conexion);
	}

	function generarDatos($conexion){
		$sqltxt="INSERT INTO gastos (indice, gasto) VALUES (0, 126)";	
		mysql_query($sqltxt, $conexion);
		$sqltxt="INSERT INTO gastos (indice, gasto) VALUES (1, 1220)";	
		mysql_query($sqltxt, $conexion);
		$sqltxt="INSERT INTO gastos (indice, gasto) VALUES (2, 1178)";	
		mysql_query($sqltxt, $conexion);
		$sqltxt="INSERT INTO gastos (indice, gasto) VALUES (3, 700)";	
		mysql_query($sqltxt, $conexion);

		$sqltxt="INSERT INTO clieimp(indice, nombre) VALUES (2, \"Fernandez\")";	
		mysql_query($sqltxt, $conexion);
		$sqltxt="INSERT INTO clieimp(indice, nombre) VALUES (0, \"Pereyra\")";	
		mysql_query($sqltxt, $conexion);
	
		$sqltxt="INSERT INTO cantcuo (indice, cantidadCuotas) VALUES (0, 3)";	
		mysql_query($sqltxt, $conexion);
		$sqltxt="INSERT INTO cantcuo (indice, cantidadCuotas) VALUES (2, 2)";	
		mysql_query($sqltxt, $conexion);		
	}
	
	//Conectar a la base de datos
	$host="localhost";
	$usuario="root";
	$clave="";
	$conexion=mysql_connect($host, $usuario, $clave);
	mysql_selectdb("Carro", $conexion);

	vaciarTablas($conexion);	
	generarDatos($conexion);
	cargarDatos($conexion);
	mysql_close($conexion);
	
for($indice=0; $indice<count($clientes); $indice++)
		formatCliente($indice);
		
	/*Mostramos el texto Clientes del mes de*/
	define("TEX1","Clientes del mes de ");
	echo TEX1;
	
	/* MARZO */
	$mostrarMes = 3;
	echo mes($mostrarMes);


	
	/*Mostrar numeros y clientes*/
	$var="Funcion_clientes";
	$var($clientes, $gastos, $clieimp, $cantcuo);
	
	//*El gasto del mejor cliente */
	define("TEX2","El mejor cliente es ");	
	asort($gastos);
	end($gastos);	
	echo "<br><br>". TEX2 . $clientes[key($gastos)]["Apellido"] . ", ";
	echo "{$clientes[key($gastos)]["Nombre"]} y gasto $" . number_format(current($gastos), 2, ",", ".");
	
	$fechaActual = "02/03/2007";	
	echo "<hr> <div align=\"center\">Resumen hecho el " . cadenafecha($fechaActual) . " </div>";
?>
</body>
</html>
