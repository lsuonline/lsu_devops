<?php

function clock_angle(string $time_str): float {
    list($h, $m) = explode(':', $time_str);
    $h = intval($h) % 12;
    $m = intval($m);

    $hour_angle = 30 * $h + 0.5 * $m;
    $minute_angle = 6 * $m;

    $angle = abs($hour_angle - $minute_angle);
    return min($angle, 360 - $angle);
}

// Prompt for input
echo "Enter time (HH:MM): ";
$handle = fopen("php://stdin", "r");
$input = trim(fgets($handle));
fclose($handle);

// Validate input format
if (!preg_match('/^\d{1,2}:\d{2}$/', $input)) {
    echo "Invalid time format. Please use HH:MM.\n";
    exit(1);
}

// Calculate and display result
$angle = clock_angle($input);
echo "The smallest angle between the hands at $input is $angle degrees.\n";
