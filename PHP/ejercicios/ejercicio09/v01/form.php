<!DOCTYPE html>
<html lang="es">

<?php
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
    <title>Pide tu pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Pide tu pizza</h1>

        <form action="order.php" method="post">
            <!-- Añadido borde para agrupar visualmente  -->
            <fieldset class="mb-3 border p-3 rounded">

                <!-- Tamaño h5/fs-5 para jerarquía, y eliminar flotado para que se coloque en su sitio natural -->
                <!-- También ancho automático y ajustes de páding y negrita -->
                <legend class="float-none w-auto px-2 fs-5 fw-bold pb-2">Configura tu pizza</legend>

                <fieldset class="mb-3">
                    <!-- Más pequeño para igualarlo a label -->
                    <legend class="fs-6">Elige el tipo de masa</legend>
                    <?php foreach ($TIPOS_MASA as $controlValue => $text): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                value="<?= $controlValue ?>" id="tm-<?= $controlValue ?>" name="tipoMasa"
                                required>
                            <label class="form-check-label" for="tm-<?= $controlValue ?>"><?= $text ?></label>
                        </div>
                    <?php endforeach ?>
                </fieldset>

                <div class="mb-3">
                    <label class="form-label" for="tamanio">Tamaño</label>
                    <select class="form-select" id="tamanio" name="tamanio" required>
                        <option value="">Selecciona un tamaño</option>
                        <?php foreach ($TAMANIOS as $controlValue => $text): ?>
                            <option value="<?= $controlValue ?>"><?= $text ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="base">Pizza base</label>
                    <select class="form-select" id="base" name="base" required>
                        <option value="">Selecciona una pizza base</option>
                        <?php foreach ($BASES as $controlValue => $text): ?>
                            <option value="<?= $controlValue ?>"><?= $text ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <fieldset class="mb-3">
                    <!-- Más pequeño para igualarlo a label -->
                    <legend class="fs-6">Elige ingredientes adicionales</legend>
                    <?php foreach ($INGREDIENTES as $controlValue => $text): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="<?= $controlValue ?>" id="ig-<?= $controlValue ?>" name="ingredientes[]">
                            <label class="form-check-label" for="ig-<?= $controlValue ?>"><?= $text ?></label>
                        </div>
                    <?php endforeach ?>
                </fieldset>
            </fieldset>

            <fieldset class="mb-3 border p-3 rounded">
                <!-- Tamaño h5/fs-5 para jerarquía, y eliminar flotado para que se coloque en su sitio natural -->
                <legend class="float-none w-auto px-2 fs-5 fw-bold">Datos de entrega</legend>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección completa</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="abc@mail.com" required>
                </div>
                <div class="mb-3">
                    <label for="comentarios" class="form-label">Observaciones</label>
                    <textarea class="form-control" name="comentarios" id="comentarios"></textarea>
                </div>
            </fieldset>

            <fieldset class="mb-3 border p-3 pt-0 rounded">
                <!-- Tamaño h5/fs-5 para jerarquía, y eliminar flotado para que se coloque en su sitio natural -->
                <legend class="float-none w-auto px-2 fs-5 fw-bold">Método de pago</legend>
                <?php foreach ($OPCIONES_PAGO as $controlValue => $text): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                            value="<?= $controlValue ?>" id="mp-<?= $controlValue ?>" name="metodoPago" required>
                        <label class="form-check-label" for="mp-<?= $controlValue ?>"><?= $text ?></label>
                    </div>
                <? endforeach ?>
            </fieldset>


            <!-- Ancho completo en móviles, centrado/automático a partir de pantallas medianas (md) -->
            <div class="mb-3 d-grid d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary">Realizar el pedido</button>
            </div>

        </form>

    </div>




</body>

</html>