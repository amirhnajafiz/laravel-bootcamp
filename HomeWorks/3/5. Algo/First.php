<?php
    // first
    function getGCD($number_1, $number_2)
    {
        $temp = 1;
        while($temp != 0)
        {
            $temp = $number_2 % $number_1;
            $number_2 = $number_1;
            $number_1 = $temp;
        }
        return $number_2;
    }
?>

<?php
    $a = 25;
    $b = 24;
    $gcd = getGCD($a, $b);
    $lcm = $a * $b / $gcd;
?>