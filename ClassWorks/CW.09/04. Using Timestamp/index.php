<?php

	function convert($date)
	{
		$timestamp = strtotime($date);
		$diff = 226898;
		if (date('L', $timestamp)) $diff += 1;
		return $timestamp - ($diff * 24 * 3600);
	}

	$date = date('Y/M/D', strtotime("2020/06/10"));

	$convert_date = date("Y/M/D", convert($date));

	echo $convert_date . "\n";
?>
