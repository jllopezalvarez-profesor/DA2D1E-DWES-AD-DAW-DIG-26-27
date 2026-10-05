<!DOCTYPE html>
<html lang="es">

<?php

//echo "Esto es un trozo de código generado ";

?>

<head>
    <!-- Comentario de HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de envío de formulario a sí mismo</title>
</head>

<body>
    <div class="container">
        <h1>Ejemplo de envío de formulario a sí mismo</h1>


        <?php

        $errores = [];

        $parametro1 = '';
        $parametro2 = '';
        $parametro3 = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $parametro1 = trim($_POST['parametro1'] ?? '');
            if (empty($parametro1)) {
                $errores[] = "No se ha recibido el parámetro uno";
            }

            $parametro2 = trim($_POST['parametro2'] ?? '');
            if (empty($parametro2)) {
                $errores[] = "No se ha recibido el parámetro dos";
            }

            $parametro3 = trim($_POST['parametro3'] ?? '');
            if (empty($parametro3)) {
                $errores[] = "No se ha recibido el parámetro tres";
            }
        }

        ?>

        <?php if (($_SERVER['REQUEST_METHOD'] === 'POST') && (count($errores) > 0)): ?>
            <div class="alert alert-danger">
                <p>Hay errores:</p>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>



        <form method="post">


            <p><label>Primer parámetro <input type="text" name="parametro1" value="<?= $parametro1 ?>"></label></p>
            <p><label>Segundo parámetro <input type="text" name="parametro2" value="<?= $parametro2 ?>"></label></p>
            <p><label>Tercer parámetro
                    <select name="parametro3">
                        <option value="">Selecciona un número</option>
                        <option value="1" <?php echo $parametro3 === '1' ? 'selected' : '' ?>>1</option>
                        <option value="2" <?php echo $parametro3 === '2' ? 'selected' : '' ?>>2</option>
                        <option value="3" <?php echo $parametro3 === '3' ? 'selected' : '' ?>>3</option>
                        <option value="4" <?php echo $parametro3 === '4' ? 'selected' : '' ?>>4</option>

                    </select>
                </label></p>



            <button type="submit">Enviar formulario</button>

        </form>

    </div>
</body>

</html>