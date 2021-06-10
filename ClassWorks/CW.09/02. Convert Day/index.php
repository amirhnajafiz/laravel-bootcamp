<?php
  $now = new DateTime("2020/06/10");

  $formatter = new IntlDateFormatter(
                  "fa_IR@calendar=persian",
                  IntlDateFormatter::FULL,
                  IntlDateFormatter::FULL,
                  'Asia/Tehran',
                  IntlDateFormatter::TRADITIONAL,
                  "yyyy/MM/dd");

  echo 'It is now: ' . $now->format("Y/m/d") ."\n";

  $convert = new DateTime(convert_to_number($formatter->format($now)));

  echo 'It is now: ' . convert_to_persian_days($convert->format("Y/m/d D")) ."\n";

  function convert_to_number($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
  }

  function convert_to_persian_days($string) {
    $english = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    $persian = ['2Shanbeh', '3Shanbeh', '4Shanbeh', '5Shanbeh', 'Jomeh', 'Shanbeh', '1Shanbeh'];

    $persianformatonly = str_replace($english, $persian, $string);

    return $persianformatonly;
  }

?>
