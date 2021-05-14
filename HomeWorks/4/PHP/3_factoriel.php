<?php
	$num = 5;
	$factoriel = 1;
	while($num != 0)
	{
		$factoriel *= $num;
		$num--;
	}
	echo $factoriel;
?>