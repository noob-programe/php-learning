
<?php


    $total_letras =   strlen("Hola como estas? qué haces?");

    echo "<h2>Ejercicio tamaño de letras</h2>";


    if ($total_letras < 100){
        echo "El mensaje fue enviado existoasamente! ";

    }else {
        echo "No se he podido enviar el mensaje porque contiene "  .$total_letras . "letras";
    }


    $pais= "Estados  Unidos";
    echo "<h2>Ejercicio tamaño de letras</h2>";

    if ($pais == "Mexico" || $pais == "España" || $pais == "Colombia"){

        echo "Aqui se habla español";
    }else{

    echo "<br>En " .$pais . " se habla otro idioma";
    }

    echo "<h2>Ejercicio tamaño de letras</h2>";

    $edad = 19;

    if ($edad > 18 ){
        echo "Tiene ".$edad. "<br> Puedes entrar al club. 👽";
    }else if ($edad == 18 ){
        echo "<br>Usted tiene exacatamente " .$edad. " <br>Bienvenido a la vida adulta! 😈";
    }else{
        echo "<br>Tiene menos de 18, eres un pimpollo! 👀 ";
    }


    echo "<h2>Notas en la Aula! 📐 </h2>";

    $nota_clase = 2;

    if ($nota_clase < 3 ){
         echo "<p>Usted ha pedido la asignatura! 🤕<p/>";

    }else {
        echo "Pasaste! 💯";
    }

    //Forma más rapida

    echo"Forma rápida!";

    $nota = 3;

    echo ($nota > 4 ? 'Ganaste la asignatura' : 'Perdiste la asignatura <br>');


    echo "<h2><br>Comando SWITCH<br></h2>";


    $color_favorito = "verde";

    switch($color_favorito){
        case "rojo":
            echo "Tu color favorito es rojo";
            break;

        case "verde":
            echo "Tu color favorito es verde";
            break;

        case "azul":
            echo "Tu color favorito es azul";
            break;

        default:
            echo "Tu color no es ni rojo, ni azul, ni verde";
    }

    echo "<h3>Mi calculadora con SWITCH 🧮 </h3>";

    echo "¿Qué operación desea realizar?<br>";

    echo "Suma | Resta | División | Multiplicación 🧐 <br>";
    
    $operacion = "division";

    $a = 5;
    $b = 20;


    switch ($operacion){
        case "suma":
            $suma = $a + $b;
            echo $suma;
            break;

        case "resta":
            $resta = $a - $b;
            echo $resta;
            break;

        case "multiplicacion":
            $multiplicacion = $a * $b;
            echo $multiplicacion;
            break;

        case "division":
            $division = $a / $b;
            echo $division;
            break;
    }
?>





