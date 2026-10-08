<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<?php

$usersDetails = ['JOSE' => 'José Luis López', 'MARIA' => 'Maria Martínez', 'MARTA' => 'Marta del Toboso'];

$currentUsername = $_SESSION['current-user'] ?? '';

$isLoggedOn = !empty($currentUsername);

?>


<body>
    <div class="container">
        <h1>Página de la aplicación</h1>

        <?php if (!$isLoggedOn): ?>
            <p>No te has identificado, por favor, hazlo en el <a href="login.php">formulario de login</a></p>
        <?php else: ?>
            <p>Hola, <?= $usersDetails[$currentUsername] ?></p>
            <p><a href="logout.php">Salir de la aplicación</a></p>
        <?php endif ?>

    </div>

</body>

</html>