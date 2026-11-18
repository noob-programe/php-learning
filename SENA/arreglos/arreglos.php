<?php
//Vectores y matrices - Arreglos PHP
//                0       1           2       3
$color = array("azul", "verde", "negro", "marron");
echo "Color: " . $color[1];
echo "<br>";

//Inicializando array  - Indexado con número entero como posición

$estacion[0] = "primavera";
$estacion[1] = "verano";
$estacion[2] = "otoño";
$estacion[3] = "invierno";


echo "Estación: " . $estacion[2];
echo "<br>";
//Puedo poner sin el número y automaticamente se guardan en orden 
$ciudad[] = "Medellín";
$ciudad[] = "Bogotá";
$ciudad[] = "Cali";
$ciudad[] = "Choco";
echo "Ciudad: " . $ciudad[3];
echo "<br>";



//Array Asociativos por medio de cadenas de texto : similar a diccionario
//1. 
$registro[] = "100547986";
$registro[] = "Martinez Perez";
$registro[] = "Cra 144 78e 30";

//2. 
$registro["nombre"] = "Martinez Perez";
$registro["direccion"] = "Cra 144 78e 30";
$registro ["celular"] = "3001234567";

//3. 
$arreglo = array('Nombre' => "Juanita Alimaña", 'Edad' => "22", 'Dirección' => "Bogotá 35C");

echo "Edad: " . $arreglo["Edad"];
echo "<br>";


$colores_vehiculo = 
    array(
        'coche' => "rojo",
        'moto' => "verde",
        'avion' => "azul"
    );

echo $colores_vehiculo ['coche']; 
echo "<br>";

//Matrices Indexadas
    $valor [0][0] = 1;$valor [0][1] = 14; $valor [0][2] = 8; $valor [0][3] = 3; //[fila][columna]
    $valor [1][0] = 6;$valor [1][1] = 9; $valor [1][2] = 7; $valor [1][3] = 2; //[fila][columna]
    $valor [2][0] = 3;$valor [2][1] = 13; $valor [2][2] = 4; $valor [2][3] = 1; //[fila][columna]   
    

    //recorrido en la matriz 
    for ($i=0; $i<3; $i++){

        for ($j=0; $j <3; $j++){

            echo $valor[$i][$j]. " ";
        }
        echo "<br>";
    }
    

//Matrices Asociativas

$animal = array(
    array("Perro", "Gato"),
    array("Lombriz", "Aguila"),
    array("Murcielago", "Cocodrilo"),
    
);

print_r($animal);
echo "<br>";

var_dump($animal);
echo "<br>";



//Recorrido de un vector
$array[0] = 1;
$array[1] = 2;
$array[2] = 3;
$array[3] = 4;
$array[4] = 5;
$array[5] = 6;

for ($i =0; $i < count($array); $i++){
    echo $array[$i]. "<br>";
}

//Recorrido para array asociativos y generales FOREACH

$edades = array("Juan"=> '22', "María" => '33', "Joaco"=> '63');

foreach($edades as $clave => $valor){
    echo "Clave: ". $clave . "- Valor: ". $valor . "<br>";
}

//Ejercicios: 
//Números del 1 al 30 - sumatoria y promedio 
CONST SEMILLA = 22;
mt_srand(SEMILLA);

$numerosRandom = array();

for ($i=0; $i < 10  ; $i++){

    $numerosRandom[$i] = mt_rand(1, 30);


}

print_r($numerosRandom);

$suma = 0;

for($j=0; $j < count($numerosRandom); $j++){
    $numero = $numerosRandom[$j];

    $suma = $suma + $numero;
}

echo "<br>". $suma;

$promedio = $suma / count($numerosRandom);

echo "<br>". $promedio;


echo "<br>--------------------------<br>" ;

echo "<h4> Nuevo tema <h4>";






?> 