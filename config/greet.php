<?php
date_default_timezone_set('Africa/Lagos');

function greet() {
    $time = date("H");
    return $time;
}

$time_of_day = greet();

if ($time_of_day < 12) {
   $tim = "Good Morning,";
} elseif ($time_of_day < 18) {
    $tim = "Good Afternoon,";
} else {
    $tim = "Good Evening,";
}
?>