<?php
// Creamos la carpeta 'uploads' si no existe
$directorioSubida = 'uploads/';
if (!file_exists($directorioSubida)) {
    mkdir($directorioSubida, 0777, true);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Subida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Resultado del Proceso de Subida</h3>
                    </div>
                    <div class="card-body">

                        <!-- ========================================== -->
                        <!-- 1. PROCESAMIENTO DEL FICHERO ÚNICO         -->
                        <!-- ========================================== -->
                        <h4 class="border-bottom pb-2 text-primary">Fichero Único</h4>
                        <?php
                        if (isset($_FILES['fichero_unico']) && $_FILES['fichero_unico']['error'] === UPLOAD_ERR_OK) {
                            $nombreOriginal = basename($_FILES['fichero_unico']['name']);
                            $rutaDestino = $directorioSubida . $nombreOriginal;

                            // Movemos el archivo desde la ruta temporal a nuestra carpeta definitiva
                            if (move_uploaded_file($_FILES['fichero_unico']['tmp_name'], $rutaDestino)) {
                                echo '<div class="alert alert-success">¡Éxito! El fichero <strong>' . htmlspecialchars($nombreOriginal) . '</strong> se ha subido correctamente.</div>';
                            } else {
                                echo '<div class="alert alert-danger">Error: No se pudo mover el fichero único al directorio de destino.</div>';
                            }
                        } else {
                            $error = $_FILES['fichero_unico']['error'] ?? UPLOAD_ERR_NO_FILE;
                            if ($error === UPLOAD_ERR_NO_FILE) {
                                echo '<div class="alert alert-warning">No se seleccionó ningún fichero individual.</div>';
                            } else {
                                echo '<div class="alert alert-danger">Ocurrió un error en la subida del fichero único (Código de error: ' . $error . ').</div>';
                            }
                        }
                        ?>

                        <hr class="my-4">

                        <!-- ========================================== -->
                        <!-- 2. PROCESAMIENTO DE FICHEROS MÚLTIPLES     -->
                        <!-- ========================================== -->
                        <h4 class="border-bottom pb-2 text-primary">Ficheros Múltiples</h4>
                        <?php
                        if (isset($_FILES['ficheros_multiples']) && !empty($_FILES['ficheros_multiples']['name'][0])) {
                            $archivos = $_FILES['ficheros_multiples'];
                            $totalArchivos = count($archivos['name']);

                            echo "<p class='text-muted'>Se han recibido $totalArchivos archivos para procesar:</p>";
                            echo "<ul class='list-group'>";

                            for ($i = 0; $i < $totalArchivos; $i++) {
                                // Comprobamos si no hubo error en este archivo específico del bucle
                                if ($archivos['error'][$i] === UPLOAD_ERR_OK) {
                                    $nombreOriginal = basename($archivos['name'][$i]);
                                    $rutaDestino = $directorioSubida . $nombreOriginal;

                                    if (move_uploaded_file($archivos['tmp_name'][$i], $rutaDestino)) {
                                        echo "<li class='list-group-item list-group-item-success'>✔ <strong>{$nombreOriginal}</strong> subido con éxito.</li>";
                                    } else {
                                        echo "<li class='list-group-item list-group-item-danger'>✖ Error al mover el archivo <strong>{$nombreOriginal}</strong>.</li>";
                                    }
                                } else {
                                    $nombreOriginal = htmlspecialchars($archivos['name'][$i]);
                                    echo "<li class='list-group-item list-group-item-warning'>⚠ El archivo <strong>{$nombreOriginal}</strong> tuvo un error de subida.</li>";
                                }
                            }
                            echo "</ul>";
                        } else {
                            echo '<div class="alert alert-warning">No se seleccionó ningún fichero múltiple.</div>';
                        }
                        ?>

                        <!-- Botón para volver al formulario -->
                        <div class="mt-4 text-center">
                            <a href="formulario.html" class="btn btn-secondary">← Volver al formulario</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>