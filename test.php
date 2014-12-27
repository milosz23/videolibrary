<?php
$title = 'titlemana';
$description = $_POST["fname"];

$string = <<<XML
<wrap>
<title>$title</title>
<description>$description</description>
</wrap>
XML;

$xml = new SimpleXMLElement($string);

echo $xml->asXML();

?>