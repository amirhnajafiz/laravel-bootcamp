<?php
	function reverse_string($input_string)
	{
		$temp = "";
		for($i = strlen($input_string)-1; $i > -1; $i--)
		{
			$temp = $temp . $input_string[$i];
		}
		return $temp;
	}
	
	echo reverse_string("Hello");
?>