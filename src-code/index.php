<?php

require_once('helper/maintanence.php');

$source_file = 'xml-data/server.xml';
$historical_of_changes_path = 'xml-data/prev/';

$xml = simplexml_load_file($source_file);

echo $xml->device;

$xml->device = 'Server ' . rand(1, 100);

$pre_file_name = $historical_of_changes_path . '/server-' . date('Y-m-d H:i:s') . '.xml';
file_put_contents($pre_file_name, $xml->asXML());

file_put_contents($source_file, $xml->asXML());

maintanance($historical_of_changes_path);

?>