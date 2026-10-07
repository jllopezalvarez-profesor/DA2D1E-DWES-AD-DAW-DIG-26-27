<?php
// Iniciar / recuperar sesión
session_start();

// Ver si es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener nombre y valor de la variable de sesión
    $sessionVariableName = $_POST['sessionVariableName'];
    $sessionVariableValue = $_POST['sessionVariableValue'];

    // Fijar variable de sesión
    $_SESSION[$sessionVariableName] = $sessionVariableValue;

    // Fijar última vez que se modificó la sesión
    $_SESSION['ultima-modificacion'] = time();
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script para fijar una variable de sesión</title>
</head>


<body>
    <h1>Script para fijar una variable de sesión</h1>
    <form method="post">
        <p><label>Nombre de la variable: </label> <input type="text" name="sessionVariableName"> </p>
        <p><label>Valor de la variable: </label> <input type="text" name="sessionVariableValue"> </p>
        <p><button type="submit">Fijar variable</button></p>
    </form>

    <p>variables fijadas: </p>
    <ul>
        <?php foreach ($_SESSION as $variableName => $variableValue): ?>
            <li><?= $variableName ?>: <?= $variableValue ?></li>

        <?php endforeach ?>

    </ul>

    <p> Última vez que se modificó la sesión en esta página: <?= $_SESSION['ultima-modificacion'] ?? 'No definido' ?> </p>


</body>

</html>