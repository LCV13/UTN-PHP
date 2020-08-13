html>
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
	function crearArchivos(){
    $archivo = fopen("Clientes.txt", w);
    $cliente = "Pereyra,juan,cap. federal,4526-9865,126,3\n";
    fwrite($archivo, $cliente, strlen($cliente));
    $cliente = "Diaz,pedro,haedo,3356-5899,1220,\n";
    fwrite($archivo, $cliente, strlen($cliente));
    $cliente = "Fernandez,martín,cap. federal,4525-5666,1178,2\n";
    fwrite($archivo, $cliente, strlen($cliente));
    fclose($archivo);		
}

function cargarDatos(){
    global $clientes, $gastos, $clieimp, $cantcuo;
    $archivo = fopen("Clientes.txt", r);
    $i=0;
    while(($linea = fgets($archivo, 4096))!=null){
        list($clientes[$i]["Apellido"],$clientes[$i]["Nombre"],
            $clientes[$i]["Localidad"],$clientes[$i]["Tel"],
            $gastos[$i],$ccuotas) = split(",", $linea);
        
        if($ccuotas>0){
            $cantcuo[$i]=$ccuotas;
            $clieimp[$i]=$clientes[$i]["Apellido"];
        }
        $i++;
    }
    fclose($archivo);
}
	
	function prepararDirectorio($nombreDirectorio){
		$nombreDirectorio = getcwd() . "/" . $nombreDirectorio;

		if(is_dir($nombreDirectorio)){
			chdir("datos");
			$directorio = opendir("datos");
			while(($archivo = readdir($directorio))!=null){
				if($archivo <> "." && $archivo <>"..")
					unlink("" . $archivo);
			}
			closedir($directorio);
			chdir("..");
			rmdir($nombreDirectorio);
		}
		mkdir($nombreDirectorio,0);
	}
	
	prepararDirectorio("datos");
	crearArchivos();
	cargarDatos();

	for($indice=0; $indice<count($clientes); $indice++)
		formatCliente($indice);
		
	/* Mostramos el texto Clientes del mes de */
	define("TEX1","Clientes del mes de ");
	echo TEX1;
	
	/* MARZO */
	$mostrarMes = 3;
	echo mes($mostrarMes);
	
/*Mostrar numeros y clientes*/
$var="Funcion_clientes";
$var($clientes, $gastos, $clieimp, $cantcuo);
	
	/*El gasto del mejor cliente */
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
