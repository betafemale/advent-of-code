<?php

$lines = file('Input.txt');
$mostCalories = 0;
$secondMostCalories = 0;
$thirdMostCalories = 0;
$sum = 0;

foreach ($lines as $line) {
    if (empty(trim($line))) {
        if ($sum > $mostCalories) {
            $thirdMostCalories = $secondMostCalories;
            $secondMostCalories = $mostCalories;
            $mostCalories = $sum;
        } elseif ($sum > $secondMostCalories) {
            $thirdMostCalories = $secondMostCalories;
            $secondMostCalories = $sum;
        } elseif ($sum > $thirdMostCalories) {
            $thirdMostCalories = $sum;
        }
        $sum = 0;
    } else {
        $sum = $sum + intval($line);
    }
}

$topThree = $mostCalories + $secondMostCalories + $thirdMostCalories;