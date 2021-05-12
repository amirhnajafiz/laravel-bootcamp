<?php
    // Second
    function isPrime($number)
    {
        for($i = 2; $i < $number; $i++)
            if ($number % $i == 0)
                return FALSE;
        return TRUE;
    }

    function findFactors($target)
    {
        $found_factors = [];
        $copy_target = $target;
        for($i = 2; $i <= $copy_target / 2; $i++)
        {
            $flag = isPrime($i);
            while($target % $i == 0)
            {
                $target = $target / $i;
                if ($flag)
                    array_push($found_factors, $i);
            }
        }
        return $found_factors;
    }

    function sum($input_number)
    {
        $temp = 0;
        while($input_number != 0)
        {
            $temp += $input_number % 10;
            $input_number /= 10;
        }
        return $temp;
    }
?>

<?php
    $test_number = 666;
    $factors = findFactors($test_number);
    $total = 0;
    foreach($factors as $factor)
    {
        $total += sum($factor);
    }
    echo sum($test_number) == $total ? "YES" : "NO";
?>