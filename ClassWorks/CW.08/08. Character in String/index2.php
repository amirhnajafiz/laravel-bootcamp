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
		for($i = 0; $i < count($array); $i++)
		{
			if (check_string($array[$i]))
				$result_set [] = $i;
		}
		return $result_set;
	}
	
	print_r(check_array(['Amir', 'Hossein', 'Rezza']));
?>