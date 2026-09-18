<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de for</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <h1>Ejemplo de for</h1>
    <?php
    $inicio = rand(0, 5);
    $fin = rand(0, 10) + $inicio;
    ?>

    <div class="container-fluid">
    <p>Números que van del <?=$inicio?> al <?=$fin?>:</p>

    <?php if (!($fin > $inicio)):?>
    <p>El fin tiene que ser mayor que el inicio. No se pueden generar los números.</p>
    <?php else: ?>
    <ul>
        <?php 
        /*
        for($numero=$inicio; $numero <= $fin; $numero++){
            echo "<li>$numero</li>";

        }
        */
        ?>

        <?php for($numero=$inicio; $numero <= $fin; $numero++):?>
            <li><?=$numero?></li>
        <?php endfor ?>
    </ul>
    <?php endif ?>


    </div>

</body>
</html>