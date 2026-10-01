<!DOCTYPE html>
<html lang="es">
<?php
include_once 'common.php';


$TIPOS_MASA = ['F' => 'Fina', 'G' => 'Gruesa', 'Q' => 'Borde relleno de queso', 'SG' => 'Sin gluten'];
$TAMANIOS = ['S' => 'Pequeña', 'M' => 'Mediana', 'L' => 'Grande', 'XL' => 'Gigante'];
$BASES = ['M' => 'Margarita', 'BBQ' => 'Barbacoa', '4Q' => 'Cuatro quesos'];
$INGREDIENTES = [
    'IA-PI' => 'Pimiento',
    'IA-CE' => 'Cebolla',
    'IA-CP' => 'Carne picada',
    'IA-PL' => 'Pollo',
    'IA-BE' => 'Berenjena',
    'IA-XQ' => 'Extra de queso',
    'IA-BBQ' => 'Salsa barbacoa'
];
$OPCIONES_PAGO = [
    'T' => 'Tarjeta bancaria',
    'B' => 'Bizum',
    'P' => 'PayPal'
];

?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Tu pedido de pizza</h1>

        <?php
        // Array para guardar mensajes de error que se van produciendo
        $errores = [];

        // Validar tipo de masa. 
        if (!isset($_POST['tipoMasa'])) {
            $errores[] = 'No se ha seleccionado tipo de masa.';
            // array_push($errores, 'No se ha seleccionado tipo de masa');
        } elseif (!array_key_exists($_POST['tipoMasa'], $TIPOS_MASA)) {

            $errores[] = 'El tipo de masa seleccionado no es correcto.';
        }




        // Validar parámetros y acumular errores
        ?>




        <?php if (count($errores) > 0): ?>

            <p>Hay errores:</p>
            <?php foreach ($errores as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach ?>

        <?php else: ?>

            <p>No hay errores. Mostrar el pedido.</p>

        <?php endif ?>














    </div>

</body>

</html>