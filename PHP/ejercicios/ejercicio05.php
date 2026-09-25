<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar entre dos números</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        thead tr:first-child,
        tbody th:first-child {
            background-color: darkgreen;
            color: wheat;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Tablas de multiplicar entre dos números.</h1>

        <p><?php var_dump($_GET['min']) ?></p>

        <?php

        // Con filter_var, al acceder a $_GET['parametro'], 
        // si no existe este parámetro (no está en la query), lanza un warning
        // $minNumber = filter_var($_GET['min'], FILTER_VALIDATE_INT);
        // $maxNumber = filter_var($_GET['max'], FILTER_VALIDATE_INT);
        $minNumber = filter_input(INPUT_GET, 'min', FILTER_VALIDATE_INT);
        $maxNumber = filter_input(INPUT_GET, 'max', FILTER_VALIDATE_INT);
        ?>
        <?php if (!$minNumber || !$maxNumber): ?>
            <p class="alert alert-danger" role="alert">Alguno de los dos valores introducidos falta o no es un número entero</p>
        <?php elseif ($minNumber >= $maxNumber): ?>
            <p class="alert alert-danger" role="alert">Error en los números introducidos. El primero no puede ser mayor o igual que el segundo.</p>
        <?php else: ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"><!--Vacía--></th>
                        <?php for ($num1 = $minNumber; $num1 <= $maxNumber; $num1++): ?>
                            <th scope="col"><?= $num1 ?></th>
                        <?php endfor ?>
                    </tr>
                </thead>
                <tbody>

                    <?php for ($num2 = 0; $num2 <= 10; $num2++): ?>
                        <tr>
                            <th scope="row"><?= $num2 ?></th>
                            <?php for ($num1 = $minNumber; $num1 <= $maxNumber; $num1++): ?>
                                <th scope="col"><?= $num1 * $num2 ?></th>
                            <?php endfor ?>
                        </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</body>

</html>