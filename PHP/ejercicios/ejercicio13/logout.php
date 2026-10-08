<?php
session_start();

$usersDetails = ['JOSE' => 'José Luis López', 'MARIA' => 'Maria Martínez', 'MARTA' => 'Marta del Toboso'];
$currentUsername = $_SESSION['current-user'] ?? '';
$isLoggedOn = !empty($currentUsername);

// Eliminar de la sesión el nombre de usuario. Funciona pero es menos seguro que otras alternativas.
// $_SESSION = [];

// Destruir la sesión y regenerar el id
// session_destroy();
session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>




<body>
    <div class="container">
        <h1>Logout</h1>

        <?php if (!$isLoggedOn): ?>
            <p>No te as identificado, por favor, hazlo en el <a href="login.php">formulario de login</a></p>
        <?php else: ?>
            <p>Hasta la vista, <?= $usersDetails[$currentUsername] ?></p>
            <p><a href="login.php">Volver a logarse</a></p>

        <?php endif ?>

    </div>

</body>

</html>