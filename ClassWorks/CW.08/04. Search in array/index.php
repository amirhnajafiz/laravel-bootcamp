<?php
	function lottery($names, $target)
	{
		return $target == $names[rand(0, count($names))] ? "YES" : "NO";
	}
	
	$people = ['Mike', 'Elli', 'Josh', 'John', 'Peter', 'Ken', 'Kevin', 'Omas', 'Dan'];
	$me = "Dan";
	
	echo lottery($people, $me) . "\n";
	echo lottery($people, $me) . "\n";
	echo lottery($people, $me) . "\n";
	echo lottery($people, $me) . "\n";
?>