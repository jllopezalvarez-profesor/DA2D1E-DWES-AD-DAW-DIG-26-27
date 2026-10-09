<?php
session_start();

$currentUsername = $_SESSION['current-user'] ?? '';
$isLoggedOn = !empty($currentUsername);

if ($isLoggedOn) {
    header('Location: app.php', true, 302);
    exit();
}

require_once 'users.php';

$username = '';
$password = '';
$errors = [];

$isPost = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($isPost) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Verificar si el usuario existe
    if (!array_key_exists($username, $usersPasswords) || ($usersPasswords[$username] !== $password)) {
        $errors[] = "No existe el usuario o la contraseña es incorrecta.";
    } else {
        $_SESSION['current-user'] = $username;
        header('Location: app.php', true, 302);
        exit();
    }
}

$hasErrors = !empty($errors);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Acceso al sistema</h1>


        <?php if ($hasErrors): ?>
            <p>Se han producido errores</p>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </div>

</body>

</html>