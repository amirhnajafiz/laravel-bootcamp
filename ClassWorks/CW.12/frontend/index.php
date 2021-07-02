<?php

if (isset($_POST['response']))
{
    echo var_export($_POST['response'], true);
    exit();
} 

$url = "127.0.0.1:8080/response.php";

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);

$result = curl_exec($ch);

?>