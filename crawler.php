<?php
//crawler
//crawler2
@ini_set('zlib.output_compression', 0);
@ini_set('implicit_flush', 1);
error_reporting(E_ERROR | E_PARSE);
$file = fopen("links.txt", "r");
$members = array();
while (!feof($file)) {
   $members[] = fgets($file);
}

fclose($file);

foreach($members as $member){
$dom = new DOMDocument();

$file = file_get_contents($member);

$dom->loadHTML($file);

$sources = $dom->getElementsByTagName('source');
foreach ($sources as $source) {
    foreach ($source->attributes as $attr) {
      $name = $attr->nodeName;
      $value = $attr->nodeValue;
      echo "$value<br />";
      ob_end_flush();
    }
}
 ob_implicit_flush(1);
}

?>