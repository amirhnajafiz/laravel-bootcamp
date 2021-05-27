<?php
	function clear_tags($input_string)
	{
		$pattern = '/#\w+|@\w+/';
		$replacements = array();
		
		preg_match_all($pattern, $input_string, $replacements);
		
		foreach($replacements[0] as $replacement)
		{
			$input_string = str_replace("$replacement", "<a href='www.instagram.com'>" . $replacement . "</a>", $input_string);
		}
		
		return $input_string;
	}
?>