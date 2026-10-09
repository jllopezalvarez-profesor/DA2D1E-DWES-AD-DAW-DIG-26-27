<?php
session_start();

$currentUsername = $_SESSION['current-user'] ?? '';
$isLoggedOn = !empty($currentUsername);

if (!$isLoggedOn) {
    header('Location: login.php', true, 302);
    exit();
}

require_once 'users.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Página de la aplicación</h1>
        <p>Hola, <?= $usersDetails[$currentUsername] ?></p>
        <p><a href="logout.php">Salir de la aplicación</a></p>
    </div>

</body>

</html>