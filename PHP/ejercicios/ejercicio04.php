<!DOCTYPE html>
<html lang="es">
<?php
$month = 10;
$year = 2025;

$firstDayOfMonth = DateTime::createFromFormat("Y-m-d", "$year-$month-1");

$numberOfDaysInMonth = $firstDayOfMonth->format("t");
$startWeekDay = $firstDayOfMonth->format("w");

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de <?= "$month/$year" ?></title>
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
    <h1> Calendario de <?= "$month/$year" ?></h1>

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



</body>

</html>