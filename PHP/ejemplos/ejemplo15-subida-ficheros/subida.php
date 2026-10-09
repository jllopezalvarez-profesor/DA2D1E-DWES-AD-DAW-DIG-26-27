<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de Ficheros con Bootstrap</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Formulario de Subida de Ficheros</h4>
                    </div>
                    <div class="card-body p-4">

                        <!-- IMPORTANTE: enctype="multipart/form-data" es obligatorio para enviar archivos -->
                        <form action="procesar-subida.php" method="POST" enctype="multipart/form-data">

                            <!-- Campo para un fichero único -->
                            <div class="mb-3">
                                <label for="fichero_unico" class="form-label fw-bold">Fichero Individual:</label>
                                <input type="file" class="form-control" id="fichero_unico" name="fichero_unico">
                                <div class="form-text">Sube un único documento o imagen.</div>
                            </div>

                            <hr class="my-4">

                            <!-- Campo para múltiples ficheros (nótese el name con corchetes []) -->
                            <div class="mb-4">
                                <label for="ficheros_multiples" class="form-label fw-bold">Ficheros Múltiples:</label>
                                <input type="file" class="form-control" id="ficheros_multiples" name="ficheros_multiples[]" multiple>
                                <div class="form-text">Puedes seleccionar varios archivos a la vez manteniendo pulsada la tecla Ctrl o Shift.</div>
                            </div>

                            <!-- Botón de envío -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">Subir Ficheros</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle CDN (opcional para componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>