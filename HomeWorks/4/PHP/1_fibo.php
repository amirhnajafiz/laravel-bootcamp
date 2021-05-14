<?php  
	$num = 12;  
	$n1 = 0;  
	$n2 = 1;  
	echo '1 ';
	$num--;
	while ( $num != 0 )  
	{  
		$n3 = $n2 + $n1;  
		echo $n3.' ';  
		$n1 = $n2;  
		$n2 = $n3;  
		$num--;
	}
?>  