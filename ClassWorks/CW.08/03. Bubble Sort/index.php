<?php
	function bubble_sort($array) 
	{
		for ($i = 0; $i < count($array)-1; $i++) 
		{
			for ($j = 0; $j < count($array)-1; $j++) 
			{
				if ($array[$j + 1] < $array[$j]) 
				{
					$temp = $array[$j + 1];
					$array[$j + 1] = $array[$j];
					$array[$j] = $temp;
				}
			}
		}
		return $array;
	}
	
	print_r(bubble_sort([12, 3, 44, 54, 1, 15, 12, 5]));
?>