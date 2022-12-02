<?php

$file = file_get_contents('Input.txt');
$elves = explode("\n\n", $file);
$mostCalories = 0;
$secondMostCalories = 0;
$thirdMostCalories = 0;
$sum = 0;

foreach ($elves as $elf) {
    $calories = explode("\n", $elf);
    foreach ($calories as $cal) {
        $sum = $sum + intval($cal);
    }
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
}

$topThree = $mostCalories + $secondMostCalories + $thirdMostCalories;