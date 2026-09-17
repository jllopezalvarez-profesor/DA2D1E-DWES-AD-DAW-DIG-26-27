<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo PHP 01</title>
</head>
<body>
    <h1>Ejemplo 01</h1>
    <p>
        <?php


        echo 'Esto se ha escrito con "echo".';

        echo "\n";

        echo '<br>';

        echo 'Esto otro también se ha escrito con "echo".';

        echo "\n";

        echo '<br>Esto son varias lineas<br>1<br>2<br>3<br>en un solo echo';


        ?>
    
    </p>

    <?php
    echo "<p>Este párrafo se ha generado con echo, incluidos los tags.</p>"
    ?>
    
    <p>
        <?='Esto se ha escrito con la versión abreviada de echo ("&lt;?=")'?>    
    <p>
</body>
</html>