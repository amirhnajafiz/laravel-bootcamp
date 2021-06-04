<?php
	function array_has($array, $target)
	{
		for($i = 0; $i < count($array); $i++)
		{
			if ($array[$i] == $target)
				return TRUE;
		}
		return FALSE;
	}
	
	function find_index($array, $target)
	{
		for($i = 0; $i < count($array); $i++)
		{
			if ($array[$i] == $target)
				return $i;
		}
		return -1;
	}
	
	function find_sets($array, $target)
	{
		$stored_array = [];
		$found_set = [];
		for($i = 0; $i < count($array); $i++)
		{
			$stored_array [] = $target - $array[$i];
		}
		
		for($i = 0; $i < count($array); $i++)
		{
			if (array_has($stored_array, $array[$i]))
			{
				$found_set[] = ( $i . ", " . find_index($array, $target - $array[$i]) );
			}
		}
		
		return $found_set;
	}
	
	$test = [12, 7, 33, -1, 2, -5, 15, 6, 2, 3, 4, 8];
	print_r($test);
	$found_set = find_sets($test, 10);
	print_r($found_set);
?>