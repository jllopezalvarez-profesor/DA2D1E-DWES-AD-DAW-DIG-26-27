<!DOCTYPE html>
<html lang="es">
<?php
$numero = 7;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar del número <?= $numero ?> (en lista)</title>
</head>

<body>
    <h1>Tabla de multiplicar del número <?= $numero ?> (en lista)</h1>

    <h2>Sin generar los tags HTML desde PHP</h2>

    <ul>
        <?php for ($numero2 = 0; $numero2 <= 10; $numero2++): ?>
            <li><?= "$numero x $numero2 = " . $numero * $numero2 ?></li>
        <?php endfor ?>
    </ul>

    <h2>Generando los tags HTML desde PHP</h2>

    <?php
    echo "<ul>";
    for ($numero2 = 0; $numero2 <= 10; $numero2++) {
        echo "<li>" . $numero . " x " . $numero2 . " = " . $numero * $numero2 . "</li>";
    }
    print("</ul>");
    ?>








</body>

</html>