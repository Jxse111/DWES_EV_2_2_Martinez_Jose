<?php

//Funcion que suma los articulos y si el pais es distinto a España añade el incremento de precio
function sumaArticulos($articulos, $nombrePais) {
    $precioIncrementoFueraEspaña = 10.00;
    $resultadoSuma = 0;
    foreach ($articulos as $articulo) {
        switch ($articulo) {
            case "CableHdmi" : $precio = 6.79;
                break;
            case "CableRj45" : $precio = 69.00;
                break;
            case "ConectorRj45" : $precio = 12.09;
                break;
            case "Switch4p" : $precio = 19.99;
                break;
            case "Switch8p" : $precio = 29.99;
                break;
        }
        $resultadoSuma += $precio;
        //No me incrementa el valor del precio en caso de que sea otro país
        if ($nombrePais != "España") {
            $resultadoSuma += $precioIncrementoFueraEspaña;
        }
    }
    return $resultadoSuma;
}
