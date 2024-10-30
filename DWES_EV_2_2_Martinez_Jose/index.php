<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DWES_EV_2_2_Jose_Martinez</title>
    </head>
    <body>
        <?php
        require_once './funcionesValidacion.php';
        require_once './funciones.php';
        $listaArticulos = "";
        $mensajeError = "";
        $nombrePaisSinFiltrar = filter_input(INPUT_GET, "nombrePais");
        $articulosSinFiltrar = filter_input(INPUT_GET, "Artículos", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        $conjuntoCampos = $nombrePaisSinFiltrar && $articulosSinFiltrar;

        if ($conjuntoCampos) {
            $nombrePais = validarPais($nombrePaisSinFiltrar);
            $articulos = validarProductos($articulosSinFiltrar);

            $camposValidados = $nombrePais && $articulos;
            if ($camposValidados) {
                $listaArticulos = "<ol>";
                foreach ($articulos as $articulo) {
                    $listaArticulos .= "<li>" . ($articulo) . "</li>";
                }
                $listaArticulos .= "</ol>";
            } else {
                $mensajeError = "ERROR: Los campos están vacíos o no son correctos.";
            }
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?> " method="get">
            <label>Introduce país del envío: <input type="text" name="nombrePais" value="<?php if (filter_has_var(INPUT_GET, "nombrePais")) echo $nombrePaisSinFiltrar ?>"></label><br><br>
            <table style="align: center; text-align: left;" border="1px">
                <tbody>
                    <tr>
                        <th>Seleccionar</th>
                        <th>Artículo</th>
                        <th>Precio</th>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="Artículos[]" value="CableHdmi" <?php if (isset($articulosSinFiltrar) && in_array("CableHdmi", $articulosSinFiltrar)) echo 'checked'; ?>></td>
                        <td>Cable HDMI</td>
                        <td>6.79€</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="Artículos[]" value="CableRj45" <?php if (isset($articulosSinFiltrar) && in_array("CableRj45", $articulosSinFiltrar)) echo 'checked'; ?>></td>
                        <td>Cable rj45 cat6 bobina</td>
                        <td>69.00€</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="Artículos[]" value="ConectorRj45" <?php if (isset($articulosSinFiltrar) && in_array("ConectorRj45", $articulosSinFiltrar)) echo 'checked'; ?>></td>
                        <td>Conector rj45 100ud</td>
                        <td>12.09€</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="Artículos[]" value="Switch4p" <?php if (isset($articulosSinFiltrar) && in_array("Switch4p", $articulosSinFiltrar)) echo 'checked'; ?>></td>
                        <td>Switch 4 puertos</td>
                        <td>19.99€</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="Artículos[]" value="Switch8p" <?php if (isset($articulosSinFiltrar) && in_array("Switch8p", $articulosSinFiltrar)) echo 'checked'; ?>></td>
                        <td>Switch 8 puertos</td>
                        <td>29.99€</td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <button type="submit" name="enviar">Enviar</button><br><br>
            <?php if ($mensajeError) { ?>
                <p><?php echo $mensajeError; ?></p>
            <?php } else if ($conjuntoCampos) { ?>
                <p>Lista de la compra realizada:</p>
                <?php echo $listaArticulos; ?>
                <p>Total a pagar :<?php echo sumaArticulos($articulos, $nombrePais) ?>€ </p><br><br>
                <button type="submit" name="enviar">Pasar a dólares</button><br><br> <!-- Me falta realizar el paso a dólares -->
            <?php } ?>
        </form>

    </body>
</html>
