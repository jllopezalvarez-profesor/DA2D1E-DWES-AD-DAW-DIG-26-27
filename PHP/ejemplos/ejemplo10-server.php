<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de $_SERVER en PHP</title>
</head>

<body>
    <h1>Ejemplo de array asociativo $_SERVER</h1>

    <h2>Datos recibidos en $_SERVER</h2>
    <ul>
        <?php foreach ($_SERVER as $clave => $valor): ?>
            <li>
                <?php
                echo "Clave: $clave - Valor: ";
                if (is_array($valor)) {
                    echo implode(', ', $valor);
                } else {
                    echo $valor;
                }
                ?>
            <?php endforeach ?>
    </ul>
</body>

</html>