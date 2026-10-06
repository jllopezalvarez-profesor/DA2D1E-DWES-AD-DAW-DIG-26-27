<?php
include_once 'common.php';

// Averiguar si es la primera vez que se carga el formulario (GET)
// o si es la segunda o sucesivas (POST)
$esPost = $_SERVER['REQUEST_METHOD'] === 'POST';

// Array para errores
$errores = [];

// Inicializar variables de parámetros para que no fallen en GET
$tipoMasa = '';
$tamanio = '';
$base = '';
$ingredientes = [];
$nombre = '';
$apellido = '';
$direccion = '';
$telefono = '';
$email = '';
$comentarios = '';
$metodoPago = '';

// Validar datos, solo se hace en POST, porque si no 
// es POST, es que no se han enviado datos
if ($esPost) {

    // Obtener y validar tipo de masa, si no se ha recibido el parámetro, usar null.
    $tipoMasa = $_POST['tipoMasa'] ?? null;
    if (empty($tipoMasa) || !array_key_exists($tipoMasa, $TIPOS_MASA)) {
        $errores[] = 'No se ha seleccionado tipo de masa o el tipo seleccionado no es correcto.';
    }

    // Obtener y validar tamaño
    $tamanio = $_POST['tamanio'] ?? null;
    if (empty($tamanio) || !array_key_exists($tamanio, $TAMANIOS)) {
        $errores[] = 'No se ha seleccionado el tamaño o no es válido.';
    }

    // Obtener y validar pizza base 
    $base = $_POST['base'] ?? null;
    if (empty($base) || !array_key_exists($base, $BASES)) {
        $errores[] = 'No se ha seleccionado pizza base o no es válida.';
    }

    // Obtener y validar ingredientes adicionales
    // $ingredientes = $_POST['ingredientes[]']; // ERROR, no se usan los corchetes
    $ingredientes = $_POST['ingredientes'] ?? []; // Si no llega nada, array vacío.
    // Se usa una función (está en comon.php) para simplificar el código aquí, 
    // evitando un doble bucle, que se oculta al estar en la función.
    if (!ingredientesSonValidos($ingredientes, $INGREDIENTES)) {
        $errores[] = "Al menos algún ingrediente adicional no es válido";
    }

    // Obtener y validar nombre
    $nombre = trim($_POST['nombre'] ?? '');
    if ($nombre === '') { // Alternativamente, se podría usar strlen para comprobar longitud
        $errores[] = 'El nombre es obligatorio.';
    }

    // Obtener y validar apellido
    $apellido = trim($_POST['apellido'] ?? '');
    if ($apellido === '') { // De nuevo se podría usar strlen
        $errores[] = 'Los apellidos son obligatorios.';
    }

    // Obtener y validar dirección
    $direccion = trim($_POST['direccion'] ?? '');
    if ($direccion === '') {
        $errores[] = 'La dirección completa es obligatoria.';
    }

    // Obtener y validar teléfono
    $telefono = trim($_POST['telefono'] ?? '');
    if ($telefono === '') {
        $errores[] = 'El teléfono es obligatorio.';
    } elseif (!preg_match('/^[0-9\s\+\-\(\)]{9,15}$/', $telefono)) { // Validación con expresión regular del formato del teléfono
        $errores[] = 'El formato del teléfono no es válido.';
    }

    // Obtener y validar email. No se usa directamente filter_input para poder 
    // mostrar mensajes de error distintos si falta o si no tiene formato correcto.
    $email = trim($_POST['email'] ?? '');
    if ($email === '') {
        $errores[] = 'El campo email es obligatorio.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El formato del email no es válido.';
    }

    // Observaciones. Es opcional, pero alicamos un trim
    $comentarios = trim($_POST['comentarios'] ?? '');
    // Pero htmlspecialchars no se debe usar al recibir, datos, sino al mostrarlos.
    // si se usa al recibir, las tildes, por ejemplo, se guardan codificadas. 
    // Esto haría que no se pudieran usar en otros escenarios, como para informes generados con algo que no sea web.
    // $comentarios = htmlspecialchars($comentarios)


    // Obtener y validar método de pago.
    $metodoPago = $_POST['metodoPago'] ?? null;
    if (empty($metodoPago) || !array_key_exists($metodoPago, $OPCIONES_PAGO)) {
        $errores[] = 'No se ha seleccionado método de pago o el seleccionado no es correcto.';
    }
}

