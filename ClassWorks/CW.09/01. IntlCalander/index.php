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

  echo 'It is now: ' . $formatter->format($now) ."\n";

?>
