<?php
    // This function adds two numbers digit by digit and goes to 
    // next digits until it reaches the end of one number.
    function sumation($first_string, $second_string)
    {
        $result = ""; // Saving the final result in a function

        $first_queue = str_split($first_string);
        $second_queue = str_split($second_string);

        $first_index = strlen($first_string) - 1;
        $second_index = strlen($second_string) - 1;

        $carry = 0; // In case of overloading

        while ($first_index > -1 || $second_index > -1)
        {

            $temp_1 = $first_index < 0 ? 0 : (int) $first_queue[$first_index];
            $temp_2 = $second_index < 0 ? 0 : (int) $second_queue[$second_index];

            $sum = $temp_1 + $temp_2 + $carry;
            $carry = $sum / 10;
            $sum %= 10;

            $result = strval($sum) . $result;

            $first_index--;
            $second_index--;
        }

        return $result;
    }
?>

<?php
    // This is just a function to generate big numbers as string
    function big_random_generator($limit)
    {
        $temp = "";
        for($i = 0; $i < $limit; $i++)
            $temp = $temp . strval(rand(0,9));
        return $temp;
    }
?>

<?php
    $test1 = big_random_generator(50);
    $test2 = big_random_generator(60);
    echo $test1 . "<br /> + <br />" . $test2 . "<br /> = <br />" . sumation($test1, $test2);
?>

