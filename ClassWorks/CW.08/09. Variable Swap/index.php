<?php
	function swap_vars(&$x, &$y) 
	{
		list($x, $y) = array($y, $x);
	}
	
	$test1 = 12;
	$test2 = "Hossein";
	
	var_dump($test1);
	var_dump($test2);
	
	echo $test1 . "|" . $test2 . "\n";
	swap_vars($test1, $test2);
	echo $test1 . "|" . $test2 . "\n";
	
	var_dump($test1);
	var_dump($test2);
?>