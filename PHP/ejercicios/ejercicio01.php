<!DOCTYPE html>
<html lang="es">
<?php
$numero = 7;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar del número <?=$numero?> (en lista)</title>
</head>
<body>
    <h1>Tabla de multiplicar del número <?=$numero?> (en lista)</h1>

    <ul>
        <?php for($numero2=0; $numero2<=10; $numero2++):?>
        <li><?="$numero x $numero2 = " . $numero * $numero2?></li>
        <?php endfor ?>

        <!-- <li>3 x 0 = 0</li>
        <li>3 x 1 = 3</li>
        <li>3 x 2 = 6</li>
        <li>3 x 3 = 9</li>
        <li>3 x 4 = 12</li>
        <li>3 x 5 = 15</li>
        <li>3 x 6 = 18</li>
        <li>3 x 7 = 21</li>
        <li>3 x 8 = 24</li>
        <li>3 x 9 = 27</li>
        <li>3 x 10 = 30</li> -->
    </ul>


    
</body>
</html>