<?php
//Display errors if any
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$greekAlphabet = ['Α','Β','Γ','Δ','Ε','Ζ','Η','Θ','Ι','Κ','Λ','Μ','Ν','Ξ','Ο','Π','Ρ','Σ','Τ','Υ','Φ','Χ','Ψ','Ω'];

echo '<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="WOL - Server">
        <meta name="author" content="George Mantellos, github.com/geocfu">
        <title>Work-shift Diary</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <meta name="theme-color" content="#0277bd">
    </head>
    <br/>
    <div class="container">
        <table class="table table-striped table-bordered table-hover shadow text-center">
            <thead>
                <tr>
                  <th scope="col">Letter</th>
                  <th scope="col">Start of Shift</th>
                  <th scope="col">End of Shift</th>
                </tr>
            </thead>
            <tbody>
    ';
foreach ($greekAlphabet as $timeOfDay => $letterOfShift) {
    echo '<tr>
            <th scope="row">', $letterOfShift,'</th>', displayShiftTime($timeOfDay);
    if ($timeOfDay == 23) {
        echo '  </tbody>
            </table>
        </div>';
    }
}

function displayShiftTime ($timeOfShift) {
     echo '<td>', displayStartOfShiftTime($timeOfShift + 1),'</td>
            <td>', displayEndOfShiftTime($timeOfShift + 9),'</td>
        </tr>';
}

function displayStartOfShiftTime ($timeOfShift) {
    echo insertZero($timeOfShift), $timeOfShift, ":00";
}

function displayEndOfShiftTime ($timeOfShift) {
    if ($timeOfShift > 24) {
        $timeOfShift -= 24;
    }
    echo insertZero($timeOfShift), $timeOfShift, ":00";
}

function insertZero ($time) {
    if (strlen((string)$time) == 1) {
        return "0";
    }
}
?>
