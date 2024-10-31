<?php

//Funcion que suma los articulos y si el pais es distinto a España añade el incremento de precio
function sumaArticulos($articulos, $nombrePais) {
    $precioIncrementoFueraEspaña = 10.00;
    $resultadoSuma = 0;
    foreach ($articulos as $articulo) {
        switch ($articulo) {
            case "Cable HDM" : $precio = 6.79;
                break;
            case "Cable rj45 cat6 bobina" : $precio = 69.00;
                break;
            case "Conector rj45 100ud" : $precio = 12.09;
                break;
            case "Switch 4 puertos" : $precio = 19.99;
                break;
            case "Switch 8 puertos" : $precio = 29.99;
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
