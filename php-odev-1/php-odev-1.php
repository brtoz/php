<?php

function triangle1($x)
{
    for ($i = 1; $i <= $x; $i++) {

        echo "*";
        echo "<br>";
        $y = $i;

        for ($j = 1; $j <= $y && $y < $x; $j++) {
            echo "*" . " ";
            $y = $i;
        }
    }
};
triangle1(50);

?>