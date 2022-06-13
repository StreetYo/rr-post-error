<?php

require_once 'vendor/autoload.php';

$rows = str_getcsv(file_get_contents('test.csv'), "\n");

$url = 'http://localhost:8080';
$data = [
    'values' => json_encode($rows)
];

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);
