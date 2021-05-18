<?php

    // 2.
    $a = 12;
    $b = 22;

    if ($a > $b)
        echo "Hello World";
    
    // 3.
    if ($a != $b)
        echo "Hello World";

    // 4.
    if ($a == $b)
        echo "Yes";
    else   
        echo "No";

    // 5.
    if ($a == $b)
        echo "1";
    else if ($a > $b)
        echo "2";
    else    
        echo "3";

    // 6.
    echo 10 * 5;

    // 7.
    $text = "Hello";

    // 8.
    $x = 5;
    $y = 2;
    echo $x + $y;

    // 9.
    $variable = 10;
    for ($i = 0; $i < $variable; $i++)
        echo $variable . "<br />";
    
    // 10.
    $num = -14;
    $factor = $num > 0 ? -1 : 1;
    while($num > 2 || $num < 0)
    {
        $num = $num + ($factor) * 3;
    }
    if($num == 0)
        echo "True";
    else    
        echo "False";