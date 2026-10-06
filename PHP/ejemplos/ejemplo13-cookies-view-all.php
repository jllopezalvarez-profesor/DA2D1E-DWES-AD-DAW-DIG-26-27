<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script para ver todas las cookies de la petición</title>
</head>

<body>
    <h1>Script para ver todas las cookies de la petición</h1>
    <p>En la petición aparecen las siguiente cookies:</p>
    <ul>
        <?php foreach ($_COOKIE as $cookieName => $cookieValue): ?>
            <li><?= $cookieName ?>: <?= $cookieValue ?></li>

        <?php endforeach ?>

    </ul>

</body>

</html>