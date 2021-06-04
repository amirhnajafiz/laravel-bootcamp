<?php
	function insertionSort($array)
	{
		for ($i = 1; $i < count($array); $i++)
		{
			$key = $array[$i];
			$j = $i-1;
			while ($j >= 0 && $array[$j] > $key)
			{
				$array[$j + 1] = $array[$j];
				$j = $j - 1;
			}
			$array[$j + 1] = $key;
		}
		return $array;
	}
	
	print_r(insertionSort([12, 4, 23, 111, 42, 2, 22, 87, 55, 44, 65, 8, 6, 10]));
?>