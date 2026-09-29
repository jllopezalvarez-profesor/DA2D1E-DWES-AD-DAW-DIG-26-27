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
            <fieldset class="form-group">
                <legend class="form-label">Configura tu pizza</legend>
                <fieldset class="form-group">
                    <legend class="form-label">Elige el tipo de masa</legend>
                    <?php foreach ($TIPOS_MASA as $controlValue => $text): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                value="<?= $controlValue ?>" id="tm-<?= $controlValue ?>" name="tipoMasa"
                                <?php // echo $value == 'SG' ? 'checked' : '' 
                                ?> required>
                            <label class="form-check-label" for="tm-<?= $controlValue ?>"><?= $text ?></label>
                        </div>
                    <? endforeach ?>
                </fieldset>
                <label class="form-label" for="tamanio">Tamaño</label>
                <select class="form-select" id="tamanio" name="tamanio" required>
                    <option value="">Selecciona un tamaño</option>
                    <?php foreach ($TAMANIOS as $controlValue => $text): ?>
                        <option value="<?= $controlValue ?>"><?= $text ?></option>
                    <?php endforeach ?>
                </select>

                <label class="form-label" for="base">Pizza base</label>
                <select class="form-select" id="base" name="base" required>
                    <option value="">Selecciona una pizza base</option>
                    <?php foreach ($BASES as $controlValue => $text): ?>
                        <option value="<?= $controlValue ?>"><?= $text ?></option>
                    <?php endforeach ?>
                </select>


                <fieldset class="form-group">
                    <legend class="form-label">Elige ingredientes adicionales</legend>
                    <?php foreach ($INGREDIENTES as $controlValue => $text): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                value="<?= $controlValue ?>" id="ig-<?= $controlValue ?>" name="ingredientes[]">
                            <label class="form-check-label" for="ig-<?= $controlValue ?>"><?= $text ?></label>
                        </div>
                    <? endforeach ?>
                </fieldset>



                o Seleccionar la pizza base (obligatorio y sólo se podrá seleccionar una base):
                 Margarita (M)
                 Barbacoa (BBQ)
                 Cuatro quesos (4Q)
                o Seleccionar ingredientes adicionales (opcional, se podrá seleccionar todos los que se deseen, o ninguno)
                 Pimiento (IA-PI)
                 Cebolla (IA-CE)
                 Carne picada (IA-CP)
                 Pollo (IA-PL)
                 Berenjena (IA-BE)
                 Extra de queso (IA-XQ)
                 Salsa barbacoa (IA-BBQ)

            </fieldset>

            <fieldset>
                <legend>Danos tus datos</legend>

                Nombre
                o Apellidos
                o Dirección completa
                o Teléfono
                o Observaciones (puede ser un texto largo)
            </fieldset>

            <fieldset>
                <legend>Pago</legend>
                Tarjeta bancaria (T)
                o Bizum (B)
                o PayPal (P)
            </fieldset>



            <button type="submit">Enviar</button>

        </form>

    </div>




</body>

</html>