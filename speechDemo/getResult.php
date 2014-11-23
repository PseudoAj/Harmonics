<?php

//phpinfo();
$input=$_REQUEST['text'];
$ch = curl_init("http://api.corrasable.com/words/".$input);
$fp = fopen("result.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
$file = file_get_contents('./result.txt', true);
echo $file;
fclose($fp);
?>
