<?php
	function bit_compare($first_string, $second_string)
	{
		for($i = 0; $i < strlen($first_string); $i++)
		{
			if ($first_string[$i] > $second_string[$i])
				return 1;
			else if ($first_string[$i] < $second_string[$i])
				return -1;
		}
		return 0;
	}
?>


<?php
	function compare($first_string, $second_string)
	{
		$first_len = strlen($first_string);
		$second_len = strlen($second_string);
		if ($first_len > $second_len)
			return 1;
		else if ($first_len < $second_len)
			return -1;
		else
			return bit_compare($first_string, $second_string);
	}
?>


<?php
    // This function adds two numbers digit by digit and goes to 
    // next digits until it reaches the end of one number.
    function subtraction($first_string, $second_string)
    {
		$compare_result = compare($first_string, $second_string);
		$flag = FALSE;
		
		if ($compare_result == -1)
		{
			$temp = $first_string;
			$first_string = $second_string;
			$second_string = $temp;
			$flag = TRUE;
		}
	    
	    	if ($compare_result == 0)
			return "0";
		
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

            $sum = $temp_1 - $temp_2 + $carry;
            $carry = $sum < 0 ? -1 : 0;
            $sum = $sum < 0 ? $sum + 10 : $sum;

            $result = strval($sum) . $result;

            $first_index--;
            $second_index--;
        }
		
		$result = ltrim($result, "0");
		
		if ($flag)
			$result = "-" . $result;

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
	$test1 = "120";
	$test2 = "555";
    echo $test1 . "<br /> - <br />" . $test2 . "<br /> = <br />" . subtraction($test1, $test2);
?>
