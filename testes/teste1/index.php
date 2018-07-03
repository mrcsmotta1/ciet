<?php

print arrayPaisesECapitais();

//metodo que tem os países e suas capitias
function arrayPaisesECapitais()
{
    $location = array(
        "Brasil" => "Brasilia",
        "EUA​" => "Washington",
        "Espanha​" => "Madrid",
        "Itália" => "Roma",
        "Japão" => "Tóquio"
    );
    
    //orderna o array pelo valor
    asort($location);
    
    //inicio a variavel vazia
    $result = "";
    
    //insiro o texto que sera exibido
    foreach ($location as $key => $value) {
        $result .= "A capital do {$key} é {$value}. <br>";
    }
    
    return $result;
    
}