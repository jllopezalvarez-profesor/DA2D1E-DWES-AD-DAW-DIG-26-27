<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo básico de variables</title>
</head>
<body>
    <h1>Ejemplo básico de variables</h1>
    <?php
    $num1 = 3;
    $num2 = 5;
    $suma = $num1 + $num2;

    ?>


    <h2>Usando enteros:</h2>
    <p>Primer número: <?=$num1?></p>
    <p>var dump del primer número: <?php var_dump($num1)?>
    <p>Segundo número: <?=$num2?></p>
    <p>var dump del segundo número: <?php var_dump($num2)?>
    <p>Resultado de la suma: <?=$suma?></p>
    <p>var dump de la suma: <?php var_dump($suma)?>
    

    <?php
    $num1 = "10";
    $num2 = "S2A0A7A8A"; // Fallaría
    $num2 = "20A7A8A"; // Se interpreta como 20, con warning
    $num2 = "40"; // Se convierte sin problemas
    $suma = $num1 + $num2;
    ?>

    <h2>Usando string:</h2>
    <p>Primer número: <?=$num1?></p>
    <p>var dump del primer número: <?php var_dump($num1)?>
    <p>Segundo número: <?=$num2?></p>
    <p>var dump del segundo número: <?php var_dump($num2)?>
    <p>Resultado de la suma: <?=$suma?></p>
    <p>var dump de la suma: <?php var_dump($suma)?>


    <h2>Interpolar y concatenar cadenas</h2>
    <p><?='Esta cadena no interpola los valores de $num1 y $num2 porque usa comillas simples.'?>
    <p><?="Esta cadena interpola los valores de $num1 y $num2 porque usa comillas dobles."?>
    <p><?='Esto es la concatenación de $num1 y $num2: ' . $num1 .$num2?></p>

</body>
</html>