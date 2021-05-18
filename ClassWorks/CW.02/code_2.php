# Second
<?php

	$input = readline(">> ");
	$storage = [];
	
	while($input != 0)
	{
	    array_unshift($storage, $input);
	    $input = readline(">> ");
	}
	
	print_r($storage)
?>