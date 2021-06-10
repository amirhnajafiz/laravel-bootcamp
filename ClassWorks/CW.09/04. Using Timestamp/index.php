<?php

	function convert($date)
	{
		$timestamp = strtotime($date);
		$diff = 226898;
		if (date('L', $timestamp)) $diff += 1;
		return $timestamp - ($diff * 24 * 3600) + (4.50 * 3600);
	}

	$date = date('Y/m/d D H:i', strtotime("2020/06/10"));

	echo $date . "\n";

	$convert_date = date("Y/m/d D H:i", convert($date));

	echo convert_to_number(convert_to_persian_days($convert_date)) . "\n";

	function convert_to_persian_days($string) {
    $english = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    $persian = ['Doshanbeh', 'Seshanbeh', 'Chaharshanbeh', 'Panjshanbeh', 'Jomeh', 'Shanbeh', 'Yekshanbeh'];

    $persianformatonly = str_replace($english, $persian, $string);

    return $persianformatonly;
  }

	function convert_to_number($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($num, $persian, $string);

    return $convertedPersianNums;
  }
?>