$hayErrores = !empty($errores);



?>





<!DOCTYPE html>
<html lang="es">



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

        <?php
        // El formulario se muestra si:
        // - Es GET (no es POST)
        // - Es POST, pero ha habido errores
        ?>

        <?php if (!$esPost || $hayErrores): ?>

            <?php if ($hayErrores): ?>
                <div class="alert alert-danger">
                    <p>Hay errores:</p>
                    <ul>
                        <?php foreach ($errores as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <? endif ?>


            <form method="post" novalidate>
                <!-- Añadido borde para agrupar visualmente  -->
                <fieldset class="mb-3 border p-3 rounded">

                    <!-- Tamaño h5/fs-5 para jerarquía, y eliminar flotado para que se coloque en su sitio natural -->
                    <!-- También ancho automático y ajustes de páding y negrita -->
                    <legend class="float-none w-auto px-2 fs-5 fw-bold pb-2">Configura tu pizza</legend>

                    <!-- Fila para organizar los elementos de configuración en grid -->
                    <div class="row">

                        <!-- Tipo de masa: Ocupa todo en móvil, la mitad en pantallas medianas o más -->
                        <div class="col-12 col-md-6 mb-3">
                            <fieldset class="mb-0">
                                <legend class="fs-6">Elige el tipo de masa</legend>
                                <?php foreach ($TIPOS_MASA as $controlValue => $text): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            value="<?= $controlValue ?>" id="tm-<?= $controlValue ?>" name="tipoMasa"
                                            required <?= $tipoMasa === $controlValue ? 'checked' : ''  ?>>
                                        <label class="form-check-label" for="tm-<?= $controlValue ?>"><?= $text ?></label>
                                    </div>
                                <?php endforeach ?>
                            </fieldset>
                        </div>

                        <!-- Columna derecha para Tamaños y Bases agrupados -->
                        <div class="col-12 col-md-6">
                            <!-- Tamaño -->
                            <div class="mb-3">
                                <label class="form-label" for="tamanio">Tamaño</label>
                                <select class="form-select" id="tamanio" name="tamanio" required>
                                    <option value="">Selecciona un tamaño</option>
                                    <?php foreach ($TAMANIOS as $controlValue => $text): ?>
                                        <option value="<?= $controlValue ?>" <?= $tamanio === $controlValue ? 'selected' : '' ?>><?= $text ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <!-- Pizza base -->
                            <div class="mb-3">
                                <label class="form-label" for="base">Pizza base</label>
                                <select class="form-select" id="base" name="base" required>
                                    <option value="">Selecciona una pizza base</option>
                                    <?php foreach ($BASES as $controlValue => $text): ?>
                                        <option value="<?= $controlValue ?>" <?= $base === $controlValue ? 'selected' : '' ?>><?= $text ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <!-- Ingredientes adicionales: Ocupa todo el ancho en la parte 
                     inferior de la configuración, pero dentro se usa flex para ajustar -->
                        <div class="col-12 mb-3">
                            <fieldset class="mb-0">
                                <legend class="fs-6">Elige ingredientes adicionales</legend>
                                <!-- Contenedor flex: en móvil columna (flex-column), en md+ fila (flex-md-row) con wrap -->
                                <div class="d-flex flex-column flex-md-row flex-wrap gap-2">
                                    <?php foreach ($INGREDIENTES as $controlValue => $text): ?>
                                        <div class="form-check">
                                            <?php
                                            // Para cada checkbox de ingrediente, comprobar si el valor asociado a ese
                                            // checkbox está en los ingredientes que mandó el usuario. Si está, se añade
                                            // el atributo checked al checkbox
                                            ?>
                                            <input class="form-check-input" type="checkbox"
                                                value="<?= $controlValue ?>" id="ig-<?= $controlValue ?>" name="ingredientes[]"
                                                <?= in_array($controlValue, $ingredientes) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="ig-<?= $controlValue ?>"><?= $text ?></label>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-3 border p-3 rounded">
                    <!-- Tamaño h5/fs-5 para jerarquía, y eliminar flotado para que se coloque en su sitio natural -->
                    <legend class="float-none w-auto px-2 fs-5 fw-bold">Datos de entrega</legend>


                    <!-- Grid de 2 columnas para los datos personales y de contacto -->
                    <div class="row">

                        <!-- Nombre -->
                        <div class="col-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required value="<?= $nombre ?>">
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="col-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" required value="<?= $apellido ?>">
                            </div>
                        </div>

                        <!-- Dirección completa (Ancho completo para dar espacio a la calle/número) -->
                        <div class="col-12 mb-3">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección completa</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" required value="<?= $direccion ?>">
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="col-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" required value="<?= $telefono ?>">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-12 col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="abc@mail.com" required value="<?= $email ?>">
                            </div>
                        </div>

                        <!-- Observaciones (Ancho completo) -->
                        <div class="col-12 mb-3">
                            <div class="mb-3">
                                <label for="comentarios" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="comentarios" id="comentarios"><?= $comentarios ?></textarea>
                            </div>
                        </div>

                    </div>

                </fieldset>

                <fieldset class="mb-3 border p-3 pt-0 rounded">
                    <!-- Tamaño h5/fs-5 para jerarquía, y eliminar flotado para que se coloque en su sitio natural -->
                    <legend class="float-none w-auto px-2 fs-5 fw-bold">Método de pago</legend>

                    <!-- Grid para repartir las opciones de pago en varias columnas si hay varias en los controles anteriores -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-column flex-md-row flex-wrap gap-2">
                                <?php foreach ($OPCIONES_PAGO as $controlValue => $text): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            value="<?= $controlValue ?>" id="mp-<?= $controlValue ?>" name="metodoPago" required
                                            <?= $controlValue === $metodoPago ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="mp-<?= $controlValue ?>"><?= $text ?></label>
                                    </div>
                                <? endforeach ?>
                            </div>
                        </div>
                    </div>
                </fieldset>


                <!-- Ancho completo en móviles, centrado/automático a partir de pantallas medianas (md) -->
                <div class="mb-3 d-grid d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-primary">Realizar el pedido</button>
                </div>
            </form>

        <?php else: ?>
            <p>Gracias por realizar tu pedido. Aquí lo tienes:</p>
            <ul>
                <!-- Configuración de la pizza (traduciendo claves por su valor legible) -->
                <li><strong>Tipo de masa:</strong> <?= htmlspecialchars($TIPOS_MASA[$tipoMasa]) ?></li>
                <li><strong>Tamaño:</strong> <?= htmlspecialchars($TAMANIOS[$tamanio]) ?></li>
                <li><strong>Pizza base:</strong> <?= htmlspecialchars($BASES[$base]) ?></li>

                <!-- Ingredientes adicionales (mapeando el array de checkboxes) -->
                <li><strong>Ingredientes adicionales:</strong>
                    <?php
                    if (!empty($ingredientes)) {
                        $textosIngredientes = array_map(fn($i) => $INGREDIENTES[$i], $ingredientes);
                        echo htmlspecialchars(implode(', ', $textosIngredientes));
                    } else {
                        echo 'Ninguno';
                    }
                    ?>
                </li>

                <!-- Datos de entrega -->
                <li><strong>Nombre:</strong> <?= htmlspecialchars($nombre . ' ' . $apellido) ?></li>
                <li><strong>Dirección:</strong> <?= htmlspecialchars($direccion) ?></li>
                <li><strong>Teléfono:</strong> <?= htmlspecialchars($telefono) ?></li>
                <li><strong>Email:</strong> <?= htmlspecialchars($email) ?></li>

                <?php if (!empty($comentarios)): ?>
                    <li><strong>Observaciones:</strong> <?= htmlspecialchars($comentarios) ?></li>
                <?php endif; ?>

                <!-- Método de pago -->
                <li><strong>Método de pago:</strong> <?= htmlspecialchars($OPCIONES_PAGO[$metodoPago]) ?></li>
            </ul>
        <?php endif ?>



    </div>
</body>

</html>