<?php
    $nombre = "Jonathan";
    $edad = 26;
    $estatura = 1.72;


    define('PAIS', 'Colombia');

    echo $nombre . '<br>';
    echo $edad . '<br>';
    echo $estatura . '<br>';
    echo "Soy del país: " .PAIS;


    echo "<h3>Operadores Lógicos </h3>";

    $hoy_es_jueves = true;
    $estamos_en_Colombia = true;

    //Operador AND las dos deben ser verdaderas

    echo $hoy_es_jueves and $estamos_en_Colombia; // true = 1  false = 0
    echo '<br>';
    echo $hoy_es_jueves && $estamos_en_Colombia; 
    echo "<br>";

    // Operador OR -> || : Uno de los dos son true

    echo $hoy_es_jueves or $estamos_en_Colombia;
    echo "<br>";
    echo !$hoy_es_jueves || $estamos_en_Colombia;
    echo "<br>";
    echo !$hoy_es_jueves || !$estamos_en_Colombia;
    echo "--------------------- <br>";

    // Operador XOR -> A o B son true pero no ambos
    
    //Los dos verdaderos 
    echo $hoy_es_jueves xor $estamos_en_Colombia;
    echo "0 o 1 <br>";
    echo "El XOR : <br> " ;
    echo !$hoy_es_jueves xor $estamos_en_Colombia;

    










?>