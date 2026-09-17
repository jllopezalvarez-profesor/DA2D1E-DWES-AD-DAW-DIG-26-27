<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de coparaciones</title>
</head>
<body>
    <h1>Ejemplo de comparaciones</h1>

    <?php
    $numero = 10;
    $cadena = "10";

    $sonIguales = $numero == $cadena;
    $sonIgualesEstricto = $numero === $cadena;

    ?>

    <p><?="La variable numero vale '$numero' y la variable cadena vale '$cadena'."?></p>
    <p>¿Son iguales usando ==? <?=$sonIguales?><p>
    <p>¿Son iguales usando ===? <?=$sonIgualesEstricto?><p>
    <p>sonIgualesEstricto no muestra valor porque en PHP el falso y el vacío son a veces equivalentes</p>
        
    
</body>
</html>