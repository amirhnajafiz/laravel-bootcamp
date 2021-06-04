<?php
	function check_string($string)
	{
		for($i = 0; $i < strlen($string)-1; $i++)
		{
			for($j = $i+1; $j < strlen($string); $j++)
			{
				if ($string[$i] == $string[$j])
					return TRUE;
			}
		}
		return FALSE;
	}
	
	function check_array($array)
	{
		$result_set = array();
		foreach($array as $single_string)
		{
			if (check_string($single_string))
				$result_set [] = $single_string;
		}
		return $result_set;
	}
	
	echo count(check_array(['Amir', 'Hosein', 'Reza'])) > 0 ? "YES" : "NO";
?>