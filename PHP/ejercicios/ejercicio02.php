<!DOCTYPE html>
<?php
$num1 = 7;
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar (en tabla) del número <?= $num1 ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h1>Tabla de multiplicar (en tabla) del número <?= $num1 ?></h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Primer número</th>
                    <th scope="col">Segundo número</th>
                    <th scope="col">Producto</th>
                </tr>
            </thead>

            <tbody>
                <?php for ($num2 = 0; $num2 <= 10; $num2++): ?>
                    <tr>
                        <td><?= $num1 ?></td>
                        <td><?= $num2 ?></td>
                        <td><?= $num1 * $num2 ?></td>
                    </tr>
                <?php endfor ?>


            </tbody>

            <!-- <tfoot><tfoot> -->
        </table>

    </div>
</body>

</html>