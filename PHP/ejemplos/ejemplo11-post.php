<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de POST en PHP</title>
</head>

<body>
    <h1>Ejemplo de array asociativo $_POST</h1>

    <h2>Datos recibidos en POST</h2>
    <ul>
        <?php foreach ($_POST as $parametro => $valor): ?>
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
    <p>Valor recibido en 'nombre': <?= $_POST['nombre'] ?></p>

    <h2>Comidas recibidas:</h2>
    <p>Valor de comidas recibidas: <?= implode(", ", $_POST['comida']) ?></p>




</body>

</html>