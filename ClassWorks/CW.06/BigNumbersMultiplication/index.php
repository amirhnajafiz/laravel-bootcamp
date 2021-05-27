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

        while ($first_index > -2 || $second_index > -2)
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

        return ltrim($result, "0");
    }
?>

<?php 
	function bit_multiply($string, $bit)
	{
		$result = "";
		$carry = 0;
		for($i = strlen($string) - 1; $i > -2; $i--)
		{
			$bit_string = $i > -1 ? (int) $string[$i] : 0;
			$temp = $bit_string * (int) $bit + $carry;
			$carry = $temp / 10;
			$result =  strval($temp % 10) . $result;
		}
		return $result;
	}
?>

<?php
	function add_zero_to_right($string, $number)
	{
		for ($i = 0; $i < $number; $i++)
			$string = $string . "0";
		return $string;
	}
?>

<?php
	function multiplication($first_string, $second_string)
	{
		$zero = 0;
		$result = "0";
		for($i = strlen($second_string) - 1; $i > -1; $i--)
		{
			$temp = bit_multiply($first_string, $second_string[$i]);
			$temp = add_zero_to_right($temp, $zero);
			$result = sumation($result, $temp);
			$zero++;
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
	$test1 = "502";
	$test2 = "260";
    echo $test1 . "<br /> * <br />" . $test2 . "<br /> = <br />" . multiplication($test1, $test2);
?>
