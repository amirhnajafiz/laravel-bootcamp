<?php  
	$num = 4;  
	if ($num == 0)
	{
		echo 0;
	} else {
		$sum = 1;
		$n1 = 0;  
		$n2 = 1; 
		$num--;
		while ( $num != 0 )  
		{  
			$n3 = $n2 + $n1;  
			$sum += $n3;  
			$n1 = $n2;  
			$n2 = $n3;  
			$num--;
		}
		echo $sum;
	}
?> 