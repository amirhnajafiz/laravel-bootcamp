<?php
	function clear_tags($input_string)
	{
		$pattern = '/#\w+|@\w+/';
		$replacements = array();
		
		preg_match_all($pattern, $input_string, $replacements);
		
		foreach($replacements[0] as $replacement)
		{
			$input_string = str_replace("$replacement", "<a href='www.instagram.com'>" . substr($replacement, 1, strlen($replacement)) . "</a>", $input_string);
		}
		
		return $input_string;
	}
?>

<?php
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function program_test($number_of_tests = 5)
	{
		for($i = 1; $i <= $number_of_tests; $i++)
		{
			$string_length = rand(5, 20);
			$testing_string = "";
			for($j = 0; $j < $string_length; $j++)
			{
				$temp = generateRandomString(rand(5,20));
				$prop = rand(0, 9);
				if ($prop > 7)
				{
					$temp = rand(0,9) > 5 ? '#' . $temp : '@' . $temp;
				}
				$testing_string = $testing_string . " " . $temp;
			}
			echo "<br /> Test Case $i : <br />";
			echo ">> Input string <br /> $testing_string <br />";
			echo ">> Output string <br /> " . clear_tags($testing_string) . "<br />";
		}
	}
?>

<?php
	echo "This function gets a text with '@' and '#' init and then converts them to links.<br />";
	$number_of_tests = 12;
	program_test($number_of_tests);
?>
