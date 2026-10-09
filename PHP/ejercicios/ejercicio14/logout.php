<?php
session_start();

$currentUsername = $_SESSION['current-user'] ?? '';
$isLoggedOn = !empty($currentUsername);

if ($isLoggedOn) {
    // Eliminar de la sesión el nombre de usuario. Funciona pero es menos seguro que otras alternativas.
    // $_SESSION = [];

    // Destruir la sesión y regenerar el id
    session_regenerate_id(true);
    session_destroy();
}

header('Location: login.php', true, 302);
exit();
