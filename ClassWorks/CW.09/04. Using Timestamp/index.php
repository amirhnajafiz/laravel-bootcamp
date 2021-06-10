<?php

  $now = new DateTime("2020/06/10 05:00");

  $formatter = new IntlDateFormatter(
                  "fa_IR@calendar=persian",
                  IntlDateFormatter::FULL,
                  IntlDateFormatter::FULL,
                  'Asia/Tehran',
                  IntlDateFormatter::TRADITIONAL,
                  "yyyy/MM/dd h:m");

  echo 'It is now: ' . $now->format("Y/m/d D H:i") ."\n";

  $convert = new DateTime(convert_to_number($formatter->format($now)));

  echo 'It is now: ' . $convert->format("Y/m/d D H:i") ."\n";

  function convert_to_number($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
  }

?>
