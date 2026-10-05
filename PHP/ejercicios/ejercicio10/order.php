<!DOCTYPE html>
<html lang="es">
<?php
include_once 'common.php';
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


        // Obtener y validar tipo de masa, si no se ha recibido el parámetro, usar null.
        $tipoMasa = $_POST['tipoMasa'] ?? null;
        if (empty($tipoMasa) || !array_key_exists($tipoMasa, $TIPOS_MASA)) {
            $errores[] = 'No se ha seleccionado tipo de masa o el tipo seleccionado no es correcto.';
        }

        // Alternativa: mensajes diferentes cuando no se ha recibido o cuando el valor es incorrecto. 
        // if (empty($tipoMasa)) {
        //     $errores[] = 'No se ha seleccionado tipo de masa.';
        //     // array_push($errores, 'No se ha seleccionado tipo de masa');
        // } elseif (!array_key_exists($tipoMasa, $TIPOS_MASA)) {
        //     $errores[] = 'El tipo de masa seleccionado no es correcto.';
        // }

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


        ?>

        <?php if (count($errores) > 0): ?>

            <div class="alert alert-danger">
                <p>Hay errores:</p>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>

            <div class="btn btn-info"><a href="form.php">Vuelve a intentarlo</a></div>

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