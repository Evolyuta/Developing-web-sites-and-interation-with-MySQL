<?php
// ������ ���� ��������� � ������
$f = fopen("data.txt","a");
fputs($f,"\nLine six");
fclose($f);
?>