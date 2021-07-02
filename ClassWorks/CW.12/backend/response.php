<?php

require_once "php/manager/manager.php";
require "php/utils.php";

$list = getTree('assets/data');

$MyManager = new Manager();
$MyManager->loadFiles($list);

$url = "127.0.0.1:3030/index.php";

$fields = [
    'response' => var_export($MyManager, true),
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
echo $result;

?>