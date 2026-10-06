<?php
// Ver si es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener nombre y valor de la cookie
    $cookieName = $_POST['cookieName'];
    $cookieValue = $_POST['cookieValue'];
    $cookieTtl = filter_input(INPUT_POST, 'cookieTtl', FILTER_VALIDATE_INT, ['options' => ['default' => 0]]);

    // Fijar cookie
    setcookie($cookieName, $cookieValue, time() + $cookieTtl);

    // Como no se añade sola al array de cookies, añadirla
    // esto solo es necesario si necesito que la cookie esté 
    // en el array en la misma petición que la fija
    $_COOKIE[$cookieName] = $cookieValue;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script para fijar una cookie</title>
</head>


<body>
    <h1>Script para fijar una cookie</h1>
    <form method="post">
        <p><label>Nombre de la cookie: </label> <input type="text" name="cookieName"> </p>
        <p><label>Valor de la cookie: </label> <input type="text" name="cookieValue"> </p>
        <p><label>Cuánto tiempo se guarda (en segundos, si se pone un valor negativo, se borra la cookie): </label> <input type="text" name="cookieTtl"> </p>
        <p><button type="submit">Fijar cookie</button></p>
    </form>

    <p>Cookies fijadas: </p>
    <ul>
        <?php foreach ($_COOKIE as $cookieName => $cookieValue): ?>
            <li><?= $cookieName ?>: <?= $cookieValue ?></li>

        <?php endforeach ?>

    </ul>

</body>

</html>