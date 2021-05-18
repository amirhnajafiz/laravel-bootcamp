<?php
    $input = readline(">> ");
    
    $array = explode(" ", $input);
    $total = 0;
    $flag = true;
    sort($array);
    
    foreach($array as $num)
    {
        if ($num <= 0)
            $flag = false;
        $total += $num;
    }
    
    echo ($flag) ? ( ( (int)$array[2] + (int)$array[0] + (int)$array[1] == 180 ) ? "Yes" : "No" ) : "No";
    
?>