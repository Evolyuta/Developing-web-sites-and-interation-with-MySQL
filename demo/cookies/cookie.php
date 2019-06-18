<?php
//setcookie("userName", 'John');//устанавливает куки
//setcookie("userName", 'John', time()-3600);//удаляет куки
//echo $_COOKIE["userName"];//читает куки
$user = [
    'name' => 'John',
    'login' => 'root',
    'password' => '1234'
];
$str = serialize($user);//записывает массив в строку
setcookie("user", $str);
$user = unserialize($_COOKIE["user"]);//обратная функция
print_r($user);
$str = base64_encode(serialize($user));//сохранение целостности
setcookie("user", $str);
$user = unserialize(base64_decode($_COOKIE["user"]));//сохранение целостности
print_r($user);
