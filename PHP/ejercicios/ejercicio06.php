<!DOCTYPE html>

<?php

// var_dump($_POST['min']);
// print("<br>");
// var_dump($_POST['max']);
// print("<br>");
// // print($_POST['min'] * $_POST['max']);

// echo 'isset($_POST[\'min\']) -> ' . isset($_POST['min']);
// echo "<br>";
// echo 'empty($_POST[\'min\']) -> ' . empty($_POST['min']);
// echo "<br>";


// echo 'isset($_POST[\'pruebaCheckBox\']) -> ' . isset($_POST['pruebaCheckBox']);
// echo "<br>";
// echo 'empty($_POST[\'pruebaCheckBox\']) -> ' . empty($_POST['pruebaCheckBox']);
// echo "<br>";
// exit(0);


?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar entre dos números</title>
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
        <h1>Tabla de multiplicar entre dos números</h1>
        <?php
        $minNumber = filter_var($_POST['min'], FILTER_VALIDATE_INT);
        $maxNumber = filter_var($_POST['max'], FILTER_VALIDATE_INT);
        ?>
        <?php if (!$minNumber || !$maxNumber): ?>
            <p>Alguno de los dos valores introducidos no es un número entero</p>

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