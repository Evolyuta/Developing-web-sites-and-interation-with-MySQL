<?php
// Читаем файл построчно в массив
$f = fopen("data.txt","a");
fputs($f,"\nLine six");
fclose($f);
?>