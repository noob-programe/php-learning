<?php

echo "<h2>Ejercicio 1 : Números del 1 al 10 -- WHILE </h2>";
    $num = 0;

    while ($num <11 ){

        echo $num. '<br>';

        $num++;


    }


    echo "<h2>Ejercicio 2 : Números del 1 al 10 -- Do While </h2>";
    $i = 1;

    do{
        echo $i. '<br>';
        $i++;
    }while($i <=10);

    echo "<br>Fin de la instrucción! :) <br>";



   echo "<h2>Ejercicio 3 : Números del a al 10 -- For </h2>";


   for ($i = 1; $i <=12; $i++){
    echo $i. '<br>';
   }

   for ($i = 1; $i <=12; $i++){
    echo $i. " ";
   }

   echo "<h2> Ejercicio 4 : Pares y Fibonacci </h2>";

   echo "Números Pares " .'<br>';

   for($par = 0; $par <= 50; $par++){

    if($par % 2 ==0){
        echo $par. " ";
    }

   }


   echo "<h2>Fibonacci! 🍫 </h2>";

   
   $anterior = 0;
   $actual =1;


   for($i = 0; $i <=15; $i++){

   echo $anterior. "|";
   $siguiente = $anterior + $actual;

   $anterior = $actual;
   $actual = $siguiente;


   //primeros numeros: 0,1,1,2,3,5,8,13,21,34,55,89,144
    
   }


?>




