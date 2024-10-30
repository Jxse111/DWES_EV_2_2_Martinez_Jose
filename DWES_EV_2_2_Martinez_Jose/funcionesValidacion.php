<?php

require_once './patrones.php';

// Funcion de validacion de cadena
function validarCadena($cadena) {
    $cadena = trim($cadena);
    $cadena = stripcslashes($cadena);
    $cadena = strip_tags($cadena);
    $cadena = htmlspecialchars($cadena);
    return $cadena;
}

//Funcion que valida el pais
function validarPais($nombrePais) {
    global $patronPais;
    $nombrePais = validarCadena($nombrePais);
    $esValido = preg_match($patronPais, $nombrePais);
    return $esValido ? $nombrePais : $nombrePais = "España";
}

// Funcion de validacion de articulos
function validarProductos($articulos) {
    $articulosValidos = ["CableHdmi", "CableRj45", "ConectorRj45", "Switch4p", "Switch8p"];
    if (is_array($articulos)) {
        $resultado = array_intersect($articulos, $articulosValidos);
        return $resultado ? $resultado : false; // Retorna los artículos válidos o false si no hay
    }
}
