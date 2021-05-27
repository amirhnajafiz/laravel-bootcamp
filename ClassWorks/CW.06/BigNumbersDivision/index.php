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
	function division($first_string, $second_string)
	{	
		
		$result_array = array();
	
		if ($second_string == "0")
		{
			array_push($result_array, "INF");
			array_push($result_array, "UKW");
			return $result_array;
		}
		
		$compare_result = compare($first_string, $second_string);
		
		
		$result = "0";
		
		while(compare($first_string, $second_string) != -1)
		{
			$first_string = subtraction($first_string, $second_string);
			$result = sumation($result, "1");
		}
		
		array_push($result_array, $result);
		array_push($result_array, $first_string);
		
		return $result_array;
	}
?>


<?php
	$test1 = "555";
	$test2 = "7";
	$temp = division($test1, $test2);
	echo $test1 . " / " . $test2 . " => ";
	echo "Q: " . $temp[0] . " | R: " . $temp[1];
?>
