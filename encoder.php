<?php

$js = file_get_contents('obfuscated.js');
$base64 = base64_encode($js);

echo $base64;
echo PHP_EOL;
