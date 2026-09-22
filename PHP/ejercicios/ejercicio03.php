<!DOCTYPE html>
<?php
$minNumber = 3;
$maxNumber = 9;
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar de los números del <?= $minNumber ?> al <?= $maxNumber ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        thead th,
        tbody th:first-child {
            background-color: darkgreen;
            color: wheat;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Tabla de multiplicar de los números del <?= $minNumber ?> al <?= $maxNumber ?></h1>
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
    </div>
</body>

</html>