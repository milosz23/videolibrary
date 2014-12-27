<?php
$title = 'titlemana';
$description = "descripta mana";

$string = <<<XML
<wrap>
<title>$title</title>
<description>$description</description>
</wrap>
XML;

$xml = new SimpleXMLElement($string);

echo $xml->asXML();

?>