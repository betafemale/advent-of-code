<?php

$lines = file('Input.txt');
$totalScore = 0;
$roundScore = 0;
const WON = 6;
const DRAW = 3;

foreach ($lines as $line) {
    $shapes = explode(' ', $line);
    $opponent = getValue(trim($shapes[0]));
    $ally = getValue(trim($shapes[1]));

    if ($opponent === $ally) {
        $totalScore += DRAW;
    } elseif (in_array($opponent, [1, 3]) && in_array($ally, [1, 3])) {
        if ($opponent > $ally) {
            $totalScore += WON;
        }
    } elseif ($opponent < $ally) {
        $totalScore += WON;
    }
    $totalScore += $ally;
}

function getValue(string $shape): int {
    switch($shape) {
        // Rock
        case 'A':
        case 'X':
            return 1;
            break;
        // Paper
        case 'B':
        case 'Y':
            return 2;
            break;
        // Scissors
        case 'C':
        case 'Z':
            return 3;
            break;
    }
}