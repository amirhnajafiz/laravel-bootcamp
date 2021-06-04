<?php
	function string_has_number($string)
	{
		$numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		foreach($numbers as $number)
		{
			for($i = 0; $i < strlen($string); $i++)
				if ($string[$i] == $number)
					return TRUE;
		}
		return FALSE;
	}
	
	echo string_has_number("12Apple") . "\n";
	echo string_has_number("Apple") . "\n";
	echo string_has_number("Apple 2") . "\n";
	echo string_has_number("Ap54ple");
?>