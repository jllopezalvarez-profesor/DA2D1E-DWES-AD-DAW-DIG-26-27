<?php
// Configuramos las cabeceras HTTP para forzar la descarga de un fichero CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=temperaturas_aleatorias.csv');

// Abrimos el flujo de salida estándar para escribir directamente el CSV
$output = fopen('php://output', 'w');

// Escribimos la cabecera UTF-8 BOM para que Excel reconozca correctamente los caracteres especiales (tildes, etc.)
fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

// Definimos las columnas del CSV
fputcsv($output, ['Ciudad', 'Fecha', 'Hora', 'Temperatura (°C)', 'Condición'], ',', '"', '\\');

// Listado de ciudades de ejemplo
$ciudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Bilbao', 'Zaragoza', 'Málaga'];

// Listado de condiciones meteorológicas posibles
$condiciones = ['Soleado', 'Nublado', 'Lluvia ligera', 'Tormenta', 'Parcialmente nublado', 'Ventoso'];

// Generamos datos aleatorios para los últimos 3 días, cada 3 horas, para cada ciudad
$fechaActual = new DateTime();

foreach ($ciudades as $ciudad) {
    // Simularemos datos para los últimos 2 días
    for ($d = 2; $d >= 0; $d--) {
        // Clone hace una copia de la fecha actual, para que no se modifique. En PHP no son inmutables como LocalDateTime en Java.
        $fecha = (clone $fechaActual)->modify("-{$d} days")->format('Y-m-d');

        // Horas cada 3 horas (00:00, 03:00, ..., 21:00)
        for ($hora = 0; $hora < 24; $hora += 3) {
            $horaFormateada = str_pad($hora, 2, '0', STR_PAD_LEFT) . ':00';

            // Generamos una temperatura aleatoria coherente (ej: entre -2 y 42 ºC)
            // Hacemos que varíe ligeramente según la hora (más frío de madrugada, más calor al mediodía)
            $baseTemp = 15 + (sin(($hora - 6) / 24 * 2 * M_PI) * 10);
            $temperatura = round($baseTemp + rand(-30, 30) / 10, 1);

            $condicionAleatoria = $condiciones[array_rand($condiciones)];

            // Escribimos la fila en el CSV
            fputcsv($output, [$ciudad, $fecha, $horaFormateada, $temperatura, $condicionAleatoria], ',', '"', '\\');
        }
    }
}

// Cerramos el flujo
fclose($output);
exit;
