<?php
	// This is a function to get all the subsets of a set
    function powerSet($in, $minLength = 1) 
	{ 
       $count = count($in); 
       $members = pow(2, $count); 
       $return = array(); 
       for ($i = 0; $i < $members; $i++) 
	   { 
          $b = sprintf("%0".$count."b",$i); 
          $out = array(); 
          for ($j = 0; $j < $count; $j++) 
		  { 
            if ($b{$j} == '1') 
				$out[] = $in[$j]; 
          } 
          if (count($out) >= $minLength) 
		  { 
            $return[] = $out; 
          } 
       } 
       return $return; 
    } 
?>

<?php

	$number = 11; // Input in here
	
    $test = strval($number);
    $array = powerSet(str_split($test));
    $newarray = [];
    foreach ($array as $part)
    {
        $temp = implode("", $part);
        $newarray [] = (int) $temp;
    }
    rsort($newarray);
    $flag = false;
    foreach ($newarray as $target)
    {
        if ($target % 3 == 0)
        {
            echo strlen($test) - strlen(strval($target));
            $flag = true;
            break;
        }
    }
    if (!$flag)
        echo -1;
?>