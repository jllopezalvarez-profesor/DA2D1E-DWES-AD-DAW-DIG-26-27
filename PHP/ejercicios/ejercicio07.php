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

    <h1> Calendario de un mes del año</h1>

    <?php
    // Hacer que responda a query: ?y=2025&m=6

    $month = filter_input(INPUT_GET, 'm', FILTER_VALIDATE_INT, ["options" => ["default" => 1, "min_range" => 1, "max_range" => 12]]);
    $year = filter_input(INPUT_GET, 'y', FILTER_VALIDATE_INT);

    ?>

    <?php if (!$month || !$year): ?>
        <p class="alert alert-danger">Falta el mes o el año, o no son números correctos</p>


    <?php else: ?>






        <?php



        $firstDayOfMonth = DateTime::createFromFormat("Y-m-d", "$year-$month-1");

        $numberOfDaysInMonth = $firstDayOfMonth->format("t");
        $startWeekDay = $firstDayOfMonth->format("w");

        ?>






        <p>
            <?php var_dump($firstDayOfMonth) ?>
        </p>
        <p>
            <?php var_dump($numberOfDaysInMonth) ?>
        </p>
        <p>
            <?php var_dump($startWeekDay) ?>
        </p>

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


</body>

</html>