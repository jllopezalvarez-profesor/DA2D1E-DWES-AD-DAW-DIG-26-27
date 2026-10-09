<?php
// Configuramos las cabeceras HTTP para forzar la descarga de un fichero CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=temperaturas_aleatorias.csv');

// Opcional: Evitar caché
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

/**
 * Función auxiliar para imitar el comportamiento de fputcsv pero usando echo.
 * Encapsula entre comillas dobles si el campo contiene comas, comillas o saltos de línea.
 */
function echo_csv_row(array $campos, string $delimitador = ',', string $envoltorio = '"'): void
{
    $linea = [];
    foreach ($campos as $campo) {
        $campo = (string)$campo;
        // Si el campo contiene el delimitador, comillas dobles o saltos de línea, lo escapamos
        if (strpbrk($campo, "$delimitador\n\r$envoltorio") !== false) {
            $campo = $envoltorio . str_replace($envoltorio, $envoltorio . $envoltorio, $campo) . $envoltorio;
        }
        $linea[] = $campo;
    }
    // Imprimimos la línea unida por el delimitador y terminada con un salto de línea estándar
    echo implode($delimitador, $linea) . "\n";
}

// 1. Escribimos la cabecera UTF-8 BOM para que Excel reconozca correctamente los caracteres especiales
// (Usamos print o echo para imprimir los bytes del BOM)
echo chr(0xEF) . chr(0xBB) . chr(0xBF);

// 2. Definimos las columnas del CSV usando nuestra función basada en echo
echo_csv_row(['Ciudad', 'Fecha', 'Hora', 'Temperatura (°C', 'Condición']);

// Listado de ciudades de ejemplo
$ciudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Bilbao', 'Zaragoza', 'Málaga'];

// Listado de condiciones meteorológicas posibles
$condiciones = ['Soleado', 'Nublado', 'Lluvia ligera', 'Tormenta', 'Parcialmente nublado', 'Ventoso'];

// Generamos datos aleatorios para los últimos 3 días, cada 3 horas, para cada ciudad
$fechaActual = new DateTime();

foreach ($ciudades as $ciudad) {
    // Simularemos datos para los últimos 3 días (2, 1 y 0)
    for ($d = 2; $d >= 0; $d--) {
        $fecha = (clone $fechaActual)->modify("-{$d} days")->format('Y-m-d');

        // Horas cada 3 horas (00:00, 03:00, ..., 21:00)
        for ($hora = 0; $hora < 24; $hora += 3) {
            $horaFormateada = str_pad($hora, 2, '0', STR_PAD_LEFT) . ':00';

            // Generamos una temperatura aleatoria coherente (ej: entre -2 y 42 ºC)
            // Variación según la hora utilizando la misma fórmula matemática
            $baseTemp = 15 + (sin(($hora - 6) / 24 * 2 * M_PI) * 10);
            $temperatura = round($baseTemp + rand(-30, 30) / 10, 1);

            $condicionAleatoria = $condiciones[array_rand($condiciones)];

            // Escribimos la fila utilizando nuestra función basada en echo
            echo_csv_row([$ciudad, $fecha, $horaFormateada, $temperatura, $condicionAleatoria]);
        }
    }
}

// Fin del script
exit;
