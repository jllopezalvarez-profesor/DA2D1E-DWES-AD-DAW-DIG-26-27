<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de un mes del año</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid red;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1> Calendario de un mes del año</h1>



        <?php
        $month = filter_input(
            INPUT_POST,
            'm',
            FILTER_VALIDATE_INT,
            ["options" => ["min_range" => 1, "max_range" => 12]] // No uso "default" en opciones porque si lo hago nunca devolverá falso.
        );
        $year = filter_input(
            INPUT_POST,
            'y',
            FILTER_VALIDATE_INT,
            ["options" => ["min_range" => 2020, "max_range" => 2030]]
        );

        ?>

        <?php if (!$month || !$year): ?>
            <p class="alert alert-danger">Falta el mes o el año, o no son números correctos, o no son valores admitodos (1-12 para mes y 2020-2030 para año)</p>
        <?php else: ?>
            <?php
            $firstDayOfMonth = DateTime::createFromFormat("Y-m-d", "$year-$month-1");
            $numberOfDaysInMonth = $firstDayOfMonth->format("t");
            $startWeekDay = $firstDayOfMonth->format("w");
            ?>
            <table>
                <tr>
                    <?php
                    $currentDay = 1;
                    $daysOfCurrentWeek = 0;

                    while ($daysOfCurrentWeek <  $startWeekDay - 1) {
                        echo "<td></td>";
                        $daysOfCurrentWeek++;
                    }

                    while ($currentDay <= $numberOfDaysInMonth) {
                        echo "<td>$currentDay</td>";
                        $currentDay++;
                        $daysOfCurrentWeek++;
                        if ($daysOfCurrentWeek >= 7) {
                            echo "</tr><tr>";
                            $daysOfCurrentWeek = 0;
                        }
                    }
                    if ($daysOfCurrentWeek > 0)
                        while ($daysOfCurrentWeek++ < 7) {
                            echo "<td></td>";
                        }


                    ?>
                </tr>

            </table>

        <?php endif ?>
    </div>

</body>

</html>