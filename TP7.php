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

/* Array clientes*/
$clientes[0]["Apellido"]="pereyra";
$clientes[0]["Nombre"]="juan";
$clientes[0]["Localidad"]="cap. federal";
$clientes[0]["Tel"]="4526-9865";

$clientes[1]["Apellido"]="diaz";
$clientes[1]["Nombre"]="pedro";
$clientes[1]["Localidad"]="haedo";
$clientes[1]["Tel"]="3356-5899";

$clientes[2]["Apellido"]="fernandez";
$clientes[2]["Nombre"]="martín";
$clientes[2]["Localidad"]="cap. federal";
$clientes[2]["Tel"]="4525-5666";


for($indice=0; $indice<count($clientes); $indice++)
    formatCliente($indice);

/*Array gastos*/
$gastos = array (126,1220,1178);

/* Array clientes - cuotas impagas*/
$clieimp = array (2 => "Fernandez", 0 => "Pereyra");

/*cuotas impagas*/
$cantcuo = array(0 => 3,2 => 2);


/* Mostrar texto Clientes del mes de */
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
?>

</body>
</html>