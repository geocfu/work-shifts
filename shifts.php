<?php
//Display errors if any
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/* Shift hours are displayed using greek letters
   ex. Monday: Α, Thuesday: Η, Wednesday: Σ etc.*/
$greekAlphabet = ['Α','Β','Γ','Δ','Ε','Ζ','Η','Θ','Ι','Κ','Λ','Μ','Ν','Ξ','Ο','Π','Ρ','Σ','Τ','Υ','Φ','Χ','Ψ','Ω'];

echo '<br>', '<br>';
// Itterate the alphabet and display all the shifts
foreach ($greekAlphabet as $timeOfDay => $letterOfShift) {
    echo '<center>', '<b>', $letterOfShift, '</b>', ": ", displayShiftTime($timeOfDay), '</center>', '<br>', '<br>';
}

function displayShiftTime ($timeOfShift) {
    // Assuming that letter A is the first shift at exactly 01:00 in the morning.
     displayStartOfShiftTime($timeOfShift + 1);
     echo "-";
     // A shift is 8 hours long.
     displayEndOfShiftTime($timeOfShift + 9);
}

function displayStartOfShiftTime ($timeOfShift) {
    echo insertZero($timeOfShift), $timeOfShift, ":00";
}

// If time is bigger than 24:00, start again from 01:00.
function displayEndOfShiftTime ($timeOfShift) {
    if ($timeOfShift > 24) {
        $timeOfShift -= 24;
    }
    echo insertZero($timeOfShift), $timeOfShift, ":00";
}

/*Insert a zero infront of time if the number is 1 digit long.
  ex 1:00->01:00, 4:00->04:00.*/
function insertZero ($time) {
    if (strlen((string)$time) == 1) {
        return "0";
    }
}
?>
