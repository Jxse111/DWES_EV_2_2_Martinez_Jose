<?php

//Funcion que suma los articulos y si el pais es distinto a España añade el incremento de precio
function sumaArticulos($articulos, $nombrePais) {
    $listaProductos;
    $precioIncrementoFueraEspaña = 10.00;
    $resultadoSuma = 0;
    foreach ($articulos as $articulo) {
        $listaProductos = ["hdmi" => 6, 79, "cableRj45" => 69.00, "conectorRj45" => 12.09, "switch4p" => 19.99, "switch8p"];
        switch ($articulo) {
            case "Cable HDM" : $precio = $listaProductos["hdmi"];
                break;
            case "Cable rj45 cat6 bobina" : $precio = $listaProductos["cableRj45"];
                break;
            case "Conector rj45 100ud" : $precio = $listaProductos["conectorRj45"];
                break;
            case "Switch 4 puertos" : $precio = $listaProductos["switch4p"];
                break;
            case "Switch 8 puertos" : $precio = $listaProductos["switch8p"];
                break;
        }
        $resultadoSuma += $precio;
        if ($nombrePais != "España") {
            $resultadoSuma += $precioIncrementoFueraEspaña;
        }
    }
    return $resultadoSuma;
}

function suma($numero, $numero2) {
    return $numero + $numero2;
}

function resta($numero, $numero2) {
    return $numero - $numero2;
}

function multiplicacion($numero, $numero2) {
    return $numero * $numero2;
}

function division($numero, $numero2) {
    return $numero / $numero2;
}
