<?php
$TIPOS_MASA = ['F' => 'Fina', 'G' => 'Gruesa', 'Q' => 'Borde relleno de queso', 'SG' => 'Sin gluten'];
$TAMANIOS = ['S' => 'Pequeña', 'M' => 'Mediana', 'L' => 'Grande', 'XL' => 'Gigante'];
$BASES = ['M' => 'Margarita', 'BBQ' => 'Barbacoa', '4Q' => 'Cuatro quesos'];
$INGREDIENTES = [
    'IA-PI' => 'Pimiento',
    'IA-CE' => 'Cebolla',
    'IA-CP' => 'Carne picada',
    'IA-PL' => 'Pollo',
    'IA-BE' => 'Berenjena',
    'IA-XQ' => 'Extra de queso',
    'IA-BBQ' => 'Salsa barbacoa'
];
$OPCIONES_PAGO = [
    'T' => 'Tarjeta bancaria',
    'B' => 'Bizum',
    'P' => 'PayPal'
];


function ingredientesSonValidos($ingredientes, $ingredientesValidos)
{
    foreach ($ingredientes as $codIngrediente) {
        if (!array_key_exists($codIngrediente, $ingredientesValidos)) {
            return false;
        }
    }
    return true;
}
