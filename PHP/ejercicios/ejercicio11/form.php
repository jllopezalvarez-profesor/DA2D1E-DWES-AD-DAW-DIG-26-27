<?php

// Uso el tipado debil para poder usar booleans
// false significa que hay que usar el valor por defecto
$background = false;
$foreground = false;

$background_cookie_value = $_COOKIE["background"] ?? '';
if (!empty($background_cookie_value)) {
    $background = $background_cookie_value;
}
$foreground_cookie_value = $_COOKIE["foreground"] ?? '';
if (!empty($foreground_cookie_value)) {
    $foreground = $foreground_cookie_value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $background_form_value = $_POST['background'] ?? '';
    // Si está vacío no hay que cambiar el valor
    if (!empty($background_form_value)) {
        // Si no está hay que borrar / cambiar
        if ($background_form_value == '-----') {
            // Borrar cookie
            setcookie('background', '', time() - 3600);
            $background = false;
        } else {
            setcookie('background', $background_form_value, time() + 3600);
            $background = $background_form_value;
        }
    }

    $foreground_form_value = $_POST['foreground'] ?? '';
    // Si está vacío no hay que cambiar el valor
    if (!empty($foreground_form_value)) {
        // Si no está hay que borrar / cambiar
        if ($foreground_form_value == '-----') {
            // Borrar cookie
            setcookie('foreground', '', time() - 3600);
            $foreground = false;
        } else {
            setcookie('foreground', $foreground_form_value, time() + 3600);
            $foreground = $foreground_form_value;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias de colores de página</title>
    <style>
        .test-element {
            padding: 1em;
            font-size: 2em;
        }

        <?php if ($background !== false): ?>.test-element {
            background-color: <?= $background ?>;
        }

        <?php endif ?><?php if ($foreground !== false): ?>.test-element {
            color: <?= $foreground ?>;
        }

        <?php endif ?>
    </style>
</head>

<body>
    <h1>Ejemplo de uso de cookies para guardar preferencias de usuario</h1>

    <form method="post">

        <p><label>Color para el fondo del div de prueba:
                <select name="background">
                    <option value="">No cambiar el color preferido</option>
                    <option value="-----">Restaurar valor por defecto</option>
                    <option value="red">Rojo</option>
                    <option value="blue">Azul</option>
                    <option value="darkgray">Gris oscuro</option>
                </select>
            </label></p>
        <label>Color para el texto del div de prueba:
            <select name="foreground">
                <option value="">No cambiar el color preferido</option>
                <option value="-----">Restaurar valor por defecto</option>
                <option value="white">Blanco</option>
                <option value="lightgray">Gris claro</option>
                <option value="aquamarine">Aguamarina</option>
            </select>
        </label></p>

        <p><button type="submit">Enviar</button>

    </form>

    <p class="test-element">Elemento para demo de colores</p>

</body>

</html>