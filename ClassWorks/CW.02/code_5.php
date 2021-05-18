<?php

    function findFibo($limit)
    {
        $array = [1,1];
        $num = 0;
        while($num <= $limit)
        {
            $index = count($array) - 1;
            $num = $array[$index] + $array[$index - 1];
            array_push($array, $num);
        }
        return $array;
    }
    
    $input = readline(">> ");
    $fibos = findFibo($input);
    
    for($i = 1; $i <= $input; $i++)
    {
        echo (in_array($i, $fibos)) ? "+" : "-";
    }
    
?>