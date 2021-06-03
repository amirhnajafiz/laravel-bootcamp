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
	
	function reverse_sentence($input_sentence)
	{
		$string_parts = explode(" ", $input_sentence);
		$temp = "";
		for($i = count($string_parts)-1; $i > -1; $i--)  
		{
			$temp = $temp . reverse_string($string_parts[$i]) . " ";
		}
		return $temp;
	}
	
	echo reverse_sentence("Hello world!");
?>