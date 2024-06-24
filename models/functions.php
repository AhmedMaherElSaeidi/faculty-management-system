<?php
function val($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function countValues($index = null)
{
    static $count = 0;
    if ($index === "+") {
        $count++;
    } elseif ($index === "0") {
        $count = 0;
    }
    return $count;
}

function isempty($data)
{
    if (empty($data) && $data != "0") {
        countValues("+");
    } else {
        return $data;
    }
}

function grading($grade)
{
    if ($grade >= 90) {
        return 'A+';
    } else if ($grade < 90 && $grade >= 85) {
        return 'A';
    } else if ($grade < 85 && $grade >= 80) {
        return 'B+';
    } else if ($grade < 80 && $grade >= 75) {
        return 'B';
    } else if ($grade < 75 && $grade >= 65) {
        return 'c+';
    } else if ($grade < 65 && $grade >= 50) {
        return 'C';
    } else if ($grade < 50 && $grade >= 35) {
        return 'D';
    } else if ($grade < 35) {
        return 'F';
    } else {
        return '';
    }
}
