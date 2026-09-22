<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de GET en PHP</title>
</head>

<body>
    <h1>Ejemplo de array asociativo $_GET</h1>

    <h2>Enlaces de prueba</h2>
    <p><a href="ejemplo09-get.php?nombre=Juan&edad=20">Ejemplo que pasa el nombre "Juan" y la edad "20" como parámetros</a></p>


    <h2>Datos recibidos en GET</h2>
    <ul>
        <?php foreach ($_GET as $parametro => $valor): ?>
            <li>
                <?php
                echo "Parámetro: $parametro - Valor: ";
                if (is_array($valor)) {
                    echo implode(', ', $valor);
                } else {
                    echo $valor;
                }
                ?>
            <?php endforeach ?>
    </ul>

    <h2>Probar si llega el nombre</h2>
    <p>Valor recibido en 'nombre': <?= $_GET['nombre'] ?></p>




</body>

</html>