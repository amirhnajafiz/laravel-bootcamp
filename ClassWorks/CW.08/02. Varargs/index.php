<?php
	function sumation()
	{
		$parameters = func_get_args();
		
		$sum = 0;
		foreach($parameters as $parameter)
		{
			$sum += $parameter;
		}
		
		return $sum;
	}
	
	echo sumation(12, 44, 22, 1, 11, 55, 634);
?>