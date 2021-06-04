<?php
	function bubble_sort($array) 
	{
		for ($i = 0; $i < count($array)-1; $i++) 
		{
			for ($j = $i+1; $j < count($array); $j++) 
			{
				if ($array[$j] < $array[$i]) 
				{
					$temp = $array[$j];
					$array[$j] = $array[$i];
					$array[$i] = $temp;
				}
			}
		}
		return $array;
	}
	
	print_r(bubble_sort([12, 3, 44, 54, 1, 15, 12, 5]));
?>