<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<?php
$usersPasswords = ['JOSE' => '1111', 'MARIA' => '2222', 'MARTA' => '3333'];


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
    }
}

$hasErrors = !empty($errors);


?>



<body>
    <div class="container">
        <h1>Acceso al sistema</h1>



        <?php if (!$isPost || $hasErrors): ?>


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

        <?php else: ?>
            <p>Bienvenido al sistema</p>
            <p><a href="app.php">Ir a la página principal de la aplicación</a></p>
        <?php endif ?>

    </div>

</body>

</html>