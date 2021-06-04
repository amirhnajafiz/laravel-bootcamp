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
	
	function find_sets($array, $target)
	{
		// 1 2 3 4 5 6
		// 8
		// 6 5 4 3 2 1
		
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
				$found_set[] = ( $array[$i] . ", " . ( $target - $array[$i] ) );
			}
		}
		
		return $found_set;
	}
	
	$test = [12, 7, 33, -1, 2, -5, 15, 6, 2, 3, 4, 8];
	print_r($test);
	$found_set = find_sets($test, 10);
	print_r($found_set);
?>