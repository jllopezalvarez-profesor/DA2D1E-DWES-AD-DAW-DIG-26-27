<!DOCTYPE html>
<html lang="ens>
<head>
    <meta charset=" UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejemplo de arrays</title>
</head>

<body>
    <h1>Ejemplo de arrays</h1>

    <?php
    $diasA = array('Lunes' => 1, 'Martes' => 2, 'Miércoles' => 3, 'Domingo' => 7);
    $diasB = ['Lunes' => 1, 'Martes' => 2, 'Miércoles' => 3, 'Domingo' => 7];

    $diasC = array('Lunes', 'Martes', 'Miércoles', 'Domingo');
    $diasD = ['Lunes', 'Martes', 'Miércoles', 'Domingo'];
    ?>

    <h2>Array $diasA - Solo valores</h2>
    <?php printArrayValues($diasA); ?>
    <h2>Array $diasB - Solo valores</h2>
    <?php printArrayValues($diasB); ?>
    <h2>Array $diasC - Solo valores</h2>
    <?php printArrayValues($diasC); ?>
    <h2>Array $diasD - Solo valores</h2>
    <?php printArrayValues($diasD); ?>

    <h2>Array $diasA - Claves y valores</h2>
    <?php printArrayKeyValues($diasA); ?>
    <h2>Array $diasB - Claves y valores</h2>
    <?php printArrayKeyValues($diasB); ?>
    <h2>Array $diasC - Claves y valores</h2>
    <?php printArrayKeyValues($diasC); ?>
    <h2>Array $diasD - Claves y valores</h2>
    <?php printArrayKeyValues($diasD); ?>


    <?php
    $diasA['Jueves'] = 4;
    $diasA['Viernes'] = 5;
    $diasA['Sábado'] = 6;

    $diasC[] = 'Jueves';
    $diasC[] = 'Viernes';
    $diasC[] = 'Sábado';
    ?>

    <h2>Array $diasA - Claves y valores tras añadir</h2>
    <?php printArrayKeyValues($diasA); ?>
    <h2>Array $diasC - Claves y valores tras añadir</h2>
    <?php printArrayKeyValues($diasC); ?>


    <?php
    $diasC[3] = 'Jueves';
    $diasC[4] = 'Viernes';
    $diasC[5] = 'Sábado';
    $diasC[6] = 'Sábado';
    $diasC[100] = 'El día menos pensado';
    $diasC[] = 'El día siguiente al menos pensado';
    ?>

    <h2>Array $diasC - Claves y valores tras modificar accediendo por clave</h2>
    <?php printArrayKeyValues($diasC); ?>


    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>
    <p>. </p>

</body>

</html>


<?php

function printArrayValues($array)
{
    echo "<p>";
    foreach ($array as $valor) {
        echo "$valor ";
    }
    echo "</p>";
}

function printArrayKeyValues($array)
{
    echo "<p>";
    foreach ($array as $clave => $valor) {
        echo "$clave - $valor ";
    }
    echo "</p>";
}

?>