<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de if</title>
</head>
<body>
    <h1>Ejemplo de if</h1>
    <?php
    $aleatorio = rand($max=10, $min=0);
    ?>

    <p>El valor aleatorio generado es <?=$aleatorio?>.</p>

    <p> Calculado con un bloque de código + echo </p>
    <p>
        <?php
        if ($aleatorio < 3) {
            echo "El valor es menor que 3";
        } else if ($aleatorio > 7) {
            echo "El valor es mayor que 7";
        } else {
            echo "El valor está entre tres y siete (incluidos)";
        }

        ?>
    </p>

    <p> Calculado con bloques de código generando párrafos </p>

    <?php 
    if($aleatorio < 3) { ?>
        <p>El valor es menor que 3</p>
    <?php
    } elseif ($aleatorio > 7) { ?>
        <p>El valor es mayor que 7</p>
    <?php 
    } else { ?>
        <p>El valor está entre tres y siete (incluidos)</p>
    <?php 
    } ?>


    <p> Calculado con notación inline HTML para bloques de código </p>

    <?php if($aleatorio < 3): ?>
        <p>El valor es menor que 3</p>
    <?php elseif ($aleatorio > 7): ?>
        <p>El valor es mayor que 7</p>
    <?php else: ?>
        <p>El valor está entre tres y siete (incluidos)</p>
    <?php endif ?>
    
    <?php
    $otracosa=3;
    ?>


</body>
</html>